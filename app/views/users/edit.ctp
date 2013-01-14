<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Usuários - Editar'); ?></legend>
	<?php
		echo $this->Form->input('entity_id', array('label' => 'Entidade', 'empty' => true));
		echo $this->Form->input('user_login', array('label' => 'Login', 'readonly' => true));
		echo $this->Form->input('user_enabled', array('label'=>'Habilitado'));
		echo $this->Form->input('Group', array('label' => 'Grupos'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
