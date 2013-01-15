<div class="serviceOrders form">
<?php echo $this->Form->create('ServiceOrder');?>
	<fieldset>
 		<legend><?php __('Ordens de Serviço - Avaliar'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => 'ID'));
		//echo $this->Form->input('service_order_evaluation_date', array('label' => 'Data de Avaliação', 'dateFormat' => 'DMY', 
		//	'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('service_order_evaluation_type_id', array('label' => 'Avaliação', 'empty' => true));
		echo $this->Form->input('service_order_evaluation_entity_group_id', array('label' => 'Grupo de Entidade', 'empty' => true));
		echo $this->Form->input('service_order_evaluation_entity_id', array('label' => 'Entidade', 'empty' => true));
		echo $this->Form->input('service_order_evaluation_description', array('label' => 'Descrição', 'type' => 'textarea'));
		
		$this->Js->get('#ServiceOrderServiceOrderEvaluationEntityGroupId');
		$this->Js->event('change', $this->Js->request(array('action' => 'getEvaluationEntity'),
			array(
				'async' => true, 'method' => 'POST', 'dataExpression' => true,
				'data' => '$("#ServiceOrderServiceOrderEvaluationEntityGroupId").serialize()', 
				'update' => '#ServiceOrderServiceOrderEvaluationEntityId')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
