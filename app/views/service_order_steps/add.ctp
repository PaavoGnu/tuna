<div class="serviceOrderSteps form">
<?php echo $this->Form->create('ServiceOrderStep');?>
	<fieldset>
 		<legend><?php __('Etapas de Ordem de Serviço - Nova Etapa de Ordem de Serviço'); ?></legend>
	<?php
		echo $this->Form->input('service_order_id', array('label' => 'Ordem de Serviço', 'type' => 'text', 'value' =>
			$serviceOrderId, 'readonly' => true));
		echo $this->Form->input('entity_technician_id', array('label' => 'Técnico', 'empty' => true));
		echo $this->Form->input('service_order_step_type_id', array('label' => 'Tipo', 'empty' => true));
		//echo $this->Form->input('service_order_step_opening_date', array('label'=>'Data de Abertura', 'dateFormat' => 'DMY', 
		//	'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_step_opening_description', array('label' => 'Descrição', 'type' => 'textarea'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
