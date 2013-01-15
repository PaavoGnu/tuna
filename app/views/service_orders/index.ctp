<div class="serviceOrders index">
	<h2><?php __('Ordens de Serviço');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<div class="serviceOrders qfilter">
		<ul>
			<li><?php echo 'Filtrar:'; ?></li>
			<li><?php echo $this->Html->link('Todas['.$countAll.'],', array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link('Abertas['.$countOpened.'],', array('action' => 'index', 'opened')); ?></li>
			<li><?php echo $this->Html->link('Encaminhadas['.$countRouted.'],', array('action' => 'index', 'routed')); ?></li>
			<li><?php echo $this->Html->link('Posicionadas['.$countPositioned.'],', array('action' => 'index', 'positioned')); ?></li>
			<li><?php echo $this->Html->link('Canceladas['.$countCanceled.'],', array('action' => 'index', 'canceled')); ?></li>
			<li><?php echo $this->Html->link('Encerradas['.$countClosed.'],', array('action' => 'index', 'closed')); ?></li>
			<li><?php echo $this->Html->link('Avaliadas['.$countEvaluated.']', array('action' => 'index', 'evaluated')); ?></li>
		</ul>
	</div>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Abertura', 'service_order_opening_date');?></th>
			<!--<th><?php echo $this->Paginator->sort('Empresa', 'enterprise_id');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Un. de Empresa', 'enterprise_unit_id');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Grupo', 'entity_group_id');?></th>-->
			<th><?php echo $this->Paginator->sort('Entidade', 'entity_id');?></th>
			<th><?php echo $this->Paginator->sort('Contato', 'entity_contact_id');?></th>
			<th><?php echo $this->Paginator->sort('Prioridade', 'service_order_priority_type_id');?></th>
			<!--<th><?php echo $this->Paginator->sort('Tipo', 'service_order_type_id');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Garantia', 'service_order_warranty');?></th>-->
			<th><?php echo $this->Paginator->sort('Encaminhamento', 'service_order_routing_date');?></th>
			<th><?php echo $this->Paginator->sort('Técnico', 'entity_technician_id');?></th>
			<th><?php echo $this->Paginator->sort('Encerramento', 'service_order_close_date');?></th>
			<th><?php echo $this->Paginator->sort('Avaliação', 'service_order_evaluation_date');?></th>
			<th><?php echo $this->Paginator->sort('Cancelamento', 'service_order_cancellation_date');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($serviceOrders as $serviceOrder):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr <?php echo $class;?>>
		<td><?php echo $this->Html->link(__($serviceOrder['ServiceOrder']['id'], true), array('action' => 'view', $serviceOrder['ServiceOrder']['id'])); ?>&nbsp;</td>
		<td><?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_opening_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_opening_date']));
					} ?>
		</td>
		<!--<td>
			<?php echo $this->Html->link($serviceOrder['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view', $serviceOrder['Enterprise']['id'])); ?>
		</td>-->
		<!--<td>
			<?php echo $this->Html->link($serviceOrder['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_units', 'action' => 'view', $serviceOrder['EnterpriseUnit']['id'])); ?>
		</td>-->
		<!--<td>
			<?php echo $this->Html->link($serviceOrder['EntityGroup']['entity_group_name'], array('controller' => 'entity_groups', 'action' => 'view', $serviceOrder['EntityGroup']['id'])); ?>
		</td>-->
		<td>
			<?php echo $this->Html->link($serviceOrder['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $serviceOrder['Entity']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($serviceOrder['EntityContact']['entity_contact_name'], array('controller' => 'entities', 'action' => 'view', $serviceOrder['EntityContact']['id'])); ?>
		</td>
		<td>
			<?php echo $serviceOrder['ServiceOrderPriorityType']['service_order_priority_type_name']; ?>
		</td>
		<!--<td>
			<?php echo $this->Html->link($serviceOrder['ServiceOrderType']['service_order_type_name'], array('controller' => 'service_order_types', 'action' => 'view', $serviceOrder['ServiceOrderType']['id'])); ?>
		</td>-->
		<!--<td><?php echo $serviceOrder['ServiceOrder']['service_order_warranty'] ? 'Sim' : 'Não'; ?>&nbsp;</td>-->
		<td><?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_routing_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_routing_date']));
					} ?>
		</td>
		<td>
			<?php echo $this->Html->link($serviceOrder['EntityTechnician']['entity_technician_name'], array('controller' => 'entity_technicians', 'action' => 'view', $serviceOrder['EntityTechnician']['id'])); ?>
		</td>
		<td><?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_close_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_close_date']));
					} ?>
		</td>
		<td><?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_evaluation_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_evaluation_date']));
					} ?>
		</td>
		<td><?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_cancellation_date']));
					} ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>