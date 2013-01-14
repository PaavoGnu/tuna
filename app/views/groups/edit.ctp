<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
 		<legend><?php __('Grupos - Editar'); ?></legend>
	<?php
		echo $this->Form->input('group_name', array('label' => 'Nome'));
		echo $this->Form->input('group_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
