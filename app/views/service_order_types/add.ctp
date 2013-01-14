<div class="serviceOrderTypes form">
<?php echo $this->Form->create('ServiceOrderType');?>
	<fieldset>
 		<legend><?php __('Tipos de Ordem de Serviço - Novo Tipo de Ordem de Serviço'); ?></legend>
	<?php
		echo $this->Form->input('service_order_type_number', array('label' => 'Número'));
		echo $this->Form->input('parent_id', array('label' => 'Grupo', 'empty' => '-'));
		echo $this->Form->input('service_order_type_name', array('label' => 'Nome'));
		echo $this->Form->input('service_order_type_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>