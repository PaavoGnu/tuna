<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Produtos - Editar'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label'=>'ID'));
		echo $this->Form->input('product_type_id', array('label'=>'Tipo'));
		echo $this->Form->input('product_brand_id', array('label'=>'Marca'));
		echo $this->Form->input('product_name', array('label'=>'Nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
