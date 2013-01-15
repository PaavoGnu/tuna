<div class="stocks form">
<?php echo $this->Form->create('Stock');?>
	<fieldset>
 		<legend><?php __('Estoques - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>