<div class="serviceOrderStepTypes view">
<h2><?php  __('Tipos de Etapa de Ordem de Serviço - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrderStepType['ServiceOrderStepType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrderStepType['ParentServiceOrderStepType']['service_order_step_type_name'], array('controller' => 'service_order_step_types', 'action' => 'view', $serviceOrderStepType['ParentServiceOrderStepType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrderStepType['ServiceOrderStepType']['service_order_step_type_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrderStepType['ServiceOrderStepType']['service_order_step_type_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estrutura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrderStepType['ServiceOrderStepType']['service_order_step_type_structure']; ?>
			&nbsp;
		</dd>
	</dl>
</div>