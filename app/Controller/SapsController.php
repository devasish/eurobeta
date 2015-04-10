<?php

App::uses('AppController', 'Controller');

/**
 * Saps Controller
 *
 * @property Sap $Sap
 * @property PaginatorComponent $Paginator
 */
class SapsController extends AppController {

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
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url = array();
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action']     = $this->request->params['action'];
			$filter_url['page']       = 1;
			foreach ($this->data['Filter'] as $name => $value){
				if(trim($value)){
					$filter_url[$name] = urlencode($value);
				}
			}
			return $this->redirect($filter_url);
		}else{
			foreach ($this->request->params['named'] as $name => $value){
				if(!in_array($name, array('page', 'sort', 'direction', 'limit'))){
					$value = urldecode($value);
					if($name == 'value' && strlen(trim($value)) > 0){
						if($this->request->params['named']['field'] == 'id'){
							$conditions['Sap.'.$this->request->params['named']['field']] = $value;
						}elseif($this->request->params['named']['field'] == 'description'){
							$conditions['OR'] = array(
								array('Sap.description LIKE ' 	=> "%$value%"));
						}else{
							$conditions['Sap.'.$this->request->params['named']['field'].' LIKE '] = "%$value%";
						}
					}else
					$this->request->data['Filter'][$name] = $value;	
				}
			}
		}
  		$this->paginate = array(
                    'limit' 		=> 15,
                    'order' 		=> 'Sap.id DESC',
                    'conditions' 	=> $conditions
                );                
                //$this->Sap->recursive = 0;
                $this->set('saps', $this->Paginator->paginate());		
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Sap->exists($id)) {
            throw new NotFoundException(__('Invalid sap'));
        }
        $options = array('conditions' => array('Sap.' . $this->Sap->primaryKey => $id));
        $this->Sap->recursive = 3;
        $this->set('sap', $this->Sap->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Sap']['user_id'] = $this->Session->read('Auth.User.id');
            $this->Sap->create();
            if ($this->Sap->save($this->request->data)) {
                $this->Session->setFlash(__('The sap has been saved.'), 'flash_success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The sap could not be saved. Please, try again.'), 'flash_warning');
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
        if (!$this->Sap->exists($id)) {
            throw new NotFoundException(__('Invalid sap'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['Sap']['last_edited_by'] = $this->Session->read('Auth.User.id');
            if ($this->Sap->save($this->request->data)) {
                $this->Session->setFlash(__('The sap has been saved.'), 'flash_success');
                return $this->redirect(array('action' => 'view',$id));
            } else {
                $this->Session->setFlash(__('The sap could not be saved. Please, try again.'), 'flash_warning');
            }
        } else {
            $options = array('conditions' => array('Sap.' . $this->Sap->primaryKey => $id));
            $this->request->data = $this->Sap->find('first', $options);
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
        $this->Sap->id = $id;
        if (!$this->Sap->exists()) {
            throw new NotFoundException(__('Invalid sap'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Sap->delete()) {
            $this->Session->setFlash(__('The sap has been deleted.'), 'flash_warning');
        } else {
            $this->Session->setFlash(__('The sap could not be deleted. Please, try again.'), 'flash_warning');
        }
        return $this->redirect(array('action' => 'index'));
    }
}
