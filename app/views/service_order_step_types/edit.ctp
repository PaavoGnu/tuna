<div class="serviceOrderStepTypes form">
<?php echo $this->Form->create('ServiceOrderStepType');?>
	<fieldset>
 		<legend><?php __('Tipos de Etapa de Ordem de Serviço - Editar'); ?></legend>
	<?php
		echo $this->Form->input('service_order_step_type_number', array('label' => 'Número'));
		echo $this->Form->input('id', array('label' => 'ID'));
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('service_order_step_type_name', array('label' => 'Nome'));
		echo $this->Form->input('service_order_step_type_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
