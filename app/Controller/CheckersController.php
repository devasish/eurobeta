<?php
App::uses('AppController', 'Controller');
/**
 * Checkers Controller
 *
 * @property Checker $Checker
 * @property PaginatorComponent $Paginator
 */
class CheckersController extends AppController {

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
		$this->Checker->recursive = 0;
		$this->set('checkers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Checker->exists($id)) {
			throw new NotFoundException(__('Invalid checker'));
		}
		$options = array('conditions' => array('Checker.' . $this->Checker->primaryKey => $id));
		$this->set('checker', $this->Checker->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Checker->create();
			if ($this->Checker->save($this->request->data)) {
				$this->Session->setFlash(__('The checker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The checker could not be saved. Please, try again.'));
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
		if (!$this->Checker->exists($id)) {
			throw new NotFoundException(__('Invalid checker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Checker->save($this->request->data)) {
				$this->Session->setFlash(__('The checker has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The checker could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Checker.' . $this->Checker->primaryKey => $id));
			$this->request->data = $this->Checker->find('first', $options);
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
		$this->Checker->id = $id;
		if (!$this->Checker->exists()) {
			throw new NotFoundException(__('Invalid checker'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Checker->delete()) {
			$this->Session->setFlash(__('The checker has been deleted.'));
		} else {
			$this->Session->setFlash(__('The checker could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
