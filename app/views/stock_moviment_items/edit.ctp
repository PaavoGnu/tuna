<div class="stockMovimentItems form">
<?php echo $this->Form->create('StockMovimentItem');?>
	<fieldset>
 		<legend><?php __('Itens de Movimento de Estoque - Editar'); ?></legend>
	<?php
		echo $this->Form->input('stock_moviment_id', array('label' => 'Movimento de Estoque', 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('product_id', array('label' => 'Produto', 'empty' => true));
		echo $this->Form->input('measure_unit_id', array('label' => 'Unidade de Medida', 'empty' => true));
		echo $this->Form->input('stock_moviment_item_amount', array('label' => 'Quantidade'));
		echo $this->Form->input('stock_moviment_item_serial_number', array('label' => 'Número de Série'));
		echo $this->Form->input('stock_moviment_item_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>