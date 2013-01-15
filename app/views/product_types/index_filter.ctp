<div class="productTypes form">
<?php echo $this->Form->create('ProductType');?>
	<fieldset>
 		<legend><?php __('Tipos de Produto - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>