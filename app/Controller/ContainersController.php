<?php
App::uses('AppController', 'Controller');
/**
 * Containers Controller
 *
 * @property Container $Container
 * @property PaginatorComponent $Paginator
 */
class ContainersController extends AppController {

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
							$conditions['Container.'.$this->request->params['named']['field']] = $value;
						}elseif($this->request->params['named']['field'] == 'container_no'){
							$conditions['Container.'.$this->request->params['named']['field']] = $value;
						}elseif($this->request->params['named']['field'] == 'seal_no'){
							$conditions['Container.'.$this->request->params['named']['field']] = $value;
                                                }elseif($this->request->params['named']['field'] == 'type'){
							$conditions['Container.'.$this->request->params['named']['field']] = $value;
                                                }elseif($this->request->params['named']['field'] == 'status'){
							$conditions['Container.'.$this->request->params['named']['field']] = $value;                                                
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
                    'order' 		=> 'Container.id DESC',
                    'conditions' 	=> $conditions
                );                
                //$this->Container->recursive = 0;
		$this->set('containers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Container->exists($id)) {
			throw new NotFoundException(__('Invalid container'));
		}
		$options = array('conditions' => array('Container.' . $this->Container->primaryKey => $id));
                $this->Container->recursive = 2;
		$this->set('container', $this->Container->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
                        $this->request->data['Container']['user_id'] = $this->Session->read('Auth.User.id');
			$this->Container->create();
			if ($this->Container->save($this->request->data)) {
				$this->Session->setFlash(__('The container has been saved.'), 'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The container could not be saved. Please, try again.'), 'flash_warning');
			}
		}
		$users = $this->Container->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Container->exists($id)) {
			throw new NotFoundException(__('Invalid container'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Container->save($this->request->data)) {
				$this->Session->setFlash(__('The container has been saved.', 'flash_success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The container could not be saved. Please, try again.'), 'flash_warning');
			}
		} else {
			$options = array('conditions' => array('Container.' . $this->Container->primaryKey => $id));
			$this->request->data = $this->Container->find('first', $options);
		}
		$users = $this->Container->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Container->id = $id;
		if (!$this->Container->exists()) {
			throw new NotFoundException(__('Invalid container'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Container->delete()) {
			$this->Session->setFlash(__('The container has been deleted.'), 'flash_delete');
		} else {
			$this->Session->setFlash(__('The container could not be deleted. Please, try again.'), 'warning');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
