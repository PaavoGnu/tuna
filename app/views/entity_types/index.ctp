<div class="entityTypes index">
	<h2><?php __('Tipos de Entidade');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'entity_type_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'entity_type_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'entity_type_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($entityTypes as $entityType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $entityType['EntityType']['id']; ?>&nbsp;</td>
		<td><?php echo $entityType['EntityType']['entity_type_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entityType['ParentEntityType']['entity_type_name'], array('controller' => 'entity_types', 'action' => 'view', $entityType['ParentEntityType']['id'])); ?>
		</td>
		<td><?php echo $entityType['EntityType']['entity_type_name']; ?>&nbsp;</td>
		<td><?php echo $entityType['EntityType']['entity_type_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $entityType['EntityType']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $entityType['EntityType']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $entityType['EntityType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entityType['EntityType']['id'])); ?>
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
