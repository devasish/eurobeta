<?php
App::uses('AppController', 'Controller');
/**
 * PalletLoads Controller
 *
 * @property PalletLoad $PalletLoad
 * @property PaginatorComponent $Paginator
 */
class PalletLoadsController extends AppController {

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
		$this->PalletLoad->recursive = 0;
		$this->set('palletLoads', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PalletLoad->exists($id)) {
			throw new NotFoundException(__('Invalid pallet load'));
		}
		$options = array('conditions' => array('PalletLoad.' . $this->PalletLoad->primaryKey => $id));
		$this->set('palletLoad', $this->PalletLoad->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PalletLoad->create();
			if ($this->PalletLoad->save($this->request->data)) {
				$this->Session->setFlash(__('The pallet load has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pallet load could not be saved. Please, try again.'), 'flash_warning');
			}
		}
		$palletChecklists = $this->PalletLoad->PalletChecklist->find('list');
		$users = $this->PalletLoad->User->find('list');
		$this->set(compact('palletChecklists', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PalletLoad->exists($id)) {
			throw new NotFoundException(__('Invalid pallet load'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PalletLoad->save($this->request->data)) {
				$this->Session->setFlash(__('The pallet load has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pallet load could not be saved. Please, try again.'), 'flash_warning');
			}
		} else {
			$options = array('conditions' => array('PalletLoad.' . $this->PalletLoad->primaryKey => $id));
			$this->request->data = $this->PalletLoad->find('first', $options);
		}
		$palletChecklists = $this->PalletLoad->PalletChecklist->find('list');
		$users = $this->PalletLoad->User->find('list');
		$this->set(compact('palletChecklists', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        $this->autoRender = FALSE;
		$this->PalletLoad->id = $id;
		if (!$this->PalletLoad->exists()) {
			throw new NotFoundException(__('Invalid pallet load'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PalletLoad->delete()) {
            echo 1;
		} else {
            echo 0;
		}
	}
}
