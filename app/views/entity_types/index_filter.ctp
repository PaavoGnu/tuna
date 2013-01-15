<div class="entityTypes form">
<?php echo $this->Form->create('EntityType');?>
	<fieldset>
 		<legend><?php __('Tipos de Entidade - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>