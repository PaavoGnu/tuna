<div class="stockItems form">
<?php echo $this->Form->create('StockItem');?>
	<fieldset>
 		<legend><?php __('Add Stock Item'); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('measure_unit_id');
		echo $this->Form->input('stock_item_amount');
		echo $this->Form->input('stock_item_description');
		echo $this->Form->input('stock_item_serial_number');
		echo $this->Form->input('StockMoviment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stock Items', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Stock Items', true), array('controller' => 'stock_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Stock Item', true), array('controller' => 'stock_items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units', true), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit', true), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Moviments', true), array('controller' => 'stock_moviments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Moviment', true), array('controller' => 'stock_moviments', 'action' => 'add')); ?> </li>
	</ul>
</div>