<div class="assetMoviments form">
<?php echo $this->Form->create('AssetMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Ativo - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
			
			$this->Js->get('#AssetMovimentEnterpriseId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#AssetMovimentEnterpriseId").serialize()', 
					'update' => '#AssetMovimentEnterpriseUnitId')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>