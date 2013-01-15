<?php
class ViewAssetMovimentItemPositionsController extends AppController {

	var $name = 'ViewAssetMovimentItemPositions';

	function index() {
		parent::index();
	
		$this->ViewAssetMovimentItemPosition->recursive = 0;
		$this->set('viewAssetMovimentItemPositions', $this->paginate());
	}	
	
	function indexFilter() {
		parent::indexFilter();
		
		$enterprises = $this->ViewAssetMovimentItemPosition->Enterprise->find('list');
		$enterpriseUnits = array();
		$productTypes = $this->ViewAssetMovimentItemPosition->ProductType->find('list');
		$products = array();
		$measureUnits = $this->ViewAssetMovimentItemPosition->MeasureUnit->find('list');
		
		$this->set(compact('enterprises', 'enterpriseUnits', 'productTypes', 'products', 'measureUnits'));
	}
	
	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->ViewAssetMovimentItemPosition->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['ViewAssetMovimentItemPosition']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
		
		echo '<option value=""></option>';

		foreach($enterpriseUnits as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
	
	function getProduct() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$products = $this->ViewAssetMovimentItemPosition->Product->find('list', array('conditions' =>
			'Product.id in (SELECT id FROM products WHERE product_type_id = ' . 
				$_POST['data']['ViewAssetMovimentItemPosition']['product_type_id'] . ')', 'order' => 'Product.product_structure'));
		
		echo '<option value=""></option>';
		
		foreach($products as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>