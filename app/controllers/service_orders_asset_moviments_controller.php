<?php
class ServiceOrdersAssetMovimentsController extends AppController {

	var $name = 'ServiceOrdersAssetMoviments';
	
	function add($serviceOrderId = null) {
		if (!empty($this->data)) {
			$this->ServiceOrdersAssetMoviment->AssetMoviment->create();
			
			$assetMovimentData['AssetMoviment']['enterprise_id'] = $this->data['ServiceOrdersAssetMoviment']['enterprise_id'];
			$assetMovimentData['AssetMoviment']['enterprise_unit_id'] = $this->data['ServiceOrdersAssetMoviment']['enterprise_unit_id'];
			$assetMovimentData['AssetMoviment']['asset_id'] = $this->data['ServiceOrdersAssetMoviment']['asset_id'];
			$assetMovimentData['AssetMoviment']['asset_moviment_type_id'] = $this->data['ServiceOrdersAssetMoviment']['asset_moviment_type_id'];
			$assetMovimentData['AssetMoviment']['asset_moviment_date'] = $this->data['ServiceOrdersAssetMoviment']['asset_moviment_date'];
			$assetMovimentData['AssetMoviment']['user_id'] = $this->Auth->user('id');
			$assetMovimentData['AssetMoviment']['asset_moviment_description'] = $this->data['ServiceOrdersAssetMoviment']['asset_moviment_description'];
			
			$this->ServiceOrdersAssetMoviment->AssetMoviment->save($assetMovimentData);
			$this->ServiceOrdersAssetMoviment->create();
			
			$serviceOrdersAssetMovimentData['ServiceOrdersAssetMoviment']['asset_moviment_id'] = $this->ServiceOrdersAssetMoviment->AssetMoviment->id;
			$serviceOrdersAssetMovimentData['ServiceOrdersAssetMoviment']['service_order_id'] = $this->data['ServiceOrdersAssetMoviment']['service_order_id'];
						
			if ($this->ServiceOrdersAssetMoviment->save($serviceOrdersAssetMovimentData)) {
				$this->Session->setFlash(__('The asset moviment has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrdersAssetMoviment']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The asset moviment could not be saved. Please, try again.', true));
			}
		}
		
		$enterprises = $this->ServiceOrdersAssetMoviment->Enterprise->find('list');
		$enterpriseUnits = array();
		$assets = array();
		$assetMovimentTypes = $this->ServiceOrdersAssetMoviment->AssetMovimentType->find('list');
		$serviceOrders = $this->ServiceOrdersAssetMoviment->ServiceOrder->find('list');
		
		$this->set(compact('serviceOrderId', 'enterprises', 'enterprise_units', 'assets', 'assetMovimentTypes', 'serviceOrders'));
	}

	function delete($serviceOrderId = null, $assetMovimentId = null) {
		if ((!$serviceOrderId) or (!$assetMovimentId)) {
			$this->Session->setFlash(__('Invalid id for asset moviment', true));
			$this->redirect(array('action'=>'index'));
		} else {
			if ($this->ServiceOrdersAssetMoviment->AssetMoviment->delete($assetMovimentId)) {
				$this->Session->setFlash(__('Asset moviment deleted', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $serviceOrderId));
			} else {
			  $this->Session->setFlash(__('Asset moviment was not deleted', true));
			  $this->redirect(array('controller' => 'service_orders', 'action' => 'view', $serviceOrderId));
			}
		}
	}
	
  	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->ServiceOrdersAssetMoviment->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['ServiceOrdersAssetMoviment']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
				
		echo '<option value=""></option>';
		
		foreach($enterpriseUnits as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>
