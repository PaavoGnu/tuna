<div class="enterprises form">
<?php echo $this->Form->create('Enterprise');?>
	<fieldset>
 		<legend><?php __('Empresas - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>