<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-BR" xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" dir="ltr">
<head>
	<title>
		<?php __($appTitle . ' (' . $appVersion . ') | '); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->charset();
		echo $this->Html->meta('icon');
		echo $this->Html->css('tuna');
		echo $this->Html->script('jquery-1.4.4');
		
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
	    <div id="header">
			<div class="left">
				<?php echo $this->Html->link(
					$this->Html->image('product.png', array('alt'=> __('Tuna - Web ERP', true), 'border' => '0')),
						'http://www.tagbrasil.com.br/tuna', array('target' => '_blank', 'escape' => false));
				?>
			</div>
			
			<div class="right">
				<?php echo $this->Html->link(
					$this->Html->image('customer.png', array('alt'=> __('Tuna - Web ERP', true), 'border' => '0')),
						'http://www.unisanta.br/', array('target' => '_blank', 'escape' => false));
				?>
			</div>
		</div>
		
		<div id="menu">
				<div class="main">
					<ul class="menu">
						<li class="list">
							<a class="category">Cadastros</a>
							<ul class="submenu">
								<li><?php echo $this->Html->link(__('Empresas', true), array('controller' => 'enterprises', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Unidades de Empresa', true), array('controller' => 'enterprise_units', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Entidades', true), array('controller' => 'entities', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Tipos de Entidade', true), array('controller' => 'entity_types', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Grupos de Entidade', true), array('controller' => 'entity_groups', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Produtos', true), array('controller' => 'products', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Tipos de Produto', true), array('controller' => 'product_types', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Marcas de Produto', true), array('controller' => 'product_brands', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Unidades de Medida', true), array('controller' => 'measure_units', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Técnicos', true), array('controller' => 'entity_technicians', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Tipos de Ordem de Serviço', true), array('controller' => 'service_order_types', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Tipos de Etapa de Ordem de Serviço', true), array('controller' => 'service_order_step_types', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Operações de Movimento de Estoque', true), array('controller' => 'stock_moviment_operations', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Tipos de Movimento de Estoque', true), array('controller' => 'stock_moviment_types', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Estoques', true), array('controller' => 'stocks', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Operações de Movimento de Ativo', true), array('controller' => 'asset_moviment_operations', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Tipos de Movimento de Ativo', true), array('controller' => 'asset_moviment_types', 'action' => 'index')); ?></li>								
							</ul>
						</li>
					</ul>
					<ul class="menu">
						<li class="list">
							<a class="category">Movimentos</a>
							<ul class="submenu">
								<li><?php echo $this->Html->link(__('Ordem de Serviço', true), array('controller' => 'service_orders','action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Estoque', true), array('controller' => 'stock_moviments','action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Ativo', true), array('controller' => 'asset_moviments','action' => 'index')); ?></li>
							</ul>
						</li>
					</ul>	
					<ul class="menu">
						<li class="list">
							<a class="category">Consultas</a>
							<ul class="submenu">
								<li><?php echo $this->Html->link(__('Movimento de Estoque', true), array('controller' => 'view_stock_moviment_items','action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Posição de Estoque', true), array('controller' => 'view_stock_moviment_item_positions','action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Movimento de Ativo', true), array('controller' => 'view_asset_moviment_items','action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Posição de Ativo', true), array('controller' => 'view_asset_moviment_item_positions','action' => 'index')); ?></li>
							</ul>
						</li>
					</ul>	
					<ul class="menu">
						<li class="list">
							<a class="category">Administração</a>
							<ul class="submenu">
								<li><?php echo $this->Html->link(__('Usuários', true), array('controller' => 'users', 'action' => 'index')); ?></li>
								<li><?php echo $this->Html->link(__('Grupos', true), array('controller' => 'groups', 'action' => 'index')); ?></li>
							</ul>
						</li>
					</ul>
				</div>
			
				<div class="toolbar">
					<div class="qadd">
						<?php echo $this->Html->link(
							$this->Html->image('qadd.png', array('alt'=> __('Nova Ordem de Serviço', true), 'border' => '0')),
							array('controller' => 'service_orders','action' => 'add'), array('target' => '_blank', 'escape' => false));
						?>
					</div>
					
					<div class="qview">
						<?php echo $this->Form->create('ServiceOrder', array('action' => 'quickView'));?>
							<fieldset>							
								<table>
									<tr>
										<td><?php echo $this->Form->label('id', 'Ordem de Serviço:'); ?></td>
										<td><?php echo $this->Form->input('id', array('label' => false, 'type' => 'text', 'empty' => true)); ?></td>
									</tr>
								</table>
							</fieldset>
						<?php echo $this->Form->end();?>
					</div>
				</div>
			</div>
		
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->Session->flash('auth'); ?>
			
			<?php echo $content_for_layout; ?>
		</div>		
		
		<div id="status">
			<div class="left">
				<ul>
					<li>Módulo: Ordem de Serviço</li>
					<li><?php echo 'Usuário: '. $this->Html->link($userId . ' - ' . $userName, array('controller' => 'users', 'action' => 'view', $userId)); ?></li>
				</ul>
			</div>
			<div class="right">
				<ul>
					<li><?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout')); ?></li>
					<li><?php echo $this->Html->link(__('Trocar Senha', true), array('controller' => 'users', 'action' => 'changePassword', $userId)); ?></li>
					<li><?php echo 'Powered By: ' . $this->Html->link(__($frameWorkTitle.' ('.$frameWorkVersion.')', true), $frameWorkURL, array('target' => '_blank', 'escape' => false)); ?></li>					
				</ul>
			</div>
		</div>
	</div>
	
	<?php echo $this->Js->writeBuffer();?>
</body>
</html>

