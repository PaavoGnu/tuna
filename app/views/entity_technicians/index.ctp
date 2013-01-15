<div class="entityTechnicians index">
	<h2><?php __('Técnicos');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Entidade', 'entity_id');?></th>
			<th><?php echo $this->Paginator->sort('Habilitado', 'entity_technician_enabled');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($entityTechnicians as $entityTechnician):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $entityTechnician['EntityTechnician']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entityTechnician['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $entityTechnician['Entity']['id'])); ?>
		</td>
		<td><?php echo $entityTechnician['EntityTechnician']['entity_technician_enabled'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $entityTechnician['EntityTechnician']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $entityTechnician['EntityTechnician']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $entityTechnician['EntityTechnician']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entityTechnician['EntityTechnician']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
