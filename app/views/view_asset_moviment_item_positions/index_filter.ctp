<div class="viewAssetMovimentItemPositions form">
<?php echo $this->Form->create('ViewAssetMovimentItemPosition');?>
	<fieldset>
 		<legend><?php __('Posição do Movimento de Ativo - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
			
			$this->Js->get('#ViewAssetMovimentItemPositionEnterpriseId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#ViewAssetMovimentItemPositionEnterpriseId").serialize()', 
					'update' => '#ViewAssetMovimentItemPositionEnterpriseUnitId')));
				
			$this->Js->get('#ViewAssetMovimentItemPositionProductTypeId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getProduct'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ViewAssetMovimentItemPositionProductTypeId").serialize()', 
				'update' => '#ViewAssetMovimentItemPositionProductId')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>