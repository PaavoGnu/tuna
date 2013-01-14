<div class="entityGroups index">
	<h2><?php __('Grupos de Entidade');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'entity_group_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'entity_group_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($entityGroups as $entityGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $entityGroup['EntityGroup']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entityGroup['ParentEntityGroup']['entity_group_name'], array('controller' => 'entity_groups', 'action' => 'view', $entityGroup['ParentEntityGroup']['id'])); ?>
		</td>
		<td><?php echo $entityGroup['EntityGroup']['entity_group_name']; ?>&nbsp;</td>
		<td><?php echo $entityGroup['EntityGroup']['entity_group_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $entityGroup['EntityGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $entityGroup['EntityGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $entityGroup['EntityGroup']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entityGroup['EntityGroup']['id'])); ?>
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
