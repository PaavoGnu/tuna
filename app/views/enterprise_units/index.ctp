<div class="enterprise_units index">
	<h2><?php __('Unidades de Empresa');?></h2>
	
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'enterprise_unit_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Entidade', 'entity_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'enterprise_unit_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($enterprise_units as $enterprise_unit):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $enterprise_unit['EnterpriseUnit']['id']; ?>&nbsp;</td>
		<td><?php echo $enterprise_unit['EnterpriseUnit']['enterprise_unit_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enterprise_unit['ParentEnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_units', 'action' => 'view',
				$enterprise_unit['ParentEnterpriseUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enterprise_unit['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $enterprise_unit['Entity']['id'])); ?>
		</td>
		<td><?php echo $enterprise_unit['EnterpriseUnit']['enterprise_unit_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $enterprise_unit['EnterpriseUnit']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $enterprise_unit['EnterpriseUnit']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $enterprise_unit['EnterpriseUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $enterprise_unit['EnterpriseUnit']['id'])); ?>
		</td>		
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
