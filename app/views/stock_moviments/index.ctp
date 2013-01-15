<div class="stockMoviments index">
	<h2><?php __('Movimento de Estoque');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Empresa', 'enterprise_id');?></th>
			<th><?php echo $this->Paginator->sort('Unidade de Empresa', 'enterprise_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Estoque', 'stock_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'stock_moviment_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Usuário', 'user_id');?></th>
			<th><?php echo $this->Paginator->sort('Data', 'stock_moviment_date');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'stock_moviment_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stockMoviments as $stockMoviment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stockMoviment['StockMoviment']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stockMoviment['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$stockMoviment['Enterprise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockMoviment['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$stockMoviment['EnterpriseUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockMoviment['Stock']['stock_name'], array('controller' => 'stocks', 'action' => 'view', $stockMoviment['Stock']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockMoviment['StockMovimentType']['stock_moviment_type_name'], array('controller' => 'stock_moviment_types', 'action' => 'view', $stockMoviment['StockMovimentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stockMoviment['User']['user_name'], array('controller' => 'users', 'action' => 'view', $stockMoviment['User']['id'])); ?>
		</td>
		<td><?php
				if (!is_null($stockMoviment['StockMoviment']['stock_moviment_date'])) {
					echo date('d/m/Y H:i', strtotime($stockMoviment['StockMoviment']['stock_moviment_date']));
					} ?>
		</td>
		<td><?php echo $stockMoviment['StockMoviment']['stock_moviment_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $stockMoviment['StockMoviment']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $stockMoviment['StockMoviment']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $stockMoviment['StockMoviment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMoviment['StockMoviment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>