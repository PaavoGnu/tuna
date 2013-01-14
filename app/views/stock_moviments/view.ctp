<div class="stockMoviments view">
<h2><?php  __('Movimentos de Estoque');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMoviment['StockMoviment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMoviment['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$stockMoviment['Enterprise']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Un. de Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMoviment['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$stockMoviment['EnterpriseUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estoque'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMoviment['Stock']['stock_name'], array('controller' => 'stocks', 'action' => 'view', $stockMoviment['Stock']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMoviment['StockMovimentType']['stock_moviment_type_structure'], array('controller' => 'stock_moviment_types', 'action' => 'view', $stockMoviment['StockMovimentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuário'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMoviment['User']['user_name'], array('controller' => 'users', 'action' => 'view', $stockMoviment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($stockMoviment['StockMoviment']['stock_moviment_date'])) {
					echo date('d/m/Y H:i', strtotime($stockMoviment['StockMoviment']['stock_moviment_date']));
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMoviment['StockMoviment']['stock_moviment_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Itens de Movimento de Estoque');?></h3>
	<?php if (!empty($stockMoviment['StockMovimentItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Tipo de Produto'); ?></th>
		<th><?php __('Produto'); ?></th>
		<th><?php __('Unidade de Medida'); ?></th>
		<th><?php __('Data'); ?></th>
		<th><?php __('Quantidade'); ?></th>
		<th><?php __('Número de Série'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($stockMoviment['StockMovimentItem'] as $stockMovimentItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stockMovimentItem['id'];?></td>
			<td>
				<?php echo $this->Html->link($stockMovimentItem['product_type_structure'], array('controller' => 'product_types', 'action' => 'view',
					$stockMovimentItem['product_type_id'])); ?>
			</td>			
			<td>
				<?php echo $this->Html->link($stockMovimentItem['product_structure'], array('controller' => 'products', 'action' => 'view',
					$stockMovimentItem['product_id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($stockMovimentItem['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view',
					$stockMovimentItem['measure_unit_id'])); ?>
			</td>
			<td>
				<?php
					if (!is_null($stockMovimentItem['stock_moviment_item_date'])) {
						echo date('d/m/Y H:i', strtotime($stockMovimentItem['stock_moviment_item_date']));
				}?>
			</td>
			<td><?php echo $stockMovimentItem['stock_moviment_item_amount'];?></td>
			<td><?php echo $stockMovimentItem['stock_moviment_item_serial_number'];?></td>
			<td><?php echo $stockMovimentItem['stock_moviment_item_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar', true), array('controller' => 'stock_moviment_items', 'action' => 'view', $stockMovimentItem['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'stock_moviment_items', 'action' => 'edit', $stockMovimentItem['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'stock_moviment_items', 'action' => 'delete', $stockMovimentItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Item de Movimento de Estoque', true), array('controller' => 'stock_moviment_items', 'action' => 'add', $stockMoviment['StockMoviment']['id']));?> </li>
		</ul>
	</div>
</div>
