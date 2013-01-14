<div class="viewAssetMovimentItemPositions index">
	<h2><?php __('Consulta da Posição de Ativo');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Empresa', 'enterprise_id');?></th>
			<th><?php echo $this->Paginator->sort('Unidade de Empresa', 'enterprise_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo de Prod.', 'product_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Produto', 'product_id');?></th>
			<th><?php echo $this->Paginator->sort('Un.', 'measure_unit_id');?></th>
			<th><?php echo $this->Paginator->sort('Qtd.', 'asset_moviment_item_position');?></th>			
	</tr>
	<?php
	$i = 0;
	foreach ($viewAssetMovimentItemPositions as $viewAssetMovimentItemPosition):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItemPosition['Enterprise']['enterprise_structure'], array('controller' => 'enterprises', 'action' => 'view',
				$viewAssetMovimentItemPosition['Enterprise']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItemPosition['EnterpriseUnit']['enterprise_unit_structure'], array('controller' => 'enterprise_unit', 'action' => 'view',
				$viewAssetMovimentItemPosition['EnterpriseUnit']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItemPosition['ProductType']['product_type_structure'], array('controller' => 'product_types', 'action' => 'view',
				$viewAssetMovimentItemPosition['ProductType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItemPosition['Product']['product_structure'], array('controller' => 'products', 'action' => 'view',
				$viewAssetMovimentItemPosition['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($viewAssetMovimentItemPosition['MeasureUnit']['measure_unit_abbreviation'], array('controller' => 'measure_units', 'action' => 'view',
				$viewAssetMovimentItemPosition['MeasureUnit']['id'])); ?>
		</td>
		<td><?php echo $viewAssetMovimentItemPosition['ViewAssetMovimentItemPosition']['asset_moviment_item_position']; ?>&nbsp;</td>		
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