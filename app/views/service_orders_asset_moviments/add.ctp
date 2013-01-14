<div class="serviceOrdersAssetMoviments form">
<?php echo $this->Form->create('ServiceOrdersAssetMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Ativo da Ordem de Serviço - Novo Movimento de Ativo da Ordem de Serviço'); ?></legend>
	<?php
		echo $this->Form->input('service_order_id', array('label' => 'Ordem de Serviço', 'type' => 'text', 'value' =>
			$serviceOrderId, 'readonly' => true));
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('enterprise_unit_id', array('label' => 'Unidade de Empresa', 'empty' => true));
		echo $this->Form->input('asset_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('asset_moviment_date', array('type' => 'datetime', 'label' => 'Data', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('asset_moviment_description', array('label' => 'Descrição'));
		
		$this->Js->get('#ServiceOrdersAssetMovimentEnterpriseId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrdersAssetMovimentEnterpriseId").serialize()', 
				'update' => '#ServiceOrdersAssetMovimentEnterpriseUnitId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>