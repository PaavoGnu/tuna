<div class="productTypes form">
<?php echo $this->Form->create('ProductType');?>
	<fieldset>
 		<legend><?php __('Tipos de Produto - Novo Tipo de Produto'); ?></legend>
	<?php
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('product_type_name', array('label' => 'Nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
