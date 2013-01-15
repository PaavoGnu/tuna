<div class="stockMovimentOperations form">
<?php echo $this->Form->create('StockMovimentOperation');?>
	<fieldset>
 		<legend><?php __('Operações de Movimento de Estoque - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>