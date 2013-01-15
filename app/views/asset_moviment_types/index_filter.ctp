<div class="assetMovimentTypes form">
<?php echo $this->Form->create('AssetMovimentType');?>
	<fieldset>
 		<legend><?php __('Tipos de Movimento de Ativo - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>