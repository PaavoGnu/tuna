<div class="serviceOrders view">
<h2><?php  __('Ordens de Serviço - Visualizar');?></h2>
	<div class="serviceOrders qaction">
		<ul>
			<li><?php echo 'Ações:'; ?></li>
			<li><?php echo $this->Html->link('Editar,', array('action' => 'edit', $serviceOrder['ServiceOrder']['id'])); ?></li>
			<li><?php echo $this->Html->link('Encaminhar,', array('action' => 'route', $serviceOrder['ServiceOrder']['id'])); ?></li>
			<li><?php echo $this->Html->link('Cancelar,', array('action' => 'cancel', $serviceOrder['ServiceOrder']['id'])); ?></li>
			<li><?php echo $this->Html->link('Encerrar,', array('action' => 'close', $serviceOrder['ServiceOrder']['id'])); ?></li>
			<li><?php echo $this->Html->link('Avaliar', array('action' => 'evaluate', $serviceOrder['ServiceOrder']['id'])); ?></li>
		</ul>
	</div>
	
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrder['ServiceOrder']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrder['Enterprise']['enterprise_name'], array('controller' => 'enterprises',
				'action' => 'view', $serviceOrder['Enterprise']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo de Entidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrder['EntityGroup']['entity_group_name'], array('controller' => 'entity_groups',
				'action' => 'view', $serviceOrder['EntityGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Entidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrder['Entity']['entity_name'], array('controller' => 'entities',
				'action' => 'view', $serviceOrder['Entity']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrder['ServiceOrderType']['service_order_type_structure'], array('controller' => 'service_order_types',
				'action' => 'view', $serviceOrder['ServiceOrderType']['id'])); ?>
			&nbsp;
		</dd>
		<!--
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Garantia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $serviceOrder['ServiceOrder']['service_order_warranty'] ? 'Sim' : 'Não'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Desc. da Garantia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($serviceOrder['ServiceOrder']['service_order_warranty_description']); ?>
			&nbsp;
		</dd>
		-->
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Abertura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_opening_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_opening_date'])) . ' (' .
						$this->Html->link($serviceOrder['ServiceOrderOpeningUser']['user_name'], array('controller' => 'users',
						'action' => 'view', $serviceOrder['ServiceOrderOpeningUser']['id'])) . ')';
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($serviceOrder['ServiceOrder']['service_order_opening_description']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Técnico'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($serviceOrder['EntityTechnician']['entity_technician_name'], array('controller' => 'entity_technicians',
				'action' => 'view', $serviceOrder['EntityTechnician']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Encaminhamento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_routing_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_routing_date'])) . ' (' .
						$this->Html->link($serviceOrder['ServiceOrderRoutingUser']['user_name'], array('controller' => 'users',
						'action' => 'view', $serviceOrder['ServiceOrderRoutingUser']['id'])) . ')';
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cancelamento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) . ' (' .
						$this->Html->link($serviceOrder['ServiceOrderCancellationUser']['user_name'], array('controller' => 'users',
						'action' => 'view', $serviceOrder['ServiceOrderCancellationUser']['id'])) . ')';
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Motivo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($serviceOrder['ServiceOrder']['service_order_cancellation_description']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Encerramento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($serviceOrder['ServiceOrder']['service_order_close_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_close_date'])) . ' (' .
						$this->Html->link($serviceOrder['ServiceOrderCloseUser']['user_name'], array('controller' => 'users',
						'action' => 'view', $serviceOrder['ServiceOrderCloseUser']['id'])) . ')';
					} ?>
			&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Solução'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($serviceOrder['ServiceOrder']['service_order_close_description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Etapas');?></h3>
	<?php if (!empty($serviceOrder['ServiceOrderStep'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Técnico'); ?></th>
		<th><?php __('Tipo'); ?></th>
		<th><?php __('Data de Abertura'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th><?php __('Data de Encerramento'); ?></th>
		<th><?php __('Solução'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($serviceOrder['ServiceOrderStep'] as $serviceOrderStep):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $serviceOrderStep['id'];?></td>
			<td><?php echo $serviceOrderStep['entity_technician_id'];?></td>
			<td><?php echo $serviceOrderStep['service_order_step_type_id'];?></td>
			<td><?php
				if (!is_null($serviceOrderStep['service_order_step_opening_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrderStep['service_order_step_opening_date']));
					} ?>
			</td>
			<td><?php echo $serviceOrderStep['service_order_step_opening_description'];?></td>
			<td><?php
				if (!is_null($serviceOrderStep['service_order_step_close_date'])) {
					echo date('d/m/Y H:i', strtotime($serviceOrderStep['service_order_step_close_date']));
					} ?>
			</td><td><?php echo $serviceOrderStep['service_order_step_close_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar', true), array('controller' => 'service_order_steps', 'action' => 'view', $serviceOrderStep['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'service_order_steps', 'action' => 'edit', $serviceOrderStep['id'])); ?>
				<?php echo $this->Html->link(__('Encerrar', true), array('controller' => 'service_order_steps', 'action' => 'close', $serviceOrderStep['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'service_order_steps', 'action' => 'delete', $serviceOrderStep['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $serviceOrderStep['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Etapa', true), array('controller' => 'service_order_steps', 'action' => 'add', $serviceOrder['ServiceOrder']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Produtos');?></h3>
	<?php if (!empty($serviceOrder['ServiceOrderProduct'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Produto'); ?></th>
		<th><?php __('Un. de Medida'); ?></th>
		<th><?php __('Quantidade'); ?></th>
		<th><?php __('Número de Série'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($serviceOrder['ServiceOrderProduct'] as $serviceOrderProduct):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $serviceOrderProduct['id'];?></td>
			<td><?php echo $serviceOrderProduct['product_id'];?></td>
			<td><?php echo $serviceOrderProduct['measure_unit_id'];?></td>
			<td><?php echo $serviceOrderProduct['service_order_product_amount'];?></td>
			<td><?php echo $serviceOrderProduct['service_order_product_serial_number'];?></td>
			<td><?php echo $serviceOrderProduct['service_order_product_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar', true), array('controller' => 'service_order_products', 'action' => 'view', $serviceOrderProduct['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'service_order_products', 'action' => 'edit', $serviceOrderProduct['id'])); ?>
				<?php echo $this->Html->link(__('Estocar', true), array('controller' => 'service_order_products', 'action' => 'stock', $serviceOrderProduct['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'service_order_products', 'action' => 'delete', $serviceOrderProduct['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $serviceOrderProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Produto', true), array('controller' => 'service_order_products', 'action' => 'add', $serviceOrder['ServiceOrder']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<?php if (!empty($serviceOrder['StockMovimentItem'])):?>
	<h3><?php __('Itens de Movimento de Estoque');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Mov. de Estoque'); ?></th>
		<th><?php __('Produto'); ?></th>
		<th><?php __('Unidade de Medida'); ?></th>
		<th><?php __('Quantidade'); ?></th>
		<th><?php __('Número de Série'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($serviceOrder['StockMovimentItem'] as $stockMovimentItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stockMovimentItem['id'];?></td>
			<td><?php echo $stockMovimentItem['stock_moviment_id'];?></td>
			<td><?php echo $stockMovimentItem['product_id'];?></td>
			<td><?php echo $stockMovimentItem['measure_unit_id'];?></td>
			<td><?php echo $stockMovimentItem['stock_moviment_item_amount'];?></td>
			<td><?php echo $stockMovimentItem['stock_moviment_item_serial_number'];?></td>
			<td><?php echo $stockMovimentItem['stock_moviment_item_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar', true), array('controller' => 'stock_moviment_items', 'action' => 'view', $stockMovimentItem['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'stock_moviment_items', 'action' => 'edit', $stockMovimentItem['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'stock_moviment_items', 'action' => 'delete', $stockMovimentItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stockMovimentItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

