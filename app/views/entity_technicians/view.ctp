<div class="entityTechnicians view">
<h2><?php  __('Técnicos - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entityTechnician['EntityTechnician']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($entityTechnician['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $entityTechnician['Entity']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Habilitado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entityTechnician['EntityTechnician']['entity_technician_enabled'] ? 'Sim' : 'Não'; ?>
			&nbsp;
		</dd>
	</dl>
</div>