<?php
App::uses('AppController', 'Controller');
/**
 * Perms Controller
 *
 * @property Perm $Perm
 * @property PaginatorComponent $Paginator
 */
class PermsController extends AppController {

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
		$this->Perm->recursive = 0;
		$this->set('perms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Perm->exists($id)) {
			throw new NotFoundException(__('Invalid perm'));
		}
		$options = array('conditions' => array('Perm.' . $this->Perm->primaryKey => $id));
		$this->set('perm', $this->Perm->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Perm->create();
			if ($this->Perm->save($this->request->data)) {
				$this->Session->setFlash(__('The perm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perm could not be saved. Please, try again.'));
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
		if (!$this->Perm->exists($id)) {
			throw new NotFoundException(__('Invalid perm'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perm->save($this->request->data)) {
				$this->Session->setFlash(__('The perm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perm could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Perm.' . $this->Perm->primaryKey => $id));
			$this->request->data = $this->Perm->find('first', $options);
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
		$this->Perm->id = $id;
		if (!$this->Perm->exists()) {
			throw new NotFoundException(__('Invalid perm'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Perm->delete()) {
			$this->Session->setFlash(__('The perm has been deleted.'));
		} else {
			$this->Session->setFlash(__('The perm could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
