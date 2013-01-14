<div class="enterprises form">
<?php echo $this->Form->create('Enterprise');?>
	<fieldset>
 		<legend><?php __('Empresas - Editar'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => 'ID'));
		echo $this->Form->input('entity_id', array('label' => 'Entidade'));
		echo $this->Form->input('Stock', array('label' => 'Estoques'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>
