<div class="assetMovimentItems view">
<h2><?php  __('Itens de Movimento de Ativo - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentItem['AssetMovimentItem']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mov. de Ativo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMovimentItem['AssetMoviment']['id'], array('controller' => 'asset_moviments', 'action' => 'view', $assetMovimentItem['AssetMoviment']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo de Produto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMovimentItem['ProductType']['product_type_structure'], array('controller' => 'product_types', 'action' => 'view',
				$assetMovimentItem['ProductType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Produto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMovimentItem['Product']['product_structure'], array('controller' => 'products', 'action' => 'view',
				$assetMovimentItem['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Un. de Medida'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMovimentItem['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view', $assetMovimentItem['MeasureUnit']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
				if (!is_null($assetMovimentItem['AssetMovimentItem']['asset_moviment_item_date'])) {
					echo date('d/m/Y H:i', strtotime($assetMovimentItem['AssetMovimentItem']['asset_moviment_item_date'])) . ' (' .
						$this->Html->link($assetMovimentItem['User']['user_name'], array('controller' => 'users',
						'action' => 'view', $assetMovimentItem['User']['id'])) . ')';
					} ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentItem['AssetMovimentItem']['asset_moviment_item_amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número de Série'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentItem['AssetMovimentItem']['asset_moviment_item_serial_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Etiq. de Serviço'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentItem['AssetMovimentItem']['asset_moviment_item_service_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentItem['AssetMovimentItem']['asset_moviment_item_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
