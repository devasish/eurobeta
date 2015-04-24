<?php

App::uses('AppController', 'Controller');

/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {

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
        $this->Customer->recursive = 0;
        $this->set('customers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Customer->exists($id)) {
            throw new NotFoundException(__('Invalid customer'));
        }
        $options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
        $this->set('customer', $this->Customer->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Customer->create();
            if ($this->Customer->save($this->request->data)) {
                $this->Session->setFlash(__('The customer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Customer->exists($id)) {
            throw new NotFoundException(__('Invalid customer'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Customer->save($this->request->data)) {
                $this->Session->setFlash(__('The customer has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
            $this->request->data = $this->Customer->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Customer->id = $id;
        if (!$this->Customer->exists()) {
            throw new NotFoundException(__('Invalid customer'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Customer->delete()) {
            $this->Session->setFlash(__('The customer has been deleted.'));
        } else {
            $this->Session->setFlash(__('The customer could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function prediction() {
        $qStr = $this->params->query['term'];
        $this->layout = "ajax";

        $customers = $this->Customer->find('all', array(
            'conditions' => array(
                'Customer.name LIKE' => "%$qStr%"
            ),
            'limit' => 7
        ));
        $s = array();

        foreach ($customers as $key => $customer) {

            $s[$key]['label'] = $customer['Customer']['name']; 
            $s[$key]['value'] = $customer['Customer']['name'];            
            $s[$key]['id'] = $customer['Customer']['id'];            
        }

        $this->set('arr', $s);
    }

}
