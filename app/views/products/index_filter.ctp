<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
 		<legend><?php __('Produtos - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>