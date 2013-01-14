<div class="entities index">
	<h2><?php __('Entidades');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Tipo', 'entity_type_id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'entity_name');?></th>
			<th><?php echo $this->Paginator->sort('Nome Completo', 'entity_real_name');?></th>
			<!--<th><?php echo $this->Paginator->sort('Endereço', 'entity_adress');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Bairro', 'entity_neighborhood');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('Cidade', 'entity_city');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('CEP', 'entity_postal_code');?></th>-->
			<!--<th><?php echo $this->Paginator->sort('UF', 'entity_state_province');?></th>-->
			<th><?php echo $this->Paginator->sort('Telefone', 'entity_ordinary_fone');?></th>
			<th><?php echo $this->Paginator->sort('Ramal', 'entity_ordinary_fone_extension');?></th>
			<th><?php echo $this->Paginator->sort('Celular', 'entity_mobile_fone');?></th>			
	</tr>
	<?php
	$i = 0;
	foreach ($entities as $entity):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link(__($entity['Entity']['id'], true), array('action' => 'view', $entity['Entity']['id'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entity['EntityType']['entity_type_name'], array('controller' => 'entity_types', 'action' => 'view', $entity['EntityType']['id'])); ?>
		</td>
		<td><?php echo $entity['Entity']['entity_name']; ?>&nbsp;</td>
		<td><?php echo $entity['Entity']['entity_real_name']; ?>&nbsp;</td>
		<!--<td><?php echo $entity['Entity']['entity_adress']; ?>&nbsp;</td>-->
		<!--<td><?php echo $entity['Entity']['entity_neighborhood']; ?>&nbsp;</td>-->
		<!--<td><?php echo $entity['Entity']['entity_city']; ?>&nbsp;</td>-->
		<!--<td><?php echo $entity['Entity']['entity_postal_code']; ?>&nbsp;</td>-->
		<!--<td><?php echo $entity['Entity']['entity_state_province']; ?>&nbsp;</td>-->
		<td><?php echo $entity['Entity']['entity_ordinary_fone']; ?>&nbsp;</td>
		<td><?php echo $entity['Entity']['entity_ordinary_fone_extension']; ?>&nbsp;</td>
		<td><?php echo $entity['Entity']['entity_mobile_fone']; ?>&nbsp;</td>
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
	
	<div class="actions">
		<?php echo $this->Html->link(__('Novo Registro', true), array('action' => 'add')); ?>
	</div>
</div>