<div class="stockMovimentOperations index">
	<h2><?php __('Operações de Movimento de Estoque');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'stock_moviment_operation_name');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'stock_moviment_operation_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stockMovimentOperations as $stockMovimentOperation):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stockMovimentOperation['StockMovimentOperation']['id']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentOperation['StockMovimentOperation']['stock_moviment_operation_name']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentOperation['StockMovimentOperation']['stock_moviment_operation_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $stockMovimentOperation['StockMovimentOperation']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $stockMovimentOperation['StockMovimentOperation']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $stockMovimentOperation['StockMovimentOperation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentOperation['StockMovimentOperation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>