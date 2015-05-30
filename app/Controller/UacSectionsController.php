<?php
App::uses('AppController', 'Controller');
/**
 * UacSections Controller
 *
 * @property UacSection $UacSection
 * @property PaginatorComponent $Paginator
 */
class UacSectionsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    
    public function beforeFilter() {
        parent::beforeFilter();
        if (!$this->permitted('uac_section')) {
            throw new NotFoundException(__(NOT_ALLOWED));
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->UacSection->recursive = 0;
        $this->set('uacSections', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->UacSection->exists($id)) {
            throw new NotFoundException(__('Invalid uac section'));
        }
        $options = array('conditions' => array('UacSection.' . $this->UacSection->primaryKey => $id));
        $this->set('uacSection', $this->UacSection->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if (!$this->permitted('uac_section', 'add')) {
            throw new NotFoundException(__(NOT_ALLOWED));
        }
        
        if ($this->request->is('post')) {
            $this->UacSection->create();
            $this->request->data['UacSection']['slug'] = strtolower(str_replace(' ', '_', $this->request->data['UacSection']['name']));
            if ($this->UacSection->save($this->request->data)) {
                $this->Session->setFlash(__('The uac section has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The uac section could not be saved. Please, try again.'));
            }
        }
        
        $uacModules = $this->UacSection->UacModule->find('list');
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
        if (!$this->permitted('uac_section', 'edit')) {
            throw new NotFoundException(__(NOT_ALLOWED));
        }
        if (!$this->UacSection->exists($id)) {
            throw new NotFoundException(__('Invalid uac section'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UacSection->save($this->request->data)) {
                $this->Session->setFlash(__('The uac section has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The uac section could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('UacSection.' . $this->UacSection->primaryKey => $id));
            $this->request->data = $this->UacSection->find('first', $options);
        }
        $uacModules = $this->UacSection->UacModule->find('list');
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
        $this->UacSection->id = $id;
        if (!$this->UacSection->exists()) {
            throw new NotFoundException(__('Invalid uac section'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->UacSection->delete()) {
            $this->Session->setFlash(__('The uac section has been deleted.'));
        } else {
            $this->Session->setFlash(__('The uac section could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function get_list($module_id) {
        $this->layout = 'ajax';
        $this->autoRender = false;
        $r = $this->UacSection->find('list', array('conditions' => array(
                'uac_module_id' => $module_id
        )));

        echo json_encode($r);
    }

}
