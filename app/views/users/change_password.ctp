<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Usuários - Trocar Senha'); ?></legend>
	<?php
		echo $this->Form->input('user_password', array('type'=>'password', 'label'=>'Senha', 'value' => ''));
		echo $this->Form->input('user_password_confirmation', array('type'=>'password', 'label'=>'Confirmação da Senha', 'value' => ''));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
