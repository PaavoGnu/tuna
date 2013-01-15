<div class="assetMoviments index">
	<h2><?php __('Movimento de Ativo');?></h2>
	
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Empresa', 'enterprise_id');?></th>
			<th><?php echo $this->Paginator->sort('Unidade de Empresa', 'enterprise_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'asset_moviment_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Usuário', 'user_id');?></th>
			<th><?php echo $this->Paginator->sort('Data', 'asset_moviment_date');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'asset_moviment_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($assetMoviments as $assetMoviment):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $assetMoviment['AssetMoviment']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($assetMoviment['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$assetMoviment['Enterprise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($assetMoviment['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$assetMoviment['EnterpriseUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($assetMoviment['AssetMovimentType']['asset_moviment_type_name'], array('controller' => 'asset_moviment_types', 'action' => 'view', $assetMoviment['AssetMovimentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($assetMoviment['User']['user_name'], array('controller' => 'users', 'action' => 'view', $assetMoviment['User']['id'])); ?>
		</td>
		<td><?php
				if (!is_null($assetMoviment['AssetMoviment']['asset_moviment_date'])) {
					echo date('d/m/Y H:i', strtotime($assetMoviment['AssetMoviment']['asset_moviment_date']));
					} ?>
		</td>
		<td><?php echo $assetMoviment['AssetMoviment']['asset_moviment_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $assetMoviment['AssetMoviment']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $assetMoviment['AssetMoviment']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $assetMoviment['AssetMoviment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $assetMoviment['AssetMoviment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>