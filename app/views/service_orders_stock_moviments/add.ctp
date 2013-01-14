<div class="serviceOrdersStockMoviments form">
<?php echo $this->Form->create('ServiceOrdersStockMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Estoque da Ordem de Serviço - Novo Movimento de Estoque da Ordem de Serviço'); ?></legend>
	<?php
		echo $this->Form->input('service_order_id', array('label' => 'Ordem de Serviço', 'type' => 'text', 'value' =>
			$serviceOrderId, 'readonly' => true));
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('enterprise_unit_id', array('label' => 'Unidade de Empresa', 'empty' => true));
		echo $this->Form->input('stock_id', array('label' => 'Estoque', 'empty' => true));
		echo $this->Form->input('stock_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('stock_moviment_date', array('type' => 'datetime', 'label' => 'Data', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('stock_moviment_description', array('label' => 'Descrição'));
		
		$this->Js->get('#ServiceOrdersStockMovimentEnterpriseId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrdersStockMovimentEnterpriseId").serialize()', 
				'update' => '#ServiceOrdersStockMovimentEnterpriseUnitId')));
				
		$this->Js->get('#ServiceOrdersStockMovimentEnterpriseUnitId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getStock'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrdersStockMovimentEnterpriseUnitId").serialize()', 
				'update' => '#ServiceOrdersStockMovimentStockId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>