<div class="enterprises form">
<?php echo $this->Form->create('Enterprise');?>
	<fieldset>
 		<legend><?php __('Empresas - Nova Empresa'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_number', array('label' => 'Número'));
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('entity_id', array('label' => 'Entidade'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
