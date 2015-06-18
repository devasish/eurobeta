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
        $conditions = array();
        $limit = 10000;
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url = array();
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if (trim($value)) {
                    $filter_url[$name] = urlencode($value);
                }
            }
            return $this->redirect($filter_url);
        } else {
            foreach ($this->request->params['named'] as $name => $value) {
                if (!in_array($name, array('page', 'sort', 'direction'))) {
                    $value = urldecode($value);
                    if ($name == 'limit') {
                        $limit = $value;
                    } else if ($name == 'role' && !empty ($value)) {
                        $conditions['UacPermission.role'] = $value;
                    } elseif($name == 'controller_name' && !empty ($value)) {
                        $conditions['UacModule.controller LIKE '] = "%$value%";
                    } elseif($name == 'action_name' && !empty ($value)) {
                        $conditions['UacModule.action LIKE '] = "%$value%";
                    } else {
                        //$this->request->data['Filter'][$name] = $value;
                    }
                    $this->request->data['Filter'][$name] = $value;
                }
            }
        }
        $this->paginate = array(
            'limit' => $limit,
            'order' => 'UacModule.controller ASC',
            'conditions' => $conditions
        );
        
        //$this->UacPermission->recursive = 0;
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
		$uacModules = $this->UacPermission->UacModule->find('list');
		$this->set(compact('uacModules'));
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
		$uacModules = $this->UacPermission->UacModule->find('list');
		$this->set(compact('uacModules'));
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
}
