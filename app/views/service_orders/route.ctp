<div class="serviceOrders form">
<?php echo $this->Form->create('ServiceOrder');?>
	<fieldset>
 		<legend><?php __('Ordens de Serviço - Encaminhar'); ?></legend>
	<?php
		echo $this->Form->input('entity_technician_id', array('label' => 'Técnico', 'empty' => true));
		echo $this->Form->input('service_order_routing_date', array('label' => 'Data de Encaminhamento', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_routing_user_id', array('label' => 'Usuário', 'type' => 'text', 'value' =>
			$auth->user('id'), 'readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
