<?php
App::uses('AppController', 'Controller');
/**
 * Courts Controller
 *
 * @property Court $Court
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CourtsController extends AppController {
   public $layout = 'sampleLayout';
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Auth');
	public function beforeFilter() {
		// 親クラスのbeforeFilterの読み込み
		parent::beforeFilter();
		// 認証不要のページの指定
		$this->Auth->allow('login', 'add', 'view', 'index');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Court->recursive = 0;
		$this->set('courts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Court->exists($id)) {
			throw new NotFoundException(__('Invalid court'));
		}
		$options = array('conditions' => array('Court.' . $this->Court->primaryKey => $id));
		$this->set('court', $this->Court->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Court');
		if ($this->request->is('post')) {
			$this->request->data['Court']['password'] = AuthComponent::password($this->request->data['Court']['password']);
			$this->Court->create();
			if ($this->Court->save($this->request->data)) {
				$this->Session->setFlash(__('The court has been saved.'));
				return $this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The court could not be saved. Please, try again.'));
			}
		}
	}

	public function login() {
		// POST送信なら
		if($this->request->is('post')) {
			// ログインOKなら
			if($this->Auth->login()) {
				// Auth指定のページへ移動
				$this->redirect($this->Auth->redirect(array('controller' => 'appointments', 'action' => 'index')));
			} else { // ログインNGなら
				$this->Session->setFlash(__('courtname or Password is different.'), 'default', array(), 'auth');
				$this->set('courtname', $this->request->data['Court']['username']);
			}
		} else {
			$this->set('courtname', '');
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
		if (!$this->Court->exists($id)) {
			throw new NotFoundException(__('Invalid court'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Court->save($this->request->data)) {
				$this->Session->setFlash(__('The court has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The court could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Court.' . $this->Court->primaryKey => $id));
			$this->request->data = $this->Court->find('first', $options);
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
		$this->Court->id = $id;
		if (!$this->Court->exists()) {
			throw new NotFoundException(__('Invalid court'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Court->delete()) {
			$this->Session->setFlash(__('The court has been deleted.'));
		} else {
			$this->Session->setFlash(__('The court could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
