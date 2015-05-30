<?php
App::uses('AppController', 'Controller');
/**
 * UacPermissions Controller
 *
 * @property UacPermission $UacPermission
 * @property PaginatorComponent $Paginator
 */
class UacPermissionsController extends AppController {

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
		$this->UacPermission->recursive = 0;
		$this->set('uacPermissions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UacPermission->exists($id)) {
			throw new NotFoundException(__('Invalid uac permission'));
		}
		$options = array('conditions' => array('UacPermission.' . $this->UacPermission->primaryKey => $id));
		$this->set('uacPermission', $this->UacPermission->find('first', $options));
                
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UacPermission->create();
			if ($this->UacPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The uac permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uac permission could not be saved. Please, try again.'));
			}
		}
                
                $this->loadModel('UacModule');
                $this->loadModel('UacSection');
		$uacSections = $this->UacPermission->UacSection->find('list');		                
                $uacModules = $this->UacModule->find('list');
                $this->set(compact('uacSections', 'uacModules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UacPermission->exists($id)) {
			throw new NotFoundException(__('Invalid uac permission'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UacPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The uac permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The uac permission could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UacPermission.' . $this->UacPermission->primaryKey => $id));
			$this->request->data = $this->UacPermission->find('first', $options);
		}
		$uacSections = $this->UacPermission->UacSection->find('list');
		$this->set(compact('uacSections'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UacPermission->id = $id;
		if (!$this->UacPermission->exists()) {
			throw new NotFoundException(__('Invalid uac permission'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->UacPermission->delete()) {
			$this->Session->setFlash(__('The uac permission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The uac permission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function test() {
            $this->autoRender = false;
            $result = $this->UacPermission->get($role = $this->Session->read('Auth.User.role'));
            pr($result);
        }
        
}
