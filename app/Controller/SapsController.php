<?php
App::uses('AppController', 'Controller');
/**
 * Saps Controller
 *
 * @property Sap $Sap
 * @property PaginatorComponent $Paginator
 */
class SapsController extends AppController {

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
		$this->Sap->recursive = 0;
		$this->set('saps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sap->exists($id)) {
			throw new NotFoundException(__('Invalid sap'));
		}
		$options = array('conditions' => array('Sap.' . $this->Sap->primaryKey => $id));
		$this->set('sap', $this->Sap->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sap->create();
			if ($this->Sap->save($this->request->data)) {
				$this->Session->setFlash(__('The sap has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sap could not be saved. Please, try again.'));
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
		if (!$this->Sap->exists($id)) {
			throw new NotFoundException(__('Invalid sap'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sap->save($this->request->data)) {
				$this->Session->setFlash(__('The sap has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sap could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sap.' . $this->Sap->primaryKey => $id));
			$this->request->data = $this->Sap->find('first', $options);
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
		$this->Sap->id = $id;
		if (!$this->Sap->exists()) {
			throw new NotFoundException(__('Invalid sap'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sap->delete()) {
			$this->Session->setFlash(__('The sap has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sap could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
