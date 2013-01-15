<div class="stockMovimentsStockItems index">
	<h2><?php __('Stock Moviments Stock Items');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('stock_moviment_id');?></th>
			<th><?php echo $this->Paginator->sort('stock_item_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stockMovimentsStockItems as $stockMovimentsStockItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stockMovimentsStockItem['StockMovimentsStockItem']['id']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentsStockItem['StockMovimentsStockItem']['stock_moviment_id']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentsStockItem['StockMovimentsStockItem']['stock_item_id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $stockMovimentsStockItem['StockMovimentsStockItem']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $stockMovimentsStockItem['StockMovimentsStockItem']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $stockMovimentsStockItem['StockMovimentsStockItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentsStockItem['StockMovimentsStockItem']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>