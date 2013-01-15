<div class="entities form">
<?php echo $this->Form->create('Entity');?>
	<fieldset>
 		<legend><?php __('Entidades - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>