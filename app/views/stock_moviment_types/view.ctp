<div class="stockMovimentTypes view">
<h2><?php  __('Tipos de Movimento de Estoque - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentType['StockMovimentType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMovimentType['ParentStockMovimentType']['stock_moviment_type_structure'], array('controller' => 'stock_moviment_types', 'action' => 'view',
				$stockMovimentType['ParentStockMovimentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operação'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMovimentType['StockMovimentOperation']['stock_moviment_operation_name'], array('controller' => 'stock_moviment_operations', 'action' => 'view', $stockMovimentType['StockMovimentOperation']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Estruturado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_structure']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>