<div class="assetMovimentOperations form">
<?php echo $this->Form->create('AssetMovimentOperation');?>
	<fieldset>
 		<legend><?php __('Operações de Movimento de Ativo - Editar'); ?></legend>
	<?php
		echo $this->Form->input('asset_moviment_operation_name', array('label' => 'Nome'));
		echo $this->Form->input('asset_moviment_operation_description', array('label' => 'Descrição'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>