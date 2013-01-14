<div class="entitiesProducts view">
<h2><?php  __('Entities Product');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entitiesProduct['EntitiesProduct']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parent Entities Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($entitiesProduct['ParentEntitiesProduct']['entity_product_description'], array('controller' => 'entities_products', 'action' => 'view', $entitiesProduct['ParentEntitiesProduct']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($entitiesProduct['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $entitiesProduct['Entity']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($entitiesProduct['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $entitiesProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Measure Unit'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($entitiesProduct['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view', $entitiesProduct['MeasureUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entity Product Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entitiesProduct['EntitiesProduct']['entity_product_amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entity Product Serial Number'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entitiesProduct['EntitiesProduct']['entity_product_serial_number']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entities Product', true), array('action' => 'edit', $entitiesProduct['EntitiesProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Entities Product', true), array('action' => 'delete', $entitiesProduct['EntitiesProduct']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entitiesProduct['EntitiesProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Entities Products', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entities Product', true), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php __('Related Entities Products');?></h3>
	<?php if (!empty($entitiesProduct['ChildEntitiesProduct'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Parent Id'); ?></th>
		<th><?php __('Entity Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Measure Unit Id'); ?></th>
		<th><?php __('Entity Product Amount'); ?></th>
		<th><?php __('Entity Product Serial Number'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($entitiesProduct['ChildEntitiesProduct'] as $childEntitiesProduct):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $childEntitiesProduct['id'];?></td>
			<td><?php echo $childEntitiesProduct['parent_id'];?></td>
			<td><?php echo $childEntitiesProduct['entity_id'];?></td>
			<td><?php echo $childEntitiesProduct['product_id'];?></td>
			<td><?php echo $childEntitiesProduct['measure_unit_id'];?></td>
			<td><?php echo $childEntitiesProduct['entity_product_amount'];?></td>
			<td><?php echo $childEntitiesProduct['entity_product_serial_number'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'entities_products', 'action' => 'view', $childEntitiesProduct['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'entities_products', 'action' => 'edit', $childEntitiesProduct['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'entities_products', 'action' => 'delete', $childEntitiesProduct['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childEntitiesProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Entities Product', true), array('controller' => 'entities_products', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
