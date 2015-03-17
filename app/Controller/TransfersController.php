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
        $this->Transfer->recursive = 0;
        $this->set('transfers', $this->Paginator->paginate());
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
            $last_serial = $x[0]['max_index']+1;
            $this->request->data['Transfer']['serial_no'] = strtoupper($this->request->data['Transfer']['sap_code']).date('dmy').sprintf('%05d', $last_serial);
            $this->request->data['Transfer']['serial_index'] = $last_serial;
            $this->Transfer->create();
            pr($this->request->data);
            if ($this->Transfer->save($this->request->data)) {
                $this->Session->setFlash(__('The transfer has been saved.'));
                return $this->redirect(array('action' => 'view',$this->Transfer->getLastInsertId()));
            } else {
                $this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
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
            if ($this->Transfer->save($this->request->data)) {
                $this->Session->setFlash(__('The transfer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The transfer could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Transfer.' . $this->Transfer->primaryKey => $id));
            $this->request->data = $this->Transfer->find('first', $options);
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
            $this->Session->setFlash(__('The transfer has been deleted.'));
        } else {
            $this->Session->setFlash(__('The transfer could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
    
    public function prediction() {
        $qStr = $this->params->query['term'];
        $this->layout = "ajax";
        $this->loadModel('Sap');

        $saps = $this->Sap->find('all', array(
            'conditions' => array(
                'Sap.sapcode LIKE' => "%$qStr%"
            ),
            'limit' => 5
        ));
        $s = array();
        
        foreach ($saps as $key => $sap) {
            
            $s[$key]['label'] = $sap['Sap']['description'];
            $s[$key]['value'] = $sap['Sap']['sapcode'];
            $s[$key]['data'] = $sap['Sap'];
        }
        
        $this->set('arr', $s);
    }

}
