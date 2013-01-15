<div class="serviceOrderStepTypes form">
<?php echo $this->Form->create('ServiceOrderStepType');?>
	<fieldset>
 		<legend><?php __('Tipos de Etapa de Ordem de Serviço - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>