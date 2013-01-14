<div class="serviceOrderProducts form">
<?php echo $this->Form->create('ServiceOrderProduct');?>
	<fieldset>
 		<legend><?php __('Produtos de Ordem de Serviço - Estocar'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('stock_id', array('label' => 'Estoque', 'empty' => true));
		echo $this->Form->input('stock_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('user_id', array('label' => 'Usuário', 'type' => 'text', 'value' =>
			$auth->user('id'), 'readonly' => true));
		echo $this->Form->input('stock_moviment_date', array('type' => 'datetime', 'label' => 'Data', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('stock_moviment_description', array('label' => 'Descrição do Movimento'));echo $this->Form->input('service_order_id', array('label' => 'Ordem de Serviço', 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('product_id', array('label' => 'Produto', 'empty' => true, 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('measure_unit_id', array('label' => 'Unidade de Medida', 'empty' => true, 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('service_order_product_amount', array('label' => 'Quantidade', 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('service_order_product_serial_number', array('label' => 'Número de Série', 'type' => 'text', 'readonly' => true));
		echo $this->Form->input('service_order_product_description', array('label' => 'Descrição do Produto', 'type' => 'text', 'readonly' => true));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>