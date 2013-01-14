<div class="stocks index">
	<h2><?php __('Estoques');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'stock_name');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'stock_description');?></th>
			<th><?php echo $this->Paginator->sort('Habilitado', 'stock_enabled');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stocks as $stock):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stock['Stock']['id']; ?>&nbsp;</td>
		<td><?php echo $stock['Stock']['stock_name']; ?>&nbsp;</td>
		<td><?php echo $stock['Stock']['stock_description']; ?>&nbsp;</td>
		<td><?php echo $stock['Stock']['stock_enabled'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $stock['Stock']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $stock['Stock']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $stock['Stock']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stock['Stock']['id'])); ?>
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