<?php
App::uses('AppController', 'Controller');
class AppointmentsController extends AppController {
	
	public $layout = 'sampleLayout';
	public $components = array("Auth");
	public $uses = array(
				'Appointment',
				'Time',
				'Order',
				'Court',
				'User'
				);
	
	public function beforeFilter() {
		// 親クラスのbeforeFilterの読み込み
		parent::beforeFilter();
		// 認証不要のページの指定
		$this->Auth->allow('index', 'view');
	}
	
	public function index($date_id = 0) {
		// 指定した日付データを取得
		if ($date_id) {
			$strdate = date('Y年m月d日', strtotime($date_id));
			$date = date('Y-m-d', strtotime($date_id));
			$link = date('Ymd', strtotime($date_id));
		} else {
			$strdate = date('Y年m月d日');
			$date = date('Y-m-d');
			$link = date('Ymd');
		}
		// 予約データ取得
		$appo = $this->Appointment->find('all', array(
			'conditions' => array('date' => $date),
			'order' => array('start' => 'ASC')
		));
		// ログイン状態チェック
		$user = $this->Auth->user();
		if(empty($user)){
			$this->set('str', 'Login');
			$this->set('page', 'login');
		}else{
			$this->set('str', 'MyPage');
			$this->set('page', 'view/'.$user['id']);
		}
		// タイムライン追加用クラス名生成
		for ($i = 0; $i < count($appo); $i++) {
			$appo[$i]['Appointment']['class'] = 'appo' . substr($appo[$i]['Appointment']['start'], 0, 2);
			$appo[$i]['Appointment']['height'] = $appo[$i]['Appointment']['order_id'] * 20;
			if ($appo[$i]['Appointment']['user_id'] == $user['id']) {
				$appo[$i]['Appointment']['class'] .= ' me';
				$appo[$i]['Appointment']['name'] = $user['name'];
			} else {
				$appo[$i]['Appointment']['name'] = 'Already';
			}
		}
		// データ渡し
		$this->set('appointments', $appo);
		$this->set('strdate', $strdate);
		$this->set('link', $link);
		$this->set('prev', date('Ymd', strtotime($date . ' -1 day')));
		$this->set('next', date('Ymd', strtotime($date . ' +1 day')));
	}
	
	public function add($date_id = null) {
		// 日付取得
		if ($date_id) {
			$strdate = date('Y年m月d日', strtotime($date_id));
			$date = date('Y-m-d', strtotime($date_id));
			$link = date('Ymd', strtotime($date_id));
		} else {
			$strdate = date('Y年m月d日');
			$date = date('Y-m-d');
			$link = date('Ymd');
		}
		// 時間帯取得
		$times = $this->Time->find('list', array(
			'fields' => 'time'
		));
		$i = 1;
		foreach ($times as $time) {
			$times[$i] = substr($time, 0, 5);
			$i++;
		}
		// オーダー取得
		$orders = $this->Order->find('list', array(
			'fields' => 'court'
		));
		$courts = $this->Court->find('list', array(
			'fields' => 'username'
		));
		if ($this->request->is('post')) {
			$data['Appointment']['user_id'] = $this->request->data['Appointment']['user_id'];
			$data['Appointment']['order_id'] = $this->request->data['Appointment']['court'];
			$data['Appointment']['date'] = $this->request->data['Appointment']['date'];
			$data['Appointment']['start'] = $times[$this->request->data['Appointment']['time']];
			$data['Appointment']['table'] = 1;
			// 予約済データ取得
			$appo = $this->Appointment->find('all', array(
				'conditions' => array('date' => $data['Appointment']['date']),
				'order' => array('start' => 'ASC')
			));
			// 予約済データの比較 被りがあるなら席を変更
			$flgs = array(null, true, true, true);
			foreach ($appo as $ap) {
				if (substr($ap['Appointment']['start'],0,5) == $data['Appointment']['start']
					|| ($ap['Appointment']['order_id'] >= 3 && (int)substr($ap['Appointment']['start'],0,2) == substr($data['Appointment']['start'],0,2)-1)
					|| ($data['Appointment']['order_id'] >= 3 && (int)substr($ap['Appointment']['start'],0,2)-1 == substr($data['Appointment']['start'],0,2))) {
					$flgs[$ap['Appointment']['table']] = false;
					if ($flgs[1]) {
						$data['Appointment']['table'] = 1;
					} else if ($flgs[2]) {
						$data['Appointment']['table'] = 2;
					} else if ($flgs[3]) {
						$data['Appointment']['table'] = 3;
					} else {
						$this->Session->setFlash(__('The appointment could not be saved.'));
						$this->redirect(array('action' => 'index/'.$link));
					}
				}
			}
			$this->Appointment->create();
			if ($this->Appointment->save($data)) {
				$this->Session->setFlash(__('The appointment has been saved'));
				$this->redirect(array('action' => 'index/'.$link));
			} else {
				$this->Session->setFlash(__('The appointment could not be saved. Please, try again.'));
			}
		}
		$user = $this->Auth->user();
		$this->set('user_id', $user['id']);
		$this->set('user_name', $user['name']);
		$this->set('date', $date);
		$this->set('strdate', $strdate);
		$this->set('times', $times);
		$this->set('orders', $orders);
		$this->set('courts', $courts);
		$this->set('link', $link);
	}
	
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Appointment->id = $id;
		$user = $this->Auth->user();
		if (!$this->Appointment->exists()) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		if ($this->Appointment->delete()) {
			$this->Session->setFlash(__('Appointment deleted'));
			$this->redirect(array('controller' => 'users', 'action' => 'view/'.$user['id']));
		}
		$this->Session->setFlash(__('Appointment was not deleted'));
		$this->redirect(array('controller' => 'users', 'action' => 'view/'.$user['id']));
	}
	public function view($id = null) {
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
		$this->set('appointment', $this->Appointment->find('first', $options));
	}
}