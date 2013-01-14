<div class="entityGroups form">
<?php echo $this->Form->create('EntityGroup');?>
	<fieldset>
 		<legend><?php __('Grupos de Entidade - Editar'); ?></legend>
	<?php
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('entity_group_name', array('label' => 'Nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
