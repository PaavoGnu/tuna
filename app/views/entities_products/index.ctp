<div class="entitiesProducts index">
	<h2><?php __('Entities Products');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('entity_id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('measure_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('entity_product_amount');?></th>
			<th><?php echo $this->Paginator->sort('entity_product_serial_number');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($entitiesProducts as $entitiesProduct):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $entitiesProduct['EntitiesProduct']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entitiesProduct['ParentEntitiesProduct']['entity_product_description'], array('controller' => 'entities_products', 'action' => 'view', $entitiesProduct['ParentEntitiesProduct']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entitiesProduct['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $entitiesProduct['Entity']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entitiesProduct['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $entitiesProduct['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entitiesProduct['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view', $entitiesProduct['MeasureUnit']['id'])); ?>
		</td>
		<td><?php echo $entitiesProduct['EntitiesProduct']['entity_product_amount']; ?>&nbsp;</td>
		<td><?php echo $entitiesProduct['EntitiesProduct']['entity_product_serial_number']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $entitiesProduct['EntitiesProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $entitiesProduct['EntitiesProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $entitiesProduct['EntitiesProduct']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entitiesProduct['EntitiesProduct']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Entities Product', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entities Products', true), array('controller' => 'entities_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Entities Product', true), array('controller' => 'entities_products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities', true), array('controller' => 'entities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entity', true), array('controller' => 'entities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measure Units', true), array('controller' => 'measure_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure Unit', true), array('controller' => 'measure_units', 'action' => 'add')); ?> </li>
	</ul>
</div>