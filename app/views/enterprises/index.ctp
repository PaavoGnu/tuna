<div class="enterprises index">
	<h2><?php __('Empresas');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'enterprise_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Entidade', 'entity_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'enterprise_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($enterprises as $enterprise):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $enterprise['Enterprise']['id']; ?>&nbsp;</td>
		<td><?php echo $enterprise['Enterprise']['enterprise_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enterprise['ParentEnterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$enterprise['ParentEnterprise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enterprise['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $enterprise['Entity']['id'])); ?>
		</td>
		<td><?php echo $enterprise['Enterprise']['enterprise_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $enterprise['Enterprise']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $enterprise['Enterprise']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $enterprise['Enterprise']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $enterprise['Enterprise']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
