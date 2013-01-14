<div class="viewAssetMovimentItems index">
	<h2><?php __('Consulta do Movimento de Ativo');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Mov.', 'asset_moviment_id');?></th>
			<th><?php echo $this->Paginator->sort('Item', 'asset_moviment_item_id');?></th>
			<th><?php echo $this->Paginator->sort('Data', 'asset_moviment_date');?></th>
			<th><?php echo $this->Paginator->sort('Empresa', 'enterprise_id');?></th>
			<th><?php echo $this->Paginator->sort('Unidade de Empresa', 'enterprise_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'asset_moviment_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo de Prod.', 'product_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Produto', 'product_id');?></th>
			<th><?php echo $this->Paginator->sort('Un.', 'measure_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Qtd.', 'asset_moviment_item_amount');?></th>
			<th><?php echo $this->Paginator->sort('NS', 'asset_moviment_item_serial_number');?></th>
			<th><?php echo $this->Paginator->sort('Etiq. de Serv.', 'asset_moviment_item_service_number');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($viewAssetMovimentItems as $viewAssetMovimentItem):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_id']; ?>&nbsp;</td>
		<td><?php echo $viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_item_id']; ?>&nbsp;</td>
		<td><?php
				if (!is_null($viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_date'])) {
					echo date('d/m/Y H:i', strtotime($viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_date']));
					} ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItem['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$viewAssetMovimentItem['Enterprise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItem['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$viewAssetMovimentItem['EnterpriseUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItem['AssetMovimentType']['asset_moviment_type_name'], array('controller' => 'asset_moviment_types', 'action' => 'view',
				$viewAssetMovimentItem['AssetMovimentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItem['ProductType']['product_type_structure'], array('controller' => 'product_types', 'action' => 'view',
				$viewAssetMovimentItem['ProductType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItem['Product']['product_structure'], array('controller' => 'products', 'action' => 'view',
				$viewAssetMovimentItem['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItem['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view',
				$viewAssetMovimentItem['MeasureUnit']['id'])); ?>
		</td>
		<td><?php echo $viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_item_amount']; ?>&nbsp;</td>
		<td><?php echo $viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_item_serial_number']; ?>&nbsp;</td>				
		<td><?php echo $viewAssetMovimentItem['ViewAssetMovimentItem']['asset_moviment_item_service_number']; ?>&nbsp;</td>
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
</div>