<div class="viewStockMovimentItems form">
<?php echo $this->Form->create('ViewStockMovimentItem');?>
	<fieldset>
 		<legend><?php __('Consulta do Movimento de Estoque - Filtro'); ?></legend>
	<?php
		echo $this->Form->input('stock_moviment_id', array('type' => 'text', 'label' => 'Movimento', 'empty' => true));
		echo $this->Form->input('stock_moviment_item_id', array('type' => 'text', 'label' => 'Item', 'empty' => true));
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('enterprise_unit_id', array('label' => 'Unidade de Empresa', 'empty' => true));
		echo $this->Form->input('stock_id', array('label' => 'Estoque', 'empty' => true));
		echo $this->Form->input('stock_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('stock_moviment_date_from', array('type' => 'date', 'label' => 'Data (De)', 'dateFormat' => 'DMY', 'minYear' => '2000'));
		echo $this->Form->input('stock_moviment_date_to', array('type' => 'date', 'label' => 'Data (Até)', 'dateFormat' => 'DMY', 'minYear' => '2000'));
		
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
	?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>