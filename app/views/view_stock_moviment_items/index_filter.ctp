<div class="viewStockMovimentItems form">
<?php echo $this->Form->create('ViewStockMovimentItem');?>
	<fieldset>
 		<legend><?php __('Consulta do Movimento de Estoque - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
			
			$this->Js->get('#ViewStockMovimentItemEnterpriseId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#ViewStockMovimentItemEnterpriseId").serialize()', 
					'update' => '#ViewStockMovimentItemEnterpriseUnitId')));
				
			$this->Js->get('#ViewStockMovimentItemEnterpriseUnitId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getStock'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#ViewStockMovimentItemEnterpriseUnitId").serialize()', 
					'update' => '#ViewStockMovimentItemStockId')));
					
			$this->Js->get('#ViewStockMovimentItemProductTypeId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getProduct'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ViewStockMovimentItemProductTypeId").serialize()', 
				'update' => '#ViewStockMovimentItemProductId')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>