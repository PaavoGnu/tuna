<div class="enterprises index">
	<h2><?php __('Empresas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Entidade', 'entity_id');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($enterprises as $enterprise):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $enterprise['Enterprise']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($enterprise['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $enterprise['Entity']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $enterprise['Enterprise']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $enterprise['Enterprise']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $enterprise['Enterprise']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $enterprise['Enterprise']['id'])); ?>
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
