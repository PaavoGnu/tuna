<?php
class ViewAssetMovimentItemsController extends AppController {

	var $name = 'ViewAssetMovimentItems';

	function index() {
		parent::index();
	
		$this->ViewAssetMovimentItem->recursive = 0;
		$this->set('viewAssetMovimentItems', $this->paginate());
	}
		
	function indexFilter() {
		parent::indexFilter();
		
		$enterprises = $this->ViewAssetMovimentItem->Enterprise->find('list');
		$enterpriseUnits = array();
		$assetMovimentTypes = $this->ViewAssetMovimentItem->AssetMovimentType->find('list');
		$productTypes = $this->ViewAssetMovimentItem->ProductType->find('list');
		$products = array();
		$measureUnits = $this->ViewAssetMovimentItem->MeasureUnit->find('list');
		
		$this->set(compact('enterprises', 'enterpriseUnits', 'assetMovimentTypes', 'productTypes', 'products', 'measureUnits'));
	}
	
	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->ViewAssetMovimentItem->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['ViewAssetMovimentItem']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
		
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

		$products = $this->ViewAssetMovimentItem->Product->find('list', array('conditions' =>
			'Product.id in (SELECT id FROM products WHERE product_type_id = ' . 
				$_POST['data']['ViewAssetMovimentItem']['product_type_id'] . ')', 'order' => 'Product.product_structure'));
		
		echo '<option value=""></option>';
		
		foreach($products as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>