<?php

App::uses('AppController', 'Controller');

class ReportsController extends AppController {

    public $components = array('Paginator');

    /**
     * Loading Report F1, F3 and combined
     */
    public function loading() {
        $conditions = array();
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url = array();
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if (trim($value)) {
                    if ($name == 'cal_from' || $name == 'cal_to') {
                        $filter_url[$name] = urlencode(str_replace('/', '-', $value));
                    } else {
                        $filter_url[$name] = urlencode($value);
                    }
                }
            }
            return $this->redirect($filter_url);
        } else {
            foreach ($this->request->params['named'] as $name => $value) {
                if (!in_array($name, array('page', 'sort', 'direction', 'limit'))) {
                    $value = urldecode($value);
                    if ($name == 'value' && strlen(trim($value)) > 0) {
                        if ($this->request->params['named']['field'] == 'id') {
                            $conditions['Sap.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'description') {
                            $conditions['OR'] = array(
                                array('Sap.description LIKE ' => "%$value%"));
                        } else {
                            $conditions['Sap.' . $this->request->params['named']['field'] . ' LIKE '] = "%$value%";
                        }
                    } elseif ($name == 'cal_from' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Container.load_date >='] = $dateObj->format('Y-m-d');
                    } elseif ($name == 'cal_to' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Container.load_date <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
                    }

                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }

        $conditions['Container.status'] = '2'; // Consider only closed container


        $this->loadModel('Sap');
        $this->loadModel('PalletChecklist');

        $this->paginate = array(
            'fields' => array(
                'Sap.sapcode',
                'Sap.description',
                'Container.container_no',
                'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
                'SUM(no_of_ctn) AS total_no_of_ctn',
                'ROUND(SUM((no_of_ctn * product_cust_wt)), 2) AS net_cust_product_wt',
                '(ROUND(SUM(net_wt_per_ctn) / COUNT(sap_id), 2)) AS avg_net_wt_per_ctn',
                'ROUND((SUM(net_product_wt) - SUM((no_of_ctn * product_cust_wt))), 2) AS total_diff',
                'Container.load_date'
            ),
            'recursive' => 0,
            'conditions' => $conditions,
            'group' => array('PalletChecklist.sap_id'),
            'limit' => 10000
        );

        $this->set('palletLoads', $this->Paginator->paginate('PalletChecklist'));
    }

    /**
     * CTN LOADING REPORT
     * This is ctn loading report for a particular Product
     * This function loads the view...then data is loaded by ajax
     */
    public function ctn_loading_report() {
        // loads the view only
        $this->Session->setFlash(__('Please Search by SAP Code or Description'), 'flash_warning');
    }

    /**
     * CTN LOADING REPORT
     * This function sends the data to the view by ajax
     */
    public function ctn_loading_report_data() {
        $this->layout = 'ajax';
        $this->loadModel('PalletChecklist');

        $sap_code = $this->request->data['sapcode'];

        $res = $this->PalletChecklist->find('all', array(
            'conditions' => array('sap_code' => $sap_code, 'Container.status' => 2),
            'recursive' => 0
                )
        );


        $s = array();

        $this->set('arr', $res);
    }

    /**
     * LOADING ANALYSIS
     * This function loads the view only
     */
    public function loading_analysis() {
//        $this->loadModel('PalletChecklist');
//        $x = $this->PalletChecklist->find('all', array(
//            'conditions' => array(),
//            'recursive' => 0,
//            'fields' => array(
//                'sap_id',
//                'created',
//                'SUM(no_of_ctn) AS total_no_of_ctn',
//                'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
//                'ROUND((SUM(net_wt_per_ctn) - SUM(product_cust_wt)) / SUM(product_cust_wt) *100, 2) AS total_diff_perc',
//                'DATE_FORMAT(PalletChecklist.created, "%Y-%m") AS gr_date'
//            ),
//            'group' => array('PalletChecklist.sap_id', "DATE_FORMAT(PalletChecklist.created, '%Y%m')"),
//            'order' => array('PalletChecklist.created ASC', 'PalletChecklist.sap_id DESC')
//        ));

        $this->Session->setFlash(__('Please Select a Date Range'), 'flash_warning');
//        pr($x);
    }

    /**
     * LOADING ANALYSIS
     * This function counts the number of SAP code exits in the given daterange.
     * then for each sap id data is loaded by successive ajax call
     * @return type
     */
    public function loading_analysis_data_count() {
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');

        $from = $this->request->query('from');
        $to = $this->request->query('to');

        $fromObj = DateTime::createFromFormat('m/d/Y', $from);
        $from = $fromObj->format('Y-m-d') . ' 00:00:00';
        $toObj = DateTime::createFromFormat('m/d/Y', $to);
        $to = $toObj->format('Y-m-d') . ' 23:59:59';

        $this->loadModel('PalletChecklist');
        $count = $this->PalletChecklist->find('count', array(
            'conditions' => array(
                'Container.load_date >=' => $from,
                'Container.load_date <=' => $to
            ),
            'fields' => 'DISTINCT PalletChecklist.sap_id',
            'recursive' => 0
        ));

        $result['count'] = $count;
        $result['from'] = $from;
        $result['to'] = $to;

        return json_encode($result);
    }

    /**
     * LOADING ANAYLYSIS
     * Loads data for each sap successively
     * @return type
     */
    public function loading_analysis_data() {
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');

        $from = $this->request->query('from');
        $to = $this->request->query('to');
        $start = $this->request->query('start');

        $fromObj = DateTime::createFromFormat('m/d/Y', $from);
        $from = $fromObj->format('Y-m-d') . ' 00:00:00';
        $toObj = DateTime::createFromFormat('m/d/Y', $to);
        $to = $toObj->format('Y-m-d'). ' 23:59:59';

        $this->loadModel('PalletChecklist');
        $sap = $this->PalletChecklist->find('first', array(
            'conditions' => array(
                'Container.load_date >=' => $from,
                'Container.load_date <=' => $to,
                'Container.status' => 2
            ),
            'fields' => 'DISTINCT PalletChecklist.sap_id',
            'recursive' => 0,
            'offset' => $start
        ));

        $x = array();
        if (!empty($sap)) {
            $x = $this->PalletChecklist->find('all', array(
                'conditions' => array(
                    'Container.load_date >=' => $from,
                    'Container.load_date <=' => $to,
                    'PalletChecklist.sap_id' => $sap['PalletChecklist']['sap_id']
                ),
                'recursive' => 0,
                'fields' => array(
                    'sap_id',
                    'Sap.description',
                    'Sap.sapcode',
                    'created',
                    'SUM(no_of_ctn) AS total_no_of_ctn',
                    'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
                    'ROUND((SUM(net_wt_per_ctn) - SUM(product_cust_wt)) / SUM(product_cust_wt) *100, 2) AS total_diff_perc',
                    'DATE_FORMAT(Container.load_date, "%Y%m") AS gr_date'
                ),
                'group' => array('PalletChecklist.sap_id', "DATE_FORMAT(Container.load_date, '%Y%m')"),
                'order' => array('PalletChecklist.created ASC', 'PalletChecklist.sap_id DESC')
            ));
        }
// Process data...
        $y1 = date('Y', strtotime($from));
        $y2 = date('Y', strtotime($to));

        $m1 = date('m', strtotime($from));
        $m2 = date('m', strtotime($to));

        $diff = (($y2 - $y1) * 12) + ($m2 - $m1);

        $arr = array();
        $gr_dates = array();

        for ($i = 0; $i <= $diff; $i++) {
            $date = date('Ym', strtotime('+' . $i . ' month', strtotime($from)));
            $arr['data'][$date] = array(
                'total_no_of_ctn' => 0,
                'total_net_product_wt' => 0,
                'total_diff_perc' => 0,
            );

            $gr_dates[] = date('Y-m', strtotime('+' . $i . ' month', strtotime($from)));
        }

        $arr['sapcode'] = !empty($x) ? $x[0]['Sap']['sapcode'] : '';
        $arr['sapdesc'] = !empty($x) ? $x[0]['Sap']['description'] : '';
        $arr['gr_dates'] = $gr_dates;

        if (!empty($x)) {
            foreach ($x as $d) {
                $arr['data'][$d[0]['gr_date']] = $d[0];
            }
        }

        return json_encode($arr);
    }

    public function transfer_report_1() {
        $params = array();
        $dateSet = false;
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url = array();
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if (trim($value)) {
                    if ($name == 'cal_from' || $name == 'cal_to') {
                        $filter_url[$name] = urlencode(str_replace('/', '-', $value));
                    } else {
                        $filter_url[$name] = urlencode($value);
                    }
                }
            }
            return $this->redirect($filter_url);
        } else {
            foreach ($this->request->params['named'] as $name => $value) {
                if (!in_array($name, array('page', 'sort', 'direction', 'limit'))) {
                    $value = urldecode($value);
                    if ($name == 'value' && strlen(trim($value)) > 0) {
                        if ($this->request->params['named']['field'] == 'sapcode') {
                            $params['sapcode'] = $value;
                        } elseif ($this->request->params['named']['field'] == 'description') {
                            $params['description'] = $value;
                        }
                    } elseif ($name == 'cal_from' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $params['cal_from'] = $dateObj->format('Y-m-d');
                        $dateSet = true;
                    } elseif ($name == 'cal_to' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $params['cal_to'] = $dateObj->format('Y-m-d');
                        $dateSet = true;
                    } elseif ($name == 'factory') {
                        $params['factory'] = $value;
                    }

                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }

        if (!$dateSet) {
            $date_from = date('d-m-Y', strtotime(date('Y-m-d') . ' - 1 days'));
            $date_to = date('d-m-Y');
            $this->request->data['Filter']['cal_from'] = $date_from;
            $this->request->data['Filter']['cal_to'] = $date_to;
            $dateObj = DateTime::createFromFormat('d-m-Y', $date_from);
            $params['cal_from'] = $dateObj->format('Y-m-d');
            $dateObj = DateTime::createFromFormat('d-m-Y', $date_to);
            $params['cal_to'] = $dateObj->format('Y-m-d') . ' 23:59:59';
        }

        $this->loadModel('Transfer');
        $transfers = $this->Transfer->report_1_data($params);
        $this->set('transfers', $transfers);
    }

    public function transfer_report_2() {
        $conditions = array();
        $dateSet = false;
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url = array();
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if (trim($value)) {
                    if ($name == 'cal_from' || $name == 'cal_to') {
                        $filter_url[$name] = urlencode(str_replace('/', '-', $value));
                    } else {
                        $filter_url[$name] = urlencode($value);
                    }
                }
            }

            return $this->redirect($filter_url);
        } else {
            foreach ($this->request->params['named'] as $name => $value) {
                if (!in_array($name, array('page', 'sort', 'direction', 'limit'))) {
                    $value = urldecode($value);
                    if ($name == 'value' && strlen(trim($value)) > 0) {
                        if ($this->request->params['named']['field'] == 'id') {
                            $conditions['Sap.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'description') {
                            $conditions['OR'] = array(
                                array('Sap.description LIKE ' => "%$value%"));
                        } else {
                            $conditions['Sap.' . $this->request->params['named']['field'] . ' LIKE '] = "%$value%";
                        }
                    } elseif ($name == 'cal_from' && !empty($value)) {
                        $dateSet = true;
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Transfer.transfer_date >='] = $dateObj->format('Y-m-d');
                    } elseif ($name == 'cal_to' && !empty($value)) {
                        $dateSet = true;
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Transfer.transfer_date <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
                    } elseif ($name == 'factory') {
                        $conditions['User.role'] = $value;
                    }

                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }

        if (!$dateSet) {
            $date_from = date('d-m-Y', strtotime(date('Y-m-d') . ' - 1 days'));
            $date_to = date('d-m-Y');
            $this->request->data['Filter']['cal_from'] = $date_from;
            $this->request->data['Filter']['cal_to'] = $date_to;
            $dateObj = DateTime::createFromFormat('d-m-Y', $date_from);
            $conditions['Transfer.transfer_date >='] = $dateObj->format('Y-m-d');
            $dateObj = DateTime::createFromFormat('d-m-Y', $date_to);
            $conditions['Transfer.transfer_date <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
        }

        $conditions_m = $conditions;
        $conditions_m['Transfer.shift'] = 0;

        $conditions_n = $conditions;
        $conditions_n['Transfer.shift'] = 1;

        $this->loadModel('Transfer');
        $transfers['morning'] = $this->Transfer->find('all', array(
            //'conditions' => array('Transfer.shift' => 0),
            'conditions' => $conditions_m,
            'recursive' => 0,
            'fields' => array(
                'serial_no',
                'sap_code',
                'description',
                'ctn_per_pallet',
                'net_wt',
                'shift'
            ),
            'order' => array('Transfer.created ASC', 'Transfer.sap_id DESC')
        ));

        $transfers['nignt'] = $this->Transfer->find('all', array(
            //'conditions' => array('Transfer.shift' => 1),
            'conditions' => $conditions_n,
            'recursive' => 0,
            'fields' => array(
                'serial_no',
                'sap_code',
                'description',
                'ctn_per_pallet',
                'net_wt',
                'shift'
            ),
            'order' => array('Transfer.created ASC', 'Transfer.sap_id DESC')
        ));
        $this->set('transfers', $transfers);
//        pr($transfers);
    }

    public function containers() {
        $conditions = array();
        $hasDateFrom = false;
        $hasDateTo = false;
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url = array();
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if (trim($value)) {
                    if ($name == 'cal_from' || $name == 'cal_to') {
                        $filter_url[$name] = urlencode(str_replace('/', '-', $value));
                    } else {
                        $filter_url[$name] = urlencode($value);
                    }
                }
            }
            return $this->redirect($filter_url);
        } else {
            foreach ($this->request->params['named'] as $name => $value) {
                if (!in_array($name, array('page', 'sort', 'direction', 'limit'))) {
                    $value = urldecode($value);
                    if ($name == 'value' && strlen(trim($value)) > 0) {
                        if ($this->request->params['named']['field'] == 'id') {
                            $conditions['Container.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'container_no') {
                            $conditions['Container.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'seal_no') {
                            $conditions['Container.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'type') {
                            $conditions['Container.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'status') {
                            $conditions['Container.' . $this->request->params['named']['field']] = $value;
                        } else {
                            $conditions['Sap.' . $this->request->params['named']['field'] . ' LIKE '] = "%$value%";
                        }
                    } elseif ($name == 'cal_from' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Container.load_date >='] = $dateObj->format('Y-m-d');
                        $hasDateFrom = true;
                    } elseif ($name == 'cal_to' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Container.load_date <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
                        $hasDateTo = true;
                    }
                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }

//        $this->paginate = array(
//            'limit' => 9,
//            'order' => 'Container.id DESC',
//            'conditions' => $conditions
//        );
        //$this->Container->recursive = 0;
        if ($hasDateFrom && $hasDateTo) {
            $this->loadModel('Container');
            $containers = $this->Container->find('all', array('conditions' => $conditions, 'order' => 'Container.id DESC'));
        } else {
            $containers = array();
            $this->Session->setFlash(__('Please Select a Date Range'), 'flash_warning');
        }
        $this->set('containers', $containers);
    }

    public function dash_data() {
        $this->autoRender = FALSE;
//        $fd = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m') - 1, 1, date('Y')));
//        $ld = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), 0, date('Y')));
        $fd = date('Y-m-01');
        $ld = date('Y-m-d'). ' 23:59:59';
        $yesterday = date('Y-m-d', strtotime(date('Y-m-d') . '- 1 day'));

        $this->loadModel('Transfer');
        $last_month_data = $this->Transfer->find('all', array(
            'conditions' => array(
                'transfer_date >= ' => $fd,
                'transfer_date <= ' => $ld,
            ),
            'fields' => array('IFNULL(ROUND(SUM(Transfer.ctn_per_pallet * Sap.net_wt)/1000,2),0) AS total')
        ));

        $last_day_data = $this->Transfer->find('all', array(
            'conditions' => array(
                'transfer_date >= ' => $yesterday . ' 00:00:00',
                'transfer_date <= ' => $yesterday . ' 23:59:59',
            ),
            'fields' => array('IFNULL(ROUND(SUM(Transfer.ctn_per_pallet * Sap.net_wt)/1000,2),0) AS total')
        ));

        $this->loadModel('PalletChecklist');
        $last_mon_dispatch = $this->PalletChecklist->find('all', array(
            'fields' => array(
                'IFNULL(ROUND(SUM((no_of_ctn * product_cust_wt))/1000, 2),0) AS total',
            ),
            'recursive' => 0,
            'conditions' => array(
                'Container.load_date >= ' => $fd,
                'Container.load_date <= ' => $ld,
                'Container.status' => 2
            )
        ));

        $last_day_dispatch = $this->PalletChecklist->find('all', array(
            'fields' => array(
                'IFNULL(ROUND(SUM((no_of_ctn * product_cust_wt)), 2),0) AS total',
            ),
            'recursive' => 0,
            'conditions' => array(
                'Container.load_date >= ' => $yesterday . ' 00:00:00',
                'Container.load_date <= ' => $yesterday . ' 23:59:59',
                'Container.status' => 2
            )
        ));

        $return = array(
            'transfer' => array(
                'last_month' => $last_month_data[0][0]['total'],
                'yesterday' => $last_day_data[0][0]['total'],
            ),
            'dispatch' => array(
                'last_month' => $last_mon_dispatch[0][0]['total'],
                'yesterday' => $last_day_dispatch[0][0]['total'],
            ),
        );

        echo json_encode($return);
    }

    public function dash_graph() {
        $this->autoRender = FALSE;
        $today = date('Y-m-d H:i:s');
        $one_mon_ago = date('Y-m-01');

        $this->loadModel('Transfer');
        $transfers = $this->Transfer->find('all', array(
            'conditions' => array(
                'transfer_date >= ' => $one_mon_ago,
                'transfer_date <= ' => $today,
            ),
            'fields' => array("IFNULL(ROUND(SUM(Transfer.ctn_per_pallet * Transfer.net_wt)/1,2),0) AS total, DATE_FORMAT(Transfer.transfer_date, '%Y-%m-%d') AS transfer_date"),
            'group' => array("DATE_FORMAT(Transfer.transfer_date, '%Y%m%d')")
        ));

        $this->loadModel('PalletChecklist');
        $dispatches = $this->PalletChecklist->find('all', array(
            'fields' => array(
                "IFNULL(ROUND(SUM((no_of_ctn * product_cust_wt))/1, 2),0) AS total, DATE_FORMAT(Container.load_date, '%Y-%m-%d') AS dispatch_date",
            ),
            'recursive' => 0,
            'conditions' => array(
                'Container.load_date >=' => $one_mon_ago,
                'Container.load_date <=' => $today,
            ),
            'group' => array("DATE_FORMAT(Container.load_date, '%Y%m%d')")
        ));
        
        $data = array('transfer', 'dispatch');
        foreach ($transfers as $tr) {
            $data['transfer'][strtotime($tr[0]['transfer_date'])] = $tr[0]['total'];
        }

        foreach ($dispatches as $tr) {
            $data['dispatch'][strtotime($tr[0]['dispatch_date'])] = $tr[0]['total'];
        }
        $date_names = array();
        $loop_start = strtotime($one_mon_ago);
        $loop_end = strtotime($today.' -1 day');
        $loop_index = $loop_start;
        $ts = array('name' => 'Transfer');
        $ds = array('name' => 'Dispatch');
        $i = 0;

        while ($loop_index < $loop_end) {
            $next_date = $one_mon_ago . ' + ' . ($i++) . ' day';
            $date_names[] = date('d M', strtotime($next_date));
            $loop_index = strtotime($next_date);
            $ts['data'][] = isset($data['transfer'][$loop_index]) ? (int) $data['transfer'][$loop_index] : 0;
            $ds['data'][] = isset($data['dispatch'][$loop_index]) ? (int) $data['dispatch'][$loop_index] : 0;
            if ($i > 31) {
                break;
            }
        }

        $return = array(
            'categories' => $date_names,
            'series' => array($ts, $ds)
        );

        echo json_encode($return);
    }

    /**
     * Loading Report F1, F3 and combined
     */
    public function loading_vplus_vminus() {
        $conditions = array();
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url = array();
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if (trim($value)) {
                    if ($name == 'cal_from' || $name == 'cal_to') {
                        $filter_url[$name] = urlencode(str_replace('/', '-', $value));
                    } else {
                        $filter_url[$name] = urlencode($value);
                    }
                }
            }
            return $this->redirect($filter_url);
        } else {
            foreach ($this->request->params['named'] as $name => $value) {
                if (!in_array($name, array('page', 'sort', 'direction', 'limit'))) {
                    $value = urldecode($value);
                    if ($name == 'value' && strlen(trim($value)) > 0) {
                        if ($this->request->params['named']['field'] == 'id') {
                            $conditions['Sap.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'description') {
                            $conditions['OR'] = array(
                                array('Sap.description LIKE ' => "%$value%"));
                        } else {
                            $conditions['Sap.' . $this->request->params['named']['field'] . ' LIKE '] = "%$value%";
                        }
                    } elseif ($name == 'cal_from' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['PalletChecklist.created >='] = $dateObj->format('Y-m-d');
                    } elseif ($name == 'cal_to' && !empty($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['PalletChecklist.created <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
                    }

                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }

        $conditions['Container.status'] = '2'; // Consider only closed container

        $this->loadModel('Sap');
        $this->loadModel('PalletChecklist');
        $r = array();
        $results = $this->PalletChecklist->find('all', array(
            'fields' => array(
                'Sap.sapcode',
                'Sap.description',
                'Container.container_no',
                'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
                'SUM(no_of_ctn) AS total_no_of_ctn',
                'ROUND(SUM((no_of_ctn * product_cust_wt)), 2) AS net_cust_product_wt',
                '(ROUND(SUM(net_wt_per_ctn) / COUNT(sap_id), 2)) AS avg_net_wt_per_ctn',
                'ROUND((SUM(net_product_wt) - SUM((no_of_ctn * product_cust_wt))), 2) AS total_diff',
                'Container.load_date'
            ),
            'recursive' => 0,
            'conditions' => $conditions,
            'group' => array('PalletChecklist.sap_id'),
            'limit' => 10000
        ));
        
        foreach ($results as $key => $rw) {
            if ($rw[0]['total_diff'] >= 0) {
                $r['plus'][] = $rw;
            } else {
                $r['minus'][] = $rw;
            }
        }
        
        $this->set('palletLoad_data', $r);
    }

}
