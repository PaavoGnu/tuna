<div class="stockMovimentsStockItems view">
<h2><?php  __('Stock Moviments Stock Item');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentsStockItem['StockMovimentsStockItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stock Moviment Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentsStockItem['StockMovimentsStockItem']['stock_moviment_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stock Item Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentsStockItem['StockMovimentsStockItem']['stock_item_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock Moviments Stock Item', true), array('action' => 'edit', $stockMovimentsStockItem['StockMovimentsStockItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Stock Moviments Stock Item', true), array('action' => 'delete', $stockMovimentsStockItem['StockMovimentsStockItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentsStockItem['StockMovimentsStockItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Moviments Stock Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Moviments Stock Item', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
