<div class="stockItems view">
<h2><?php  __('Stock Item');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockItem['StockItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Stock Item'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockItem['ParentStockItem']['id'], array('controller' => 'stock_items', 'action' => 'view', $stockItem['ParentStockItem']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockItem['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $stockItem['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Measure Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockItem['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view', $stockItem['MeasureUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stock Item Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockItem['StockItem']['stock_item_amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stock Item Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockItem['StockItem']['stock_item_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Stock Item Serial Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockItem['StockItem']['stock_item_serial_number']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stock Item', true), array('action' => 'edit', $stockItem['StockItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Stock Item', true), array('action' => 'delete', $stockItem['StockItem']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockItem['StockItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Stock Items', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock Item', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Stock Items');?></h3>
	<?php if (!empty($stockItem['ChildStockItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Measure Unit Id'); ?></th>
		<th><?php __('Stock Item Amount'); ?></th>
		<th><?php __('Stock Item Description'); ?></th>
		<th><?php __('Stock Item Serial Number'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($stockItem['ChildStockItem'] as $childStockItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childStockItem['id'];?></td>
			<td><?php echo $childStockItem['parent_id'];?></td>
			<td><?php echo $childStockItem['product_id'];?></td>
			<td><?php echo $childStockItem['measure_unit_id'];?></td>
			<td><?php echo $childStockItem['stock_item_amount'];?></td>
			<td><?php echo $childStockItem['stock_item_description'];?></td>
			<td><?php echo $childStockItem['stock_item_serial_number'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'stock_items', 'action' => 'view', $childStockItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'stock_items', 'action' => 'edit', $childStockItem['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'stock_items', 'action' => 'delete', $childStockItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childStockItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Stock Item', true), array('controller' => 'stock_items', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Stock Moviments');?></h3>
	<?php if (!empty($stockItem['StockMoviment'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Stock Id'); ?></th>
		<th><?php __('Stock Moviment Type Id'); ?></th>
		<th><?php __('User Id'); ?></th>
		<th><?php __('Stock Moviment Date'); ?></th>
		<th><?php __('Stock Moviment Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($stockItem['StockMoviment'] as $stockMoviment):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stockMoviment['id'];?></td>
			<td><?php echo $stockMoviment['stock_id'];?></td>
			<td><?php echo $stockMoviment['stock_moviment_type_id'];?></td>
			<td><?php echo $stockMoviment['user_id'];?></td>
			<td><?php echo $stockMoviment['stock_moviment_date'];?></td>
			<td><?php echo $stockMoviment['stock_moviment_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'stock_moviments', 'action' => 'view', $stockMoviment['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'stock_moviments', 'action' => 'edit', $stockMoviment['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'stock_moviments', 'action' => 'delete', $stockMoviment['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMoviment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stock Moviment', true), array('controller' => 'stock_moviments', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
