<div class="serviceOrderTypes index">
	<h2><?php __('Tipos de Ordem de Serviço');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'service_order_type_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'service_order_type_name');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'service_order_type_description');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'service_order_type_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($serviceOrderTypes as $serviceOrderType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $serviceOrderType['ServiceOrderType']['id']; ?>&nbsp;</td>
		<td><?php echo $serviceOrderType['ServiceOrderType']['service_order_type_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($serviceOrderType['ParentServiceOrderType']['service_order_type_name'], array('controller' => 'service_order_types', 'action' => 'view', $serviceOrderType['ParentServiceOrderType']['id'])); ?>
		</td>
		<td><?php echo $serviceOrderType['ServiceOrderType']['service_order_type_name']; ?>&nbsp;</td>
		<td><?php echo $serviceOrderType['ServiceOrderType']['service_order_type_description']; ?>&nbsp;</td>
		<td><?php echo $serviceOrderType['ServiceOrderType']['service_order_type_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $serviceOrderType['ServiceOrderType']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $serviceOrderType['ServiceOrderType']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $serviceOrderType['ServiceOrderType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $serviceOrderType['ServiceOrderType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>