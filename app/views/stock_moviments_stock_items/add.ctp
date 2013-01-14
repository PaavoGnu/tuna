<div class="stockMovimentsStockItems form">
<?php echo $this->Form->create('StockMovimentsStockItem');?>
	<fieldset>
 		<legend><?php __('Add Stock Moviments Stock Item'); ?></legend>
	<?php
		echo $this->Form->input('stock_moviment_id');
		echo $this->Form->input('stock_item_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stock Moviments Stock Items', true), array('action' => 'index'));?></li>
	</ul>
</div>