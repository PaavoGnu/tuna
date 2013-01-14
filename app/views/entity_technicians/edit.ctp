 <div class="entityTechnicians form">
<?php echo $this->Form->create('EntityTechnician');?>
	<fieldset>
 		<legend><?php __('Técnicos - Editar'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => 'ID'));
		echo $this->Form->input('entity_technician_enabled', array('label' => 'Habilitado'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
