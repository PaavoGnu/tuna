<div class="assetMovimentTypes view">
<h2><?php  __('Tipos de Movimento de Ativo - Visualizar');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentType['AssetMovimentType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Número'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_number']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMovimentType['ParentAssetMovimentType']['asset_moviment_type_structure'], array('controller' => 'asset_moviment_types', 'action' => 'view',
				$assetMovimentType['ParentAssetMovimentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operação'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($assetMovimentType['AssetMovimentOperation']['asset_moviment_operation_name'], array('controller' => 'asset_moviment_operations', 'action' => 'view', $assetMovimentType['AssetMovimentOperation']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Estruturado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_structure']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descrição'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $assetMovimentType['AssetMovimentType']['asset_moviment_type_description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>