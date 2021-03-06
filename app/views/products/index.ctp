<div class="products index">
	<h2><?php __('Produtos');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'product_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Marca', 'product_brand_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'product_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Estruturado', 'product_structure');?></th>
			<th><?php echo $this->Paginator->sort('Descrição', 'product_description');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($products as $product):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $product['Product']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['ProductType']['product_type_name'], array('controller' => 'product_types', 'action' => 'view', $product['ProductType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['ProductBrand']['product_brand_name'], array('controller' => 'product_brands', 'action' => 'view', $product['ProductBrand']['id'])); ?>
		</td>
		<td><?php echo $product['Product']['product_name']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['product_structure']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['product_description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultFooter();
	?>
</div>
