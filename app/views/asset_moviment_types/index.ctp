<div class="assetMovimentTypes index">
	<h2><?php __('Tipos de Movimento de Ativo');?></h2>
	
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'asset_moviment_type_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Operação', 'asset_moviment_operation_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'asset_moviment_type_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'asset_moviment_type_structure');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'asset_moviment_type_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($assetMovimentTypes as $assetMovimentType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $assetMovimentType['AssetMovimentType']['id']; ?>&nbsp;</td>
		<td><?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($assetMovimentType['ParentAssetMovimentType']['asset_moviment_type_structure'], array('controller' => 'asset_moviment_types', 'action' => 'view',
				$assetMovimentType['ParentAssetMovimentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($assetMovimentType['AssetMovimentOperation']['asset_moviment_operation_name'], array('controller' => 'asset_moviment_operations', 'action' => 'view',
				$assetMovimentType['AssetMovimentOperation']['id'])); ?>
		</td>
		<td><?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_name']; ?>&nbsp;</td>
		<td><?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_structure']; ?>&nbsp;</td>
		<td><?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $assetMovimentType['AssetMovimentType']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $assetMovimentType['AssetMovimentType']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $assetMovimentType['AssetMovimentType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $assetMovimentType['AssetMovimentType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>