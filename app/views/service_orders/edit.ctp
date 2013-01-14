<div class="serviceOrders form">
<?php echo $this->Form->create('ServiceOrder');?>
	<fieldset>
 		<legend><?php __('Ordens de Serviço - Editar'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa'));
		echo $this->Form->input('entity_group_id', array('label' => 'Grupo de Entidade', 'empty' => true));
		echo $this->Form->input('entity_id', array('label' => 'Entidade', 'empty' => true));
		echo $this->Form->input('service_order_priority_id', array('label' => 'Prioridade', 'empty' => true));
		echo $this->Form->input('service_order_type_id', array('label' => 'Tipo', 'empty' => true));
		//echo $this->Form->input('service_order_warranty', array('label' => 'Garantia'));
		//echo $this->Form->input('service_order_warranty_description', array('label' => 'Descrição da Garantia', 'type' => 'textarea'));
		echo $this->Form->input('service_order_opening_date', array('label' => 'Data de Abertura', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_opening_description', array('label' => 'Descrição', 'type' => 'textarea'));
		echo $this->Form->input('service_order_opening_observation', array('label' => 'Observação', 'type' => 'textarea'));
		
		$this->Js->get('#ServiceOrderEntityGroupId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEntity'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrderEntityGroupId").serialize()', 
				'update' => '#ServiceOrderEntityId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
