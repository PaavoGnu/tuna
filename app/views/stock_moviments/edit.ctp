<div class="stockMoviments form">
<?php echo $this->Form->create('StockMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Estoque - Editar'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('enterprise_unit_id', array('label' => 'Unidade de Empresa', 'empty' => true));
		echo $this->Form->input('stock_id', array('label' => 'Estoque', 'empty' => true));
		echo $this->Form->input('stock_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('stock_moviment_date', array('label' => 'Data', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('stock_moviment_description', array('label' => 'Descrição'));
		
		$this->Js->get('#StockMovimentEnterpriseId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#StockMovimentEnterpriseId").serialize()', 
				'update' => '#StockMovimentEnterpriseUnitId')));
				
		$this->Js->get('#StockMovimentEnterpriseUnitId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getStock'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#StockMovimentEnterpriseUnitId").serialize()', 
				'update' => '#StockMovimentStockId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>