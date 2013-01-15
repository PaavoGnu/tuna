<div class="serviceOrders form">
<?php echo $this->Form->create('ServiceOrder');?>
	<fieldset>
 		<legend><?php __('Ordens de Serviço - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		
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
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>