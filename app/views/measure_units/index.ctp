<div class="measureUnits index">
	<h2><?php __('Unidades de Medida');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'measure_unit_name');?></th>
			<th><?php echo $this->Paginator->sort('Sigla', 'measure_unit_abbreviation');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($measureUnits as $measureUnit):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $measureUnit['MeasureUnit']['id']; ?>&nbsp;</td>
		<td><?php echo $measureUnit['MeasureUnit']['measure_unit_name']; ?>&nbsp;</td>
		<td><?php echo $measureUnit['MeasureUnit']['measure_unit_abbreviation']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $measureUnit['MeasureUnit']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $measureUnit['MeasureUnit']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $measureUnit['MeasureUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $measureUnit['MeasureUnit']['id'])); ?>
		</td>
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