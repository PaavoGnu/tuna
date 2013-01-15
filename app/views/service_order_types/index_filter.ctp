<div class="serviceOrderTypes form">
<?php echo $this->Form->create('ServiceOrderType');?>
	<fieldset>
 		<legend><?php __('Tipos de Ordem de Serviço - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>