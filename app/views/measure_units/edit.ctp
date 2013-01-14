<div class="measureUnits form">
<?php echo $this->Form->create('MeasureUnit');?>
	<fieldset>
 		<legend><?php __('Unidades de Medida - Editar'); ?></legend>
	<?php
		echo $this->Form->input('measure_unit_name', array('label' => 'Nome'));
		echo $this->Form->input('measure_unit_abbreviation', array('label' => 'Sigla'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>