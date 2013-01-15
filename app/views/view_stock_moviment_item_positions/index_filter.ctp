<div class="viewStockMovimentItemPositions form">
<?php echo $this->Form->create('ViewStockMovimentItemPosition');?>
	<fieldset>
 		<legend><?php __('Posição do Movimento de Estoque - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
			
			$this->Js->get('#ViewStockMovimentItemPositionEnterpriseId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#ViewStockMovimentItemPositionEnterpriseId").serialize()', 
					'update' => '#ViewStockMovimentItemPositionEnterpriseUnitId')));
				
			$this->Js->get('#ViewStockMovimentItemPositionEnterpriseUnitId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getStock'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#ViewStockMovimentItemPositionEnterpriseUnitId").serialize()', 
					'update' => '#ViewStockMovimentItemPositionStockId')));
					
			$this->Js->get('#ViewStockMovimentItemPositionProductTypeId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getProduct'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ViewStockMovimentItemPositionProductTypeId").serialize()', 
				'update' => '#ViewStockMovimentItemPositionProductId')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>