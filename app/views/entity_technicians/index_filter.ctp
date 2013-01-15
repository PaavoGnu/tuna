<div class="entityTechnicians form">
<?php echo $this->Form->create('EntityTechnician');?>
	<fieldset>
 		<legend><?php __('Técnicos - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>