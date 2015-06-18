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
                    } elseif ($name == 'controller_name' && !empty($value)) {
                        $conditions['UacModule.controller LIKE '] = "%$value%";
                    } elseif ($name == 'action_name' && !empty($value)) {
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
        
        $this->UacModule->recursive = 1;
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
            $this->request->data['UacModule']['slug'] = strtolower(str_replace(' ', '_', $this->request->data['UacModule']['name']));
            if ($this->UacModule->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The uac module has been saved.'));
                return $this->redirect(array('action' => 'add'));
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
            if ($this->UacModule->saveAll($this->request->data)) {
                $this->Session->setFlash(__('The uac module has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The uac module could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UacModule.' . $this->UacModule->primaryKey => $id), 'recursive' => 1);
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

    public function test() {
        $this->autoRender = FALSE;
        $this->loadModel('UacPermission');
        $r = $this->UacPermission->getPermissions();
        pr($r);
    }

}
