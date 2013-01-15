<div class="productBrands index">
	<h2><?php __('Marcas de Produto');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'product_brand_name');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($productBrands as $productBrand):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $productBrand['ProductBrand']['id']; ?>&nbsp;</td>
		<td><?php echo $productBrand['ProductBrand']['product_brand_name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $productBrand['ProductBrand']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $productBrand['ProductBrand']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $productBrand['ProductBrand']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productBrand['ProductBrand']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
