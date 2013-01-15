<div class="productBrands form">
<?php echo $this->Form->create('ProductBrand');?>
	<fieldset>
 		<legend><?php __('Marcas - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>