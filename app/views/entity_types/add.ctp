<div class="entityTypes form">
<?php echo $this->Form->create('EntityType');?>
	<fieldset>
 		<legend><?php __('Tipos de Entidade - Novo Tipo de Entidade'); ?></legend>
	<?php
		echo $this->Form->input('entity_type_number', array('label' => 'Número'));
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('entity_type_name', array('label' => 'Nome'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
