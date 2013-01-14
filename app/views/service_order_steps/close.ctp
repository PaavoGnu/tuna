<div class="serviceOrderSteps form">
<?php echo $this->Form->create('ServiceOrderStep');?>
	<fieldset>
 		<legend><?php __('Etapas de Ordem de Serviço - Encerrar'); ?></legend>
	<?php
		echo $this->Form->input('service_order_id', array('label' => 'Order de Serviço', 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('service_order_step_close_date', array('label'=>'Data de Encerramento', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_step_close_description', array('label' => 'Solução'));
		echo $this->Form->input('service_order_step_close_user_id', array('label' => 'Usuário', 'type' => 'text', 'value' =>
			$auth->user('id'), 'readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
