<div class="serviceOrders form">
<?php echo $this->Form->create('ServiceOrder');?>
	<fieldset>
 		<legend><?php __('Ordens de Serviço - Encerrar'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => 'ID'));
		echo $this->Form->input('service_order_close_date', array('label' => 'Data de Encerramento', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_close_description', array('label' => 'Solução', 'type' => 'textarea'));
		echo $this->Form->input('service_order_close_user_id', array('label' => 'Usuário', 'type' => 'text', 'value' =>
			$auth->user('id'), 'readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
