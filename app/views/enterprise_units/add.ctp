<div class="enterprise_units form">
<?php echo $this->Form->create('EnterpriseUnit');?>
	<fieldset>
 		<legend><?php __('Unidades de Empresa - Nova Unidade de Empresa'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_unit_number', array('label' => 'Número'));
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('entity_id', array('label' => 'Entidade', 'empty' => true));
		echo $this->Form->input('Enterprise', array('label' => 'Empresas'));
		echo $this->Form->input('Stock', array('label' => 'Estoques'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
