<div class="productTypes index">
	<h2><?php __('Tipos de Produto');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Número', 'product_type_number');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'parent_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'product_type_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'product_type_structure');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productTypes as $productType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productType['ProductType']['id']; ?>&nbsp;</td>
		<td><?php echo $productType['ProductType']['product_type_number']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productType['ParentProductType']['product_type_name'], array('controller' => 'product_types', 'action' => 'view', $productType['ParentProductType']['id'])); ?>
		</td>
		<td><?php echo $productType['ProductType']['product_type_name']; ?>&nbsp;</td>
		<td><?php echo $productType['ProductType']['product_type_structure']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $productType['ProductType']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $productType['ProductType']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $productType['ProductType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productType['ProductType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
