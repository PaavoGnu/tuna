<div class="productBrands form">
<?php echo $this->Form->create('ProductBrand');?>
	<fieldset>
 		<legend><?php __('Marcas de Produto - Nova Marca de Produto'); ?></legend>
	<?php
		echo $this->Form->input('product_brand_name', array('label' => 'Nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
