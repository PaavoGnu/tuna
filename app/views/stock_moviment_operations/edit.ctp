<div class="stockMovimentOperations form">
<?php echo $this->Form->create('StockMovimentOperation');?>
	<fieldset>
 		<legend><?php __('Operações de Movimento de Estoque - Editar'); ?></legend>
	<?php
		echo $this->Form->input('stock_moviment_operation_name', array('label' => 'Nome'));
		echo $this->Form->input('stock_moviment_operation_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>