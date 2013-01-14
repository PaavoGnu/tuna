<?php
class ViewStockMovimentItemsController extends AppController {

	var $name = 'ViewStockMovimentItems';

	function index($filterConditions = null) {	
		$this->ViewStockMovimentItem->recursive = 0;
		$this->set('viewStockMovimentItems', $this->paginate());
		//$this->set('viewStockMovimentItems', $this->paginate(array(explode('?', $filterConditions))));
		
	}
	
	function filter() {
		if (!empty($this->data)) {
			$filterConditions = array();
			
			$stockMovimentId = $this->data['ViewStockMovimentItem']['stock_moviment_id'];
			$stockMovimentItemId = $this->data['ViewStockMovimentItem']['stock_moviment_item_id'];
			$enterpriseId = $this->data['ViewStockMovimentItem']['enterprise_id'];
			$enterpriseUnitId = $this->data['ViewStockMovimentItem']['enterprise_unit_id'];
			$stockId = $this->data['ViewStockMovimentItem']['stock_id'];
			$stockMovimentTypeId = $this->data['ViewStockMovimentItem']['stock_moviment_type_id'];
			$stockMovimentDateFrom = $this->data['ViewStockMovimentItem']['stock_moviment_date_from'];
			$stockMovimentDateTo = $this->data['ViewStockMovimentItem']['stock_moviment_date_to'];
		
			if (!empty($stockMovimentId)) {array_push($filterConditions, 'ViewStockMovimentItem.stock_moviment_id = ' . $stockMovimentId);}
			if (!empty($stockMovimentItemId)) {array_push($filterConditions, 'ViewStockMovimentItem.stock_moviment_item_id = ' . $this->$stockMovimentItemId);}
			if (!empty($enterpriseId)) {array_push($filterConditions, 'ViewStockMovimentItem.enterprise_id = ' . $this->$enterpriseId);}
			if (!empty($enterpriseUnitId)) {array_push($filterConditions, 'ViewStockMovimentItem.enterprise_unit_id = ' . $this->$enterpriseUnitId);}
			if (!empty($stockId)) {array_push($filterConditions, 'ViewStockMovimentItem.stock_id = ' . $this->$stockId);}
			if (!empty($stockMovimentTypeId)) {array_push($filterConditions, 'ViewStockMovimentItem.stock_moviment_type_id = ' . $this->$stockMovimentTypeId);}
			//if ((!empty($stockMovimentDateFrom)) and (!empty($stockMovimentDateTo))) {array_push($filterConditions, array('ViewStockMovimentItem.stock_moviment_date BETWEEN ? AND ?' =>
			//array($this->$stockMovimentDateFrom, $this->$stockMovimentDateTo)));}

			$this->redirect(array('action' => 'index', implode('?', $filterConditions)));
		}
		
		$enterprises = $this->ViewStockMovimentItem->Enterprise->find('list');
		$enterpriseUnits = array();
		$stocks = array();
		$stockMovimentTypes = $this->ViewStockMovimentItem->StockMovimentType->find('list');
		
		$this->set(compact('enterprises', 'enterprise_units', 'stocks', 'stockMovimentTypes'));
	}
	
	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->ViewStockMovimentItem->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['ViewStockMovimentItem']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
		
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

		$stocks = $this->ViewStockMovimentItem->Stock->find('list', array('conditions' =>
			'Stock.id in (SELECT stock_id FROM enterprise_units_stocks
				WHERE enterprise_unit_id = '.$_POST['data']['ViewStockMovimentItem']['enterprise_unit_id'].')', 'order' => 'Stock.stock_name'));
		
		echo '<option value=""></option>';
		
		foreach($stocks as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>
