<div class="viewAssetMovimentItems form">
<?php echo $this->Form->create('ViewAssetMovimentItem');?>
	<fieldset>
 		<legend><?php __('Consulta do Movimento de Ativo - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
			
			$this->Js->get('#ViewAssetMovimentItemEnterpriseId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#ViewAssetMovimentItemEnterpriseId").serialize()', 
					'update' => '#ViewAssetMovimentItemEnterpriseUnitId')));
				
			$this->Js->get('#ViewAssetMovimentItemProductTypeId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getProduct'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ViewAssetMovimentItemProductTypeId").serialize()', 
				'update' => '#ViewAssetMovimentItemProductId')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>