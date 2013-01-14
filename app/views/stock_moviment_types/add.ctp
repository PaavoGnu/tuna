<div class="stockMovimentTypes form">
<?php echo $this->Form->create('StockMovimentType');?>
	<fieldset>
 		<legend><?php __('Tipos de Movimento de Estoque - Novo Tipo de Movimento de Estoque'); ?></legend>
	<?php
		echo $this->Form->input('stock_moviment_type_number', array('label' => 'Número'));
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('stock_moviment_operation_id', array('label' => 'Operação', 'empty' => true));
		echo $this->Form->input('stock_moviment_type_name', array('label' => 'Nome'));
		echo $this->Form->input('stock_moviment_type_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>