<div class="serviceOrderSteps view">
<h2><?php  __('Etapas de Ordem de Serviço - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrderStep['ServiceOrderStep']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ordem de Serviço'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrderStep['ServiceOrder']['id'], array('controller' => 'service_orders', 'action' => 'view', $serviceOrderStep['ServiceOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Técnico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrderStep['EntityTechnician']['entity_technician_name'], array('controller' => 'entity_technicians', 'action' => 'view', $serviceOrderStep['EntityTechnician']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrderStep['ServiceOrderStepType']['service_order_step_type_name'], array('controller' => 'service_order_step_types', 'action' => 'view', $serviceOrderStep['ServiceOrderStepType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Abertura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($serviceOrderStep['ServiceOrderStep']['service_order_step_opening_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrderStep['ServiceOrderStep']['service_order_step_opening_date'])) . ' (' .
						$this->Html->link($serviceOrderStep['ServiceOrderStepOpeningUser']['user_name'], array('controller' => 'users',
						'action' => 'view', $serviceOrderStep['ServiceOrderStepOpeningUser']['id'])) . ')';
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($serviceOrderStep['ServiceOrderStep']['service_order_step_opening_description']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Encerramento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($serviceOrderStep['ServiceOrderStep']['service_order_step_close_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrderStep['ServiceOrderStep']['service_order_step_close_date'])) . ' (' .
						$this->Html->link($serviceOrderStep['ServiceOrderStepCloseUser']['user_name'], array('controller' => 'users',
						'action' => 'view', $serviceOrderStep['ServiceOrderStepCloseUser']['id'])) . ')';
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Solução'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($serviceOrderStep['ServiceOrderStep']['service_order_step_close_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
