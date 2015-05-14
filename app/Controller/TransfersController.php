<?php

App::uses('AppController', 'Controller');

/**
 * Transfers Controller
 *
 * @property Transfer $Transfer
 * @property PaginatorComponent $Paginator
 */
class TransfersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
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
                            $conditions['Transfer.' . $this->request->params['named']['field']] = $value;
                        } elseif ($this->request->params['named']['field'] == 'description') {
                            $conditions['OR'] = array(
                                array('Transfer.description LIKE ' => "%$value%"));
                        } elseif ($this->request->params['named']['field'] == 'shift') {
                            $conditions['OR'] = array(
                                array('Transfer.shift LIKE ' => "%$value%"));   
                        } else {
                            $conditions['Transfer.' . $this->request->params['named']['field'] . ' LIKE '] = "%$value%";
                        }
                    } elseif ($name == 'created_by' && intval($value) > 0) {
                        $conditions['Transfer.user_id'] = intval($value);
                    }elseif($name == 'cal_from' && !empty ($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Transfer.transfer_date >='] = $dateObj->format('Y-m-d');
                    } elseif($name == 'cal_to' && !empty ($value)) {
                        $dateObj = DateTime::createFromFormat('d-m-Y', $value);
                        $conditions['Transfer.transfer_date <='] = $dateObj->format('Y-m-d') . ' 23:59:59';
                    }
                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }
        $this->paginate = array(
            'limit' => 9,
            'order' => 'Transfer.id DESC',
            'conditions' => $conditions
        );
        //$this->Transfer->recursive = 0;
        $this->set('transfers', $this->Paginator->paginate());
        $users = $this->Transfer->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Transfer->exists($id)) {
            throw new NotFoundException(__('Invalid transfer'));
        }
        $options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
        $this->set('transfer', $this->Transfer->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {


            $this->request->data['Transfer']['user_id'] = $this->Session->read('Auth.User.id');
            $last_serial = 0;
            $x = $this->Transfer->find('first', array(
                'conditions' => array(
                    'Transfer.created >=' => date('Y-m-d'),
                    'Transfer.user_id' => $this->Session->read('Auth.User.id')
                ),
                'fields' => array('MAX(Transfer.serial_index) as max_index'),
                'groupBy' => 'Transfer.user_id'
            ));
            $last_serial = $x[0]['max_index'] + 1;
            $this->request->data['Transfer']['serial_no'] = strtoupper($this->request->data['Transfer']['sap_code']) . date('dmy') . sprintf('%05d', $last_serial);
            $this->request->data['Transfer']['serial_index'] = $last_serial;
            
            $dateObj = DateTime::createFromFormat('d-m-Y', $this->request->data['Transfer']['transfer_date']);

            $this->request->data['Transfer']['transfer_date'] = $dateObj->format('Y-m-d');
            $this->Transfer->create();
            if ($this->Transfer->save($this->request->data)) {
                $this->Session->setFlash(__('The transfer has been saved.'), 'flash_success');
                return $this->redirect(array('action' => 'view', $this->Transfer->getLastInsertId()));
            } else {
                $this->Session->setFlash(__('The transfer could not be saved. Please, try again.'), 'flash_warning');
            }
        }
        $saps = $this->Transfer->Sap->find('list');
        $users = $this->Transfer->User->find('list');
        $this->set(compact('saps', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Transfer->exists($id)) {
            throw new NotFoundException(__('Invalid transfer'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $updtransdate = date('Y-m-d', strtotime($this->request->data['Transfer']['transfer_date']));
            $this->request->data['Transfer']['transfer_date'] = $updtransdate;
            if ($this->Transfer->save($this->request->data)) {
                $this->Session->setFlash(__('The transfer has been saved.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transfer could not be saved. Please, try again.'), 'flash_warning');
            }
        } else {
            $options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
            $this->request->data = $this->Transfer->find('first', $options);
            $settransdate = date('d-m-Y', strtotime($this->request->data['Transfer']['transfer_date']));
            $this->request->data['Transfer']['transfer_date'] = $settransdate;
        }
        $saps = $this->Transfer->Sap->find('list');
        $users = $this->Transfer->User->find('list');
        $this->set(compact('saps', 'users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Transfer->id = $id;
        if (!$this->Transfer->exists()) {
            throw new NotFoundException(__('Invalid transfer'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Transfer->delete()) {
            $this->Session->setFlash(__('The transfer has been deleted.'), 'flash_delete');
        } else {
            $this->Session->setFlash(__('The transfer could not be deleted. Please, try again.'), 'flash_warning');
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function prediction() {
        $qStr = $this->params->query['term'];
        $this->layout = "ajax";
        $this->loadModel('Sap');

        $saps = $this->Sap->find('all', array(
            'conditions' => array(
                'OR' => array(
                    'Sap.sapcode LIKE' => "%$qStr%",
                    'Sap.description LIKE' => "%$qStr%",
                )
                
            ),
            'limit' => 7
        ));
        $s = array();

        foreach ($saps as $key => $sap) {

            $s[$key]['label'] = $sap['Sap']['sapcode'] . ' (' . $sap['Sap']['description'] . ')';
            $s[$key]['value'] = $sap['Sap']['sapcode'];
            $s[$key]['data'] = $sap['Sap'];
        }

        $this->set('arr', $s);
    }

}
