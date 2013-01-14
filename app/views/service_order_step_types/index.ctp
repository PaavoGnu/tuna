<div class="serviceOrderStepTypes index">
	<h2><?php __('Tipos de Etapa de Ordem de Serviço');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'service_order_step_type_name');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'service_order_step_type_description');?></th>
			<th><?php echo $this->Paginator->sort('Estrutura', 'service_order_step_type_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($serviceOrderStepTypes as $serviceOrderStepType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $serviceOrderStepType['ServiceOrderStepType']['id']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($serviceOrderStepType['ParentServiceOrderStepType']['service_order_step_type_name'], array('controller' => 'service_order_step_types', 'action' => 'view', $serviceOrderStepType['ParentServiceOrderStepType']['id'])); ?></td>
		<td><?php echo $serviceOrderStepType['ServiceOrderStepType']['service_order_step_type_name']; ?>&nbsp;</td>
		<td><?php echo $serviceOrderStepType['ServiceOrderStepType']['service_order_step_type_description']; ?>&nbsp;</td>
		<td><?php echo $serviceOrderStepType['ServiceOrderStepType']['service_order_step_type_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $serviceOrderStepType['ServiceOrderStepType']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $serviceOrderStepType['ServiceOrderStepType']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $serviceOrderStepType['ServiceOrderStepType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $serviceOrderStepType['ServiceOrderStepType']['id'])); ?>
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
