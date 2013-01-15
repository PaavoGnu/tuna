<div class="users index">
	<h2><?php __('Usuários');?></h2>
		
	<?php
		echo $this->SwIndex->indexDefaultHeader();
	?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ID', 'id');?></th>
			<th><?php echo $this->Paginator->sort('Grupo', 'group_id');?></th>
			<th><?php echo $this->Paginator->sort('Entidade', 'entity_id');?></th>
			<th><?php echo $this->Paginator->sort('Login', 'user_login');?></th>
			<th><?php echo $this->Paginator->sort('Nome', 'user_name');?></th>
			<th><?php echo $this->Paginator->sort('Habilitado', 'user_enabled');?></th>
			<th class="actions"><?php __('Ações');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['group_name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Entity']['entity_name'], array('controller' => 'entities', 'action' => 'view', $user['Entity']['id'])); ?>
		</td>
		<td><?php echo $user['User']['user_login']; ?>&nbsp;</td>
		<td><?php echo $user['User']['user_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['user_enabled'] ? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Zerar Senha', true), array('action' => 'erasePassword', $user['User']['id']), null, sprintf(__('Você têm certeza que deseja zerar a senha do usuário %s?', true), $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Excluir', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	<?php
		echo $this->SwIndex->indexDefaultPageCount();
		echo $this->SwIndex->indexDefaultPagination();
	?>
	
	<div class="actions">
		<?php
			echo $this->Html->link(__('Novo Usuário', true), array('action' => 'register')) . ' | ';
			echo $this->Html->link(__('Filtrar', true), array('action' => 'indexFilter'));
		?>
	</div>
</div>