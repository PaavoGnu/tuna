<div class="entities view">
  <h2><?php  __('Entidades - Visualizar');?></h2>
	<div class="entities qaction">
		<ul>
			<li><?php echo 'Ações:'; ?></li>
			<li><?php echo $this->Html->link('Editar,', array('action' => 'edit', $entity['Entity']['id'])); ?></li>
			<li><?php echo $this->Html->link('Excluir', array('action' => 'delete', $entity['Entity']['id']), null, sprintf(__('Você têm certeza que deseja excluir a entidade #%s?', true), $entity['Entity']['id'])); ?></li>
		</ul>
	</div>
	
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($entity['EntityType']['entity_type_name'], array('controller' => 'entity_types', 'action' => 'view', $entity['EntityType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome Completo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_real_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data de Nascimento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_birth_date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CNPJ/CPF'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_cnpj_cpf']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IE/RG'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_inscr_est_rg']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_inscr_munic']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Endereço'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_adress']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bairro'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_neighborhood']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cidade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_city']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('E-mail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('CEP'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_postal_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('UF'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_state_province']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_ordinary_fone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ramal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_ordinary_fone_extension']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $entity['Entity']['entity_mobile_fone']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php __('Entidades / Grupos de Entidade');?></h3>
	<?php if (!empty($entity['EntitiesEntityGroup'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Grupo de Entidade'); ?></th>
		<th><?php __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($entity['EntitiesEntityGroup'] as $entitiesEntityGroup):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $entitiesEntityGroup['id'];?></td>
			<td><?php echo $this->Html->link($entityGroups[$entitiesEntityGroup['entity_group_id']], array('controller' => 'entity_groups', 'action' => 'view', $entitiesEntityGroup['entity_group_id'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'entities_entity_groups', 'action' => 'delete', $entitiesEntityGroup['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entitiesEntityGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Entidade / Grupo de Entidade', true), array('controller' => 'entities_entity_groups', 'action' => 'add', $entity['Entity']['id'], null));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Entidades / Contatos de Entidade');?></h3>
	<?php if (!empty($entity['EntitiesEntityContact'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('Contato de Entidade'); ?></th>
		<th><?php __('Ações'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($entity['EntitiesEntityContact'] as $entitiesEntityContact):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $entitiesEntityContact['id'];?></td>
			<td><?php echo $this->Html->link($entitiesEntityContact['entity_contact_name'], array('controller' => 'entities', 'action' => 'view', $entitiesEntityContact['entity_contact_id'])); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Excluir', true), array('controller' => 'entities_entity_contacts', 'action' => 'delete', $entitiesEntityContact['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entitiesEntityContact['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nova Entidade / Contato de Entidade', true), array('controller' => 'entities_entity_contacts', 'action' => 'add', $entity['Entity']['id'], null));?> </li>
		</ul>
	</div>
</div>