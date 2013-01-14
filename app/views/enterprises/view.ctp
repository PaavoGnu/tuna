<div class="enterprises view">
<h2><?php  __('Empresas - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $enterprise['Enterprise']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($enterprise['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $enterprise['Entity']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<?php if (!empty($enterprise['Stock'])):?>
	<h3><?php __('Estoques Relacionados');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th><?php __('Habilitado'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($enterprise['Stock'] as $stock):
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

