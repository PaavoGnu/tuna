<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Produtos - Editar'); ?></legend>
	<?php
		echo $this->Form->input('product_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('product_brand_id', array('label' => 'Marca', 'empty' => true));
		echo $this->Form->input('product_name', array('label' => 'Nome'));
		echo $this->Form->input('product_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
