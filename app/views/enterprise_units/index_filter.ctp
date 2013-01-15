<div class="enterpriseUnits form">
<?php echo $this->Form->create('EnterpriseUnit');?>
	<fieldset>
 		<legend><?php __('Unidades de Empresa - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>