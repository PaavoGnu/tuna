<div class="measureUnits form">
<?php echo $this->Form->create('MeasureUnit');?>
	<fieldset>
 		<legend><?php __('Unidades de Medida - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>