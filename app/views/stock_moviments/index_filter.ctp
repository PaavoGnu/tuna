<div class="stockMoviments form">
<?php echo $this->Form->create('StockMoviment');?>
	<fieldset>
 		<legend><?php __('Movimentos de Estoque - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
			
			$this->Js->get('#StockMovimentEnterpriseId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getEnterpriseUnit'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#StockMovimentEnterpriseId").serialize()', 
					'update' => '#StockMovimentEnterpriseUnitId')));
				
			$this->Js->get('#StockMovimentEnterpriseUnitId');
			$this->Js->event('change', $this->Js->request(array('action' => 'getStock'),
				array(
					'async' => true, 'method' => 'POST', 'dataExpression' => true,
					'data' => '$("#StockMovimentEnterpriseUnitId").serialize()', 
					'update' => '#StockMovimentStockId')));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>