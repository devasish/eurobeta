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
                        $filter_url[$name] = urlencode(str_replace('/','-' ,$value));
                    }else {
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
                    } elseif($name == 'cal_from' && !empty ($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['PalletChecklist.created >='] = $dateObj->format('Y-m-d');
                    } elseif($name == 'cal_to' && !empty ($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['PalletChecklist.created <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
                    } 
                    
                    $this->request->data['Filter'][$name] = $value;
                    
                }
            }
        }




        $this->loadModel('Sap');
        $this->loadModel('PalletChecklist');

        $this->paginate = array(
            'fields' => array(
                'Sap.sapcode',
                'Sap.description',
                'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
                'SUM(no_of_ctn) AS total_no_of_ctn',
                'ROUND(SUM((no_of_ctn * product_cust_wt)), 2) AS net_cust_product_wt',
                '(ROUND(SUM(net_wt_per_ctn) / COUNT(sap_id), 2)) AS avg_net_wt_per_ctn',
                'ROUND((SUM(net_product_wt) - SUM((no_of_ctn * product_cust_wt))), 2) AS total_diff',
                'PalletChecklist.created'
            ),
            'recursive' => 0,
            'conditions' => $conditions,
            'group' => array('PalletChecklist.sap_id'),
            'limit' => 20
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
    }

    /**
     * CTN LOADING REPORT
     * This function sends the data to the view by ajax
     */
    public function ctn_loading_report_data() {
        $this->layout = 'ajax';
        $this->loadModel('PalletChecklist');

        $sap_code = $this->request->data['sapcode'];

        $res = $this->PalletChecklist->find('all', array('conditions' => array('sap_code' => $sap_code)));


        $s = array();

        $this->set('arr', $res);
    }

    
    /**
     * LOADING ANALYSIS
     * This function loads the view only
     */
    public function loading_analysis() {
        $this->loadModel('PalletChecklist');
        $x = $this->PalletChecklist->find('all', array(
            'conditions' => array(),
            'recursive' => 0,
            'fields' => array(
                'sap_id',
                'created',
                'SUM(no_of_ctn) AS total_no_of_ctn',
                'ROUND(SUM(net_product_wt), 2) as total_net_product_wt',
                'ROUND((SUM(net_wt_per_ctn) - SUM(product_cust_wt)) / SUM(product_cust_wt) *100, 2) AS total_diff_perc',
                'DATE_FORMAT(PalletChecklist.created, "%Y-%m") AS gr_date'
            ),
            'group' => array('PalletChecklist.sap_id', "DATE_FORMAT(PalletChecklist.created, '%Y%m')"),
            'order' => array('PalletChecklist.created ASC', 'PalletChecklist.sap_id DESC')
        ));

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
        $from = $fromObj->format('Y-m-d');
        $toObj = DateTime::createFromFormat('m/d/Y', $to);
        $to = $toObj->format('Y-m-d');

        $this->loadModel('PalletChecklist');
        $count = $this->PalletChecklist->find('count', array(
            'conditions' => array(
                'PalletChecklist.created >=' => $from,
                'PalletChecklist.created <=' => $to
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
        //$limit = $this->request->query('limit');

        $fromObj = DateTime::createFromFormat('m/d/Y', $from);
        $from = $fromObj->format('Y-m-d');
        $toObj = DateTime::createFromFormat('m/d/Y', $to);
        $to = $toObj->format('Y-m-d');

        $this->loadModel('PalletChecklist');
        $sap = $this->PalletChecklist->find('first', array(
            'conditions' => array(
                'PalletChecklist.created >=' => $from,
                'PalletChecklist.created <=' => $to
            ),
            'fields' => 'DISTINCT PalletChecklist.sap_id',
            'recursive' => 0,
            'limit' => 1,
            'offset' => $start
        ));


        $x = $this->PalletChecklist->find('all', array(
            'conditions' => array(
                'PalletChecklist.created >=' => $from,
                'PalletChecklist.created <=' => $to,
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
                'DATE_FORMAT(PalletChecklist.created, "%Y%m") AS gr_date'
            ),
            'group' => array('PalletChecklist.sap_id', "DATE_FORMAT(PalletChecklist.created, '%Y%m')"),
            'order' => array('PalletChecklist.created ASC', 'PalletChecklist.sap_id DESC')
        ));


// Process data...
        $y1 = date('Y', strtotime($from));
        $y2 = date('Y', strtotime($to));

        $m1 = date('m', strtotime($from));
        $m2 = date('m', strtotime($to));

        $diff = (($y2 - $y1) * 12) + ($m2 - $m1);

        //pr($x);
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

        $arr['sapcode'] = $x[0]['Sap']['sapcode'];
        $arr['sapdesc'] = $x[0]['Sap']['description'];
        $arr['gr_dates'] = $gr_dates;

        foreach ($x as $d) {
            $arr['data'][$d[0]['gr_date']] = $d[0];
        }

        return json_encode($arr);
    }
    
    
    public function transfer_report_1() {
        $this->loadModel('Transfer');
        
        $transfers = $this->Transfer->report_1_data('2015-04-12');
        $this->set('transfers', $transfers);
    }
}
