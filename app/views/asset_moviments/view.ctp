<div class="assetMoviments view">
<h2><?php  __('Movimentos de Ativo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMoviment['AssetMoviment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMoviment['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$assetMoviment['Enterprise']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Un. de Empresa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMoviment['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$assetMoviment['EnterpriseUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMoviment['AssetMovimentType']['asset_moviment_type_structure'], array('controller' => 'asset_moviment_types', 'action' => 'view', $assetMoviment['AssetMovimentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuário'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMoviment['User']['user_name'], array('controller' => 'users', 'action' => 'view', $assetMoviment['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($assetMoviment['AssetMoviment']['asset_moviment_date'])) {
					echo date('d/m/Y H:i', strtotime($assetMoviment['AssetMoviment']['asset_moviment_date']));
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMoviment['AssetMoviment']['asset_moviment_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Itens de Movimento de Ativo');?></h3>
	<?php if (!empty($assetMoviment['AssetMovimentItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Tipo de Produto'); ?></th>
		<th><?php __('Produto'); ?></th>
		<th><?php __('Unidade de Medida'); ?></th>
		<th><?php __('Data'); ?></th>
		<th><?php __('Quantidade'); ?></th>
		<th><?php __('Número de Série'); ?></th>
		<th><?php __('Descrição'); ?></th>
		<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($assetMoviment['AssetMovimentItem'] as $assetMovimentItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $assetMovimentItem['id'];?></td>
			<td>
				<?php echo $this->Html->link($assetMovimentItem['product_type_structure'], array('controller' => 'product_types', 'action' => 'view',
					$assetMovimentItem['product_type_id'])); ?>
			</td>			
			<td>
				<?php echo $this->Html->link($assetMovimentItem['product_structure'], array('controller' => 'products', 'action' => 'view',
					$assetMovimentItem['product_id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->link($assetMovimentItem['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view',
					$assetMovimentItem['measure_unit_id'])); ?>
			</td>
			<td>
				<?php
					if (!is_null($assetMovimentItem['asset_moviment_item_date'])) {
						echo date('d/m/Y H:i', strtotime($assetMovimentItem['asset_moviment_item_date']));
				}?>
			</td>
			<td><?php echo $assetMovimentItem['asset_moviment_item_amount'];?></td>
			<td><?php echo $assetMovimentItem['asset_moviment_item_serial_number'];?></td>
			<td><?php echo $assetMovimentItem['asset_moviment_item_description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Visualizar', true), array('controller' => 'asset_moviment_items', 'action' => 'view', $assetMovimentItem['id'])); ?>
				<?php echo $this->Html->link(__('Editar', true), array('controller' => 'asset_moviment_items', 'action' => 'edit', $assetMovimentItem['id'])); ?>
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'asset_moviment_items', 'action' => 'delete', $assetMovimentItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $assetMovimentItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Novo Item de Movimento de Ativo', true), array('controller' => 'asset_moviment_items', 'action' => 'add', $assetMoviment['AssetMoviment']['id']));?> </li>
		</ul>
	</div>
</div>
