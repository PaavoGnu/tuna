<div class="stockMovimentItems view">
<h2><?php  __('Itens de Movimento de Estoque - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentItem['StockMovimentItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mov. de Estoque'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMovimentItem['StockMoviment']['id'], array('controller' => 'stock_moviments', 'action' => 'view', $stockMovimentItem['StockMoviment']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Produto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMovimentItem['Product']['product_name'], array('controller' => 'products', 'action' => 'view', $stockMovimentItem['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidade de Medida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stockMovimentItem['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view', $stockMovimentItem['MeasureUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentItem['StockMovimentItem']['stock_moviment_item_amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número de Série'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentItem['StockMovimentItem']['stock_moviment_item_serial_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stockMovimentItem['StockMovimentItem']['stock_moviment_item_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
