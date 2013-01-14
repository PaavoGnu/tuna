<div class="assetMoviments form">
<?php echo $this->Form->create('AssetMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Ativo - Novo Movimento de Ativo'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('enterprise_unit_id', array('label' => 'Unidade de Empresa', 'empty' => true));
		echo $this->Form->input('asset_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('asset_moviment_date', array('label' => 'Data', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('asset_moviment_description', array('label' => 'Descrição'));
				
		$this->Js->get('#AssetMovimentEnterpriseId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#AssetMovimentEnterpriseId").serialize()', 
				'update' => '#AssetMovimentEnterpriseUnitId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>