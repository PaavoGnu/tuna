<div class="assetMovimentOperations form">
<?php echo $this->Form->create('AssetMovimentOperation');?>
	<fieldset>
 		<legend><?php __('Operações de Movimento de Ativo - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>