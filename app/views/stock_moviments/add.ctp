<div class="stockMoviments form">
<?php echo $this->Form->create('StockMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Estoque - Novo Movimento de Estoque'); ?></legend>
	<?php
		echo $this->Form->input('enterprise_id', array('label' => 'Empresa', 'empty' => true));
		echo $this->Form->input('stock_id', array('label' => 'Estoque', 'empty' => true));
		echo $this->Form->input('stock_moviment_type_id', array('label' => 'Tipo', 'empty' => true));
		echo $this->Form->input('user_id', array('label' => 'Usuário', 'type' => 'text', 'value' =>
			$auth->user('id'), 'readonly' => true));
		echo $this->Form->input('stock_moviment_date', array('label' => 'Data', 'dateFormat' => 'DMY', 
			'timeFormat' => '24', 'minYear' => '2000'));
		echo $this->Form->input('stock_moviment_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>