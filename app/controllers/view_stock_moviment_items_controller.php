<?php
class ViewStockMovimentItemsController extends AppController {

	var $name = 'ViewStockMovimentItems';

	function index($filterConditions = null) {	
		parent::index();
	
		$this->ViewStockMovimentItem->recursive = 0;
		$this->set('viewStockMovimentItems', $this->paginate());
	}
		
	function indexFilter() {
		parent::indexFilter();
		
		$enterprises = $this->ViewStockMovimentItem->Enterprise->find('list');
		$enterpriseUnits = array();
		$stocks = array();
		$stockMovimentTypes = $this->ViewStockMovimentItem->StockMovimentType->find('list');
		$productTypes = $this->ViewStockMovimentItem->ProductType->find('list');
		$products = array();
		$measureUnits = $this->ViewStockMovimentItem->MeasureUnit->find('list');
		
		$this->set(compact('enterprises', 'enterpriseUnits', 'stocks', 'stockMovimentTypes', 'productTypes', 'products', 'measureUnits'));
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
	
	function getProduct() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$products = $this->ViewStockMovimentItem->Product->find('list', array('conditions' =>
			'Product.id in (SELECT id FROM products WHERE product_type_id = ' . 
				$_POST['data']['ViewStockMovimentItem']['product_type_id'] . ')', 'order' => 'Product.product_structure'));
		
		echo '<option value=""></option>';
		
		foreach($products as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>
