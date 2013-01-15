<div class="assetMovimentOperations index">
	<h2><?php __('Operações de Movimento de Ativo');?></h2>
	
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'asset_moviment_operation_name');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'asset_moviment_operation_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($assetMovimentOperations as $assetMovimentOperation):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $assetMovimentOperation['AssetMovimentOperation']['id']; ?>&nbsp;</td>
		<td><?php echo $assetMovimentOperation['AssetMovimentOperation']['asset_moviment_operation_name']; ?>&nbsp;</td>
		<td><?php echo $assetMovimentOperation['AssetMovimentOperation']['asset_moviment_operation_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $assetMovimentOperation['AssetMovimentOperation']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $assetMovimentOperation['AssetMovimentOperation']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $assetMovimentOperation['AssetMovimentOperation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $assetMovimentOperation['AssetMovimentOperation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>