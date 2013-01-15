<div class="stockItems index">
	<h2><?php __('Stock Items');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('measure_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('stock_item_amount');?></th>
			<th><?php echo $this->Paginator->sort('stock_item_description');?></th>
			<th><?php echo $this->Paginator->sort('stock_item_serial_number');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stockItems as $stockItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stockItem['StockItem']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stockItem['ParentStockItem']['id'], array('controller' => 'stock_items', 'action' => 'view', $stockItem['ParentStockItem']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockItem['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $stockItem['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockItem['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view', $stockItem['MeasureUnit']['id'])); ?>
		</td>
		<td><?php echo $stockItem['StockItem']['stock_item_amount']; ?>&nbsp;</td>
		<td><?php echo $stockItem['StockItem']['stock_item_description']; ?>&nbsp;</td>
		<td><?php echo $stockItem['StockItem']['stock_item_serial_number']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $stockItem['StockItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $stockItem['StockItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $stockItem['StockItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockItem['StockItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>