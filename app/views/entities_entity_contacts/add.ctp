<div class="entitiesEntityContacts form">
<?php echo $this->Form->create('EntitiesEntityContact');?>
	<fieldset>
 		<legend><?php __('Entidades / Contatos de Entidade - Nova Entidade / Contato de Entidade'); ?></legend>
	<?php
		echo $this->Form->input('entity_id', array('label' => 'Entidade', 'value' => $entityId,
			'empty' => true));
		echo $this->Form->input('entity_contact_id', array('label' => 'Contato de Entidade', 'value' => $entityContactId,
			'empty' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
