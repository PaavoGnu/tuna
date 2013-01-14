<div class="stocks form">
<?php echo $this->Form->create('Stock');?>
	<fieldset>
 		<legend><?php __('Estoques - Novo Estoque'); ?></legend>
	<?php
		echo $this->Form->input('stock_name', array('label' => 'Nome'));
		echo $this->Form->input('stock_description', array('label' => 'Descrição'));
		echo $this->Form->input('stock_enabled', array('label' => 'Habilitado'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>