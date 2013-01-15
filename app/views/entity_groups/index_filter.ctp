<div class="entityGroups form">
<?php echo $this->Form->create('EntityGroup');?>
	<fieldset>
 		<legend><?php __('Grupos de Entidades - Filtrar'); ?></legend>
		<?php
			echo $this->SwModelFilter->indexModelFilterFieldSet($swModelFields);
		?>
	</fieldset>
<?php echo $this->Form->end(__('Filtrar', true));?>
</div>