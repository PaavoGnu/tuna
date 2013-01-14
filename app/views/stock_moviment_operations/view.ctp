<div class="stockMovimentOperations view">
<h2><?php  __('Operações de Movimento de Estoque - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentOperation['StockMovimentOperation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentOperation['StockMovimentOperation']['stock_moviment_operation_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentOperation['StockMovimentOperation']['stock_moviment_operation_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Tipos de Movimento de Estoque Relacionados');?></h3>
	<?php if (!empty($stockMovimentOperation['StockMovimentType'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Operação'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($stockMovimentOperation['StockMovimentType'] as $stockMovimentType):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stockMovimentType['id'];?></td>
			<td><?php echo $stockMovimentType['stock_moviment_operation_id'];?></td>
			<td><?php echo $stockMovimentType['stock_moviment_type_name'];?></td>
			<td><?php echo $stockMovimentType['stock_moviment_type_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar', true), array('controller' => 'stock_moviment_types', 'action' => 'view', $stockMovimentType['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'stock_moviment_types', 'action' => 'edit', $stockMovimentType['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'stock_moviment_types', 'action' => 'delete', $stockMovimentType['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Tipo de Movimento de Estoque', true), array('controller' => 'stock_moviment_types', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
