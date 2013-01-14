<?php
class AssetMovimentItemsController extends AppController {

	var $name = 'AssetMovimentItems';

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid asset moviment item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assetMovimentItem', $this->AssetMovimentItem->read(null, $id));
	}

	function add($assetMovimentId = null) {
		if (!empty($this->data)) {
			$this->data['AssetMovimentItem']['user_id'] = $this->Auth->user('id');
			$this->data['AssetMovimentItem']['asset_moviment_item_date'] = date('Y-m-d H:i:s');
			$this->AssetMovimentItem->create();
			
			if ($this->AssetMovimentItem->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment item has been saved', true));
				$this->redirect(array('controller' => 'asset_moviments', 'action' => 'view', $this->data['AssetMovimentItem']['asset_moviment_id']));
			} else {
				$this->Session->setFlash(__('The asset moviment item could not be saved. Please, try again.', true));
			}
		}
		$productTypes = $this->AssetMovimentItem->ProductType->find('list');
		$products = array();
		$measureUnits = $this->AssetMovimentItem->MeasureUnit->find('list');
		$this->set(compact('assetMovimentId', 'productTypes', 'productBrands', 'products', 'measureUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid asset moviment item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['AssetMovimentItem']['user_id'] = $this->Auth->user('id');
			$this->data['AssetMovimentItem']['asset_moviment_item_date'] = date('Y-m-d H:i:s');
			
			if ($this->AssetMovimentItem->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment item has been saved', true));
				$this->redirect(array('controller' => 'asset_moviments', 'action' => 'view', $this->data['AssetMovimentItem']['asset_moviment_id']));
			} else {
				$this->Session->setFlash(__('The asset moviment item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AssetMovimentItem->read(null, $id);
		}
		$productTypes = $this->AssetMovimentItem->ProductType->find('list');
		$products = $this->AssetMovimentItem->Product->find('list');
		$measureUnits = $this->AssetMovimentItem->MeasureUnit->find('list');
		$this->set(compact('productTypes', 'productBrands', 'products', 'measureUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for asset moviment item', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->data = $this->AssetMovimentItem->read(null, $id);
			$assetMovimentId = $this->data['AssetMovimentItem']['asset_moviment_id'];
		}
		if ($this->AssetMovimentItem->delete($id)) {
			$this->Session->setFlash(__('Asset moviment item deleted', true));
			$this->redirect(array('controller' => 'asset_moviments', 'action' => 'view', $assetMovimentId));
		}
		$this->Session->setFlash(__('Asset moviment item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getProduct() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$products = $this->AssetMovimentItem->Product->find('list', array('conditions' =>
			'Product.id in (SELECT id FROM products WHERE product_type_id = ' . 
				$_POST['data']['AssetMovimentItem']['product_type_id'] . ')', 'order' => 'Product.id'));
		
		echo '<option value=""></option>';
		
		foreach($products as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>