<div class="entityTechnicians form">
<?php echo $this->Form->create('EntityTechnician');?>
	<fieldset>
 		<legend><?php __('Técnicos - Novo Técnico'); ?></legend>
	<?php
		echo $this->Form->input('entity_id', array('label' => 'Entidade'));
		echo $this->Form->input('entity_technician_enabled', array('label' => 'Habilitado'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
