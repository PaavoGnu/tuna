<div class="viewStockMovimentItemPositions index">
	<h2><?php __('Consulta da Posição de Estoque');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Empresa', 'enterprise_id');?></th>
			<th><?php echo $this->Paginator->sort('Unidade de Empresa', 'enterprise_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Estoque', 'stock_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo de Prod.', 'product_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Produto', 'product_id');?></th>
			<th><?php echo $this->Paginator->sort('Un.', 'measure_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Qtd.', 'stock_moviment_item_position');?></th>			
	</tr>
	<?php
	$i = 0;
	foreach ($viewStockMovimentItemPositions as $viewStockMovimentItemPosition):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($viewStockMovimentItemPosition['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$viewStockMovimentItemPosition['Enterprise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewStockMovimentItemPosition['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$viewStockMovimentItemPosition['EnterpriseUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewStockMovimentItemPosition['Stock']['stock_name'], array('controller' => 'stock', 'action' => 'view',
				$viewStockMovimentItemPosition['Stock']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewStockMovimentItemPosition['ProductType']['product_type_structure'], array('controller' => 'product_types', 'action' => 'view',
				$viewStockMovimentItemPosition['ProductType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewStockMovimentItemPosition['Product']['product_structure'], array('controller' => 'products', 'action' => 'view',
				$viewStockMovimentItemPosition['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewStockMovimentItemPosition['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view',
				$viewStockMovimentItemPosition['MeasureUnit']['id'])); ?>
		</td>
		<td><?php echo $viewStockMovimentItemPosition['ViewStockMovimentItemPosition']['stock_moviment_item_position']; ?>&nbsp;</td>		
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultPageCount();
		echo $this->SwIndex->indexDefaultPagination();
	?>
	
	<div class="actions">
		<?php
			echo $this->Html->link(__('Filtrar', true), array('action' => 'indexFilter'));
		?>
	</div>
</div>