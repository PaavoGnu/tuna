<div class="serviceOrderProducts form">
<?php echo $this->Form->create('ServiceOrderProduct');?>
	<fieldset>
 		<legend><?php __('Produtos de Ordem de Serviço - Editar'); ?></legend>
	<?php
		echo $this->Form->input('service_order_id', array('label' => 'Ordem de Serviço', 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('product_id', array('label' => 'Produto', 'empty' => true));
		echo $this->Form->input('measure_unit_id', array('label' => 'Unidade de Medida', 'empty' => true));
		echo $this->Form->input('service_order_product_amount', array('label' => 'Quantidade'));
		echo $this->Form->input('service_order_product_serial_number', array('label' => 'Número de Série'));
		echo $this->Form->input('service_order_product_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>