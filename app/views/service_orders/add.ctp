<div class="serviceOrders form">
<?php echo $this->Form->create('ServiceOrder');?>
	<fieldset>
 		<legend><?php __('Ordens de Serviço - Nova Ordem de Serviço'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'value' => 1));
		echo $this->Form->input('enterprise_unit_id', array('label' => 'Unidade de Empresa', 'value' => 1));
		echo $this->Form->input('entity_group_id', array('label' => 'Grupo de Entidade', 'empty' => true));
		echo $this->Form->input('entity_id', array('label' => 'Entidade', 'empty' => true));
		echo $this->Form->input('entity_contact_id', array('label' => 'Contato', 'empty' => true));
		echo $this->Form->input('service_order_priority_type_id', array('label' => 'Prioridade', 'empty' => true));
		echo $this->Form->input('service_order_type_id', array('label' => 'Tipo', 'empty' => true));
		//echo $this->Form->input('service_order_warranty', array('label' => 'Garantia'));
		//echo $this->Form->input('service_order_warranty_description', array('label' => 'Descrição da Garantia', 'type' => 'textarea'));
		//echo $this->Form->input('service_order_opening_date', array('label' => 'Data de Abertura', 'dateFormat' => 'DMY', 
		//	'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_opening_description', array('label' => 'Descrição', 'type' => 'textarea'));
		echo $this->Form->input('service_order_opening_observation', array('label' => 'Observação', 'type' => 'textarea'));
		
		$this->Js->get('#ServiceOrderEntityGroupId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEntity'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrderEntityGroupId").serialize()', 
				'update' => '#ServiceOrderEntityId')));
						
		$this->Js->get('#ServiceOrderEntityId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEntityContact'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrderEntityId").serialize()', 
				'update' => '#ServiceOrderEntityContactId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
