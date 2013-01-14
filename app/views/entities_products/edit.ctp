<div class="entitiesProducts form">
<?php echo $this->Form->create('EntitiesProduct');?>
	<fieldset>
 		<legend><?php __('Edit Entities Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('entity_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('measure_unit_id');
		echo $this->Form->input('entity_product_amount');
		echo $this->Form->input('entity_product_serial_number');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EntitiesProduct.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EntitiesProduct.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Entities Products', true), array('action' => 'index'));?></li>
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