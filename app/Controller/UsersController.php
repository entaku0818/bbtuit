<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {
	
	public $components = array('Paginator', 'Session', 'Auth');
	public $uses = array(
				'Appointment',
				'Order',
				'User'
				);
    public $layout = 'login';
	
	public function beforeFilter() {
		// 親クラスのbeforeFilterの読み込み
		parent::beforeFilter();
		// 認証不要のページの指定
		$this->Auth->allow('login', 'add');
	}
	
	public function login() {

		// POST送信なら
		if($this->request->is('post')) {
			// ログインOKなら
			if($this->Auth->login()) {
				// Auth指定のページへ移動
				$this->redirect($this->Auth->redirect(array('controller' => 'appointments', 'action' => 'index')));
			} else { // ログインNGなら
				$this->Session->setFlash(__('Mail or Password is different.'), 'default', array(), 'auth');
				$this->set('email', $this->request->data['User']['username']);
			}
		} else {
			$this->set('email', '');
		}
	}
	
	public function logout() {
		$this->Auth->logout();
		$this->redirect(array('controller' => 'appointments', 'action' => 'index'));
	}
	
	public function view($id = null) {
		// ユーザー情報取得
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$user = $this->Auth->user();
		// 予約データ取得
		$appo = $this->Appointment->find('all', array(
			'conditions' => array('user_id' => $user['id']),
			'order' => array('start' => 'ASC')
		));
		// オーダー取得
		$orders = $this->Order->find('list', array(
			'fields' => 'court'
		));
		// データ渡し
		$this->set('user', $this->User->read(null, $id));
		$this->set('appointments', $appo);
		$this->set('orders', $orders);
	}

	public function add() {
		$this->loadModel('User');
		if ($this->request->is('post')) {
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'login'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'view'));
	}
}