<div class="stockMovimentTypes index">
	<h2><?php __('Tipos de Movimento de Estoque');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'stock_moviment_type_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Operação', 'stock_moviment_operation_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'stock_moviment_type_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'stock_moviment_type_structure');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'stock_moviment_type_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stockMovimentTypes as $stockMovimentType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stockMovimentType['StockMovimentType']['id']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stockMovimentType['ParentStockMovimentType']['stock_moviment_type_structure'], array('controller' => 'stock_moviment_types', 'action' => 'view',
				$stockMovimentType['ParentStockMovimentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockMovimentType['StockMovimentOperation']['stock_moviment_operation_name'], array('controller' => 'stock_moviment_operations', 'action' => 'view',
				$stockMovimentType['StockMovimentOperation']['id'])); ?>
		</td>
		<td><?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_name']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_structure']; ?>&nbsp;</td>
		<td><?php echo $stockMovimentType['StockMovimentType']['stock_moviment_type_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $stockMovimentType['StockMovimentType']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $stockMovimentType['StockMovimentType']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $stockMovimentType['StockMovimentType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentType['StockMovimentType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<div class="pagecount">
		<p><?php
			echo $this->Paginator->counter(array(
			'format' => __('Página %page% de %pages%, exibindo %current% registro(s) do total de %count%, do registro %start% ao %end%', true)));
		?></p>
	</div>
	
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('próxima', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
	
	<div class="actions">
		<?php echo $this->Html->link(__('Novo Registro', true), array('action' => 'add')); ?>
	</div>
</div>