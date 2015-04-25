<?php
App::uses('AppController', 'Controller');
/**
 * Loaders Controller
 *
 * @property Loader $Loader
 * @property PaginatorComponent $Paginator
 */
class LoadersController extends AppController {

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
		$this->Loader->recursive = 0;
		$this->set('loaders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Loader->exists($id)) {
			throw new NotFoundException(__('Invalid loader'));
		}
		$options = array('conditions' => array('Loader.' . $this->Loader->primaryKey => $id));
		$this->set('loader', $this->Loader->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Loader->create();
			if ($this->Loader->save($this->request->data)) {
				$this->Session->setFlash(__('The loader has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loader could not be saved. Please, try again.'));
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
		if (!$this->Loader->exists($id)) {
			throw new NotFoundException(__('Invalid loader'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Loader->save($this->request->data)) {
				$this->Session->setFlash(__('The loader has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loader could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loader.' . $this->Loader->primaryKey => $id));
			$this->request->data = $this->Loader->find('first', $options);
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
		$this->Loader->id = $id;
		if (!$this->Loader->exists()) {
			throw new NotFoundException(__('Invalid loader'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Loader->delete()) {
			$this->Session->setFlash(__('The loader has been deleted.'));
		} else {
			$this->Session->setFlash(__('The loader could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
