<?php
class StockMovimentsController extends AppController {

	var $name = 'StockMoviments';

	function index() {
		parent::index();
	
		$this->StockMoviment->recursive = 0;
		$this->set('stockMoviments', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$enterprises = $this->StockMoviment->Enterprise->find('list');
		$enterpriseUnits = array();
		$stocks = array();
		$stockMovimentTypes = $this->StockMoviment->StockMovimentType->find('list');
		$users = $this->StockMoviment->User->find('list');
		$serviceOrders = $this->StockMoviment->ServiceOrder->find('list');
		$this->set(compact('enterprises', 'enterprise_units', 'stocks', 'stockMovimentTypes', 'users', 'serviceOrders'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock moviment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stockMoviment', $this->StockMoviment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['StockMoviment']['user_id'] = $this->Auth->user('id');
			$this->StockMoviment->create();
			
			if ($this->StockMoviment->save($this->data)) {
				$this->data['ServiceOrder']['service_order_opening_user_id'] = $this->Auth->user('id');
				
				$this->Session->setFlash(__('The stock moviment has been saved', true));
				$this->redirect(array('action' => 'view', $this->StockMoviment->id));
			} else {
				$this->Session->setFlash(__('The stock moviment could not be saved. Please, try again.', true));
			}
		}
		$enterprises = $this->StockMoviment->Enterprise->find('list');
		$enterpriseUnits = array();
		$stocks = array();
		$stockMovimentTypes = $this->StockMoviment->StockMovimentType->find('list');
		$users = $this->StockMoviment->User->find('list');
		$serviceOrders = $this->StockMoviment->ServiceOrder->find('list');
		$this->set(compact('enterprises', 'enterprise_units', 'stocks', 'stockMovimentTypes', 'users', 'serviceOrders'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['StockMoviment']['user_id'] = $this->Auth->user('id');
			
			if ($this->StockMoviment->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StockMoviment->read(null, $id);
		}
		$enterprises = $this->StockMoviment->Enterprise->find('list');
		$enterpriseUnits = $this->StockMoviment->EnterpriseUnit->find('list');
		$stocks = $this->StockMoviment->Stock->find('list');
		$stockMovimentTypes = $this->StockMoviment->StockMovimentType->find('list');
		$users = $this->StockMoviment->User->find('list');
		$serviceOrders = $this->StockMoviment->ServiceOrder->find('list');
		$this->set(compact('enterprises', 'enterpriseUnits', 'stocks', 'stockMovimentTypes', 'users', 'serviceOrders'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock moviment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StockMoviment->delete($id)) {
			$this->Session->setFlash(__('Stock moviment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stock moviment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->StockMoviment->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['StockMoviment']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
		
		echo '<option value=""></option>';
		
		foreach($enterpriseUnits as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
	
	function getStock() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$stocks = $this->StockMoviment->Stock->find('list', array('conditions' =>
			'Stock.id in (SELECT stock_id FROM enterprise_units_stocks
				WHERE enterprise_unit_id = '.$_POST['data']['StockMoviment']['enterprise_unit_id'].')', 'order' => 'Stock.stock_name'));
		
		echo '<option value=""></option>';
		
		foreach($stocks as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>