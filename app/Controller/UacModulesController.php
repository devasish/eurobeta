<?php
App::uses('AppController', 'Controller');
/**
 * UacModules Controller
 *
 * @property UacModule $UacModule
 * @property PaginatorComponent $Paginator
 */
class UacModulesController extends AppController {

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
		$this->UacModule->recursive = 0;
		$this->set('uacModules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UacModule->exists($id)) {
			throw new NotFoundException(__('Invalid uac module'));
		}
		$options = array('conditions' => array('UacModule.' . $this->UacModule->primaryKey => $id));
		$this->set('uacModule', $this->UacModule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UacModule->create();
			if ($this->UacModule->save($this->request->data)) {
				$this->Session->setFlash(__('The uac module has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uac module could not be saved. Please, try again.'));
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
		if (!$this->UacModule->exists($id)) {
			throw new NotFoundException(__('Invalid uac module'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UacModule->save($this->request->data)) {
				$this->Session->setFlash(__('The uac module has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uac module could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UacModule.' . $this->UacModule->primaryKey => $id));
			$this->request->data = $this->UacModule->find('first', $options);
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
		$this->UacModule->id = $id;
		if (!$this->UacModule->exists()) {
			throw new NotFoundException(__('Invalid uac module'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UacModule->delete()) {
			$this->Session->setFlash(__('The uac module has been deleted.'));
		} else {
			$this->Session->setFlash(__('The uac module could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
