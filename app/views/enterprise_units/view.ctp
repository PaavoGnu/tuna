<div class="enterprise_units view">
<h2><?php  __('Unidades de Empresa - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $enterprise_unit['EnterpriseUnit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $enterprise_unit['EnterpriseUnit']['enterprise_unit_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($enterprise_unit['ParentEnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_units', 'action' => 'view',
				$enterprise_unit['ParentEnterpriseUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($enterprise_unit['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', 
				$enterprise_unit['Entity']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Estruturado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $enterprise_unit['EnterpriseUnit']['enterprise_unit_structure']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<?php if (!empty($enterprise_unit['Enterprise'])):?>
	<h3><?php __('Empresas');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Número'); ?></th>
		<th><?php __('Grupo'); ?></th>
		<th><?php __('Entidade'); ?></th>
		<th><?php __('Nome Estruturado'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($enterprise_unit['Enterprise'] as $enterprise):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $enterprise['id'];?></td>
			<td><?php echo $enterprise['enterprise_number'];?></td>
			<td><?php echo $enterprise['parent_id'];?></td>
			<td><?php echo $enterprise['entity_id'] ? 'Sim' : 'Não';?></td>
			<td><?php echo $enterprise['enterprise_structure'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
<div class="related">
	<?php if (!empty($enterprise_unit['Stock'])):?>
	<h3><?php __('Estoques');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th><?php __('Habilitado'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($enterprise_unit['Stock'] as $stock):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stock['id'];?></td>
			<td><?php echo $stock['stock_name'];?></td>
			<td><?php echo $stock['stock_description'];?></td>
			<td><?php echo $stock['stock_enabled'] ? 'Sim' : 'Não';?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

