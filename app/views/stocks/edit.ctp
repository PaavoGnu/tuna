<div class="stocks form">
<?php echo $this->Form->create('Stock');?>
	<fieldset>
 		<legend><?php __('Estoques - Editar'); ?></legend>
	<?php
		echo $this->Form->input('stock_name', array('label' => 'Nome'));
		echo $this->Form->input('stock_description', array('label' => 'Descri��o'));
		echo $this->Form->input('stock_enabled', array('label' => 'Habilitado'));
		echo $this->Form->input('Enterprise', array('label' => 'Empresas'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>