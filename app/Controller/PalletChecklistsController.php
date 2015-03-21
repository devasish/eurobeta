<?php
App::uses('AppController', 'Controller');
/**
 * PalletChecklists Controller
 *
 * @property PalletChecklist $PalletChecklist
 * @property PaginatorComponent $Paginator
 */
class PalletChecklistsController extends AppController {

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
		$this->PalletChecklist->recursive = 0;
		$this->set('palletChecklists', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PalletChecklist->exists($id)) {
			throw new NotFoundException(__('Invalid pallet checklist'));
		}
		$options = array('conditions' => array('PalletChecklist.' . $this->PalletChecklist->primaryKey => $id));
		$this->set('palletChecklist', $this->PalletChecklist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PalletChecklist->create();
			if ($this->PalletChecklist->save($this->request->data)) {
				$this->Session->setFlash(__('The pallet checklist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pallet checklist could not be saved. Please, try again.'));
			}
		}
		$containers = $this->PalletChecklist->Container->find('list');
		$saps = $this->PalletChecklist->Sap->find('list');
		$users = $this->PalletChecklist->User->find('list');
		$this->set(compact('containers', 'saps', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PalletChecklist->exists($id)) {
			throw new NotFoundException(__('Invalid pallet checklist'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PalletChecklist->save($this->request->data)) {
				$this->Session->setFlash(__('The pallet checklist has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pallet checklist could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PalletChecklist.' . $this->PalletChecklist->primaryKey => $id));
			$this->request->data = $this->PalletChecklist->find('first', $options);
		}
		$containers = $this->PalletChecklist->Container->find('list');
		$saps = $this->PalletChecklist->Sap->find('list');
		$users = $this->PalletChecklist->User->find('list');
		$this->set(compact('containers', 'saps', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PalletChecklist->id = $id;
		if (!$this->PalletChecklist->exists()) {
			throw new NotFoundException(__('Invalid pallet checklist'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PalletChecklist->delete()) {
			$this->Session->setFlash(__('The pallet checklist has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pallet checklist could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
