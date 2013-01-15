<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
 		<legend><?php __('Grupos - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>