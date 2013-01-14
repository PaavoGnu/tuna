<div class="entitiesEntityGroups form">
<?php echo $this->Form->create('EntitiesEntityGroup');?>
	<fieldset>
 		<legend><?php __('Entidades / Grupos de Entidade - Nova Entidade / Grupo de Entidade'); ?></legend>
	<?php
		echo $this->Form->input('entity_id', array('label' => 'Entidade', 'value' => $entityId,
			'empty' => true));
		echo $this->Form->input('entity_group_id', array('label' => 'Grupo de Entidade', 'value' => $entityGroupId,
			'empty' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
