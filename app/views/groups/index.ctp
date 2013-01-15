<div class="groups index">
	<h2><?php __('Grupos');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'group_name');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'group_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($groups as $group):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $group['Group']['id']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['group_name']; ?>&nbsp;</td>
		<td><?php echo $group['Group']['group_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $group['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $group['Group']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
