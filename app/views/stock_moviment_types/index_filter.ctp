<div class="stockMovimentTypes form">
<?php echo $this->Form->create('StockMovimentType');?>
	<fieldset>
 		<legend><?php __('Tipos de Movimento de Estoque - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>