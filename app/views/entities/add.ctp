<div class="entities form">
<?php echo $this->Form->create('Entity');?>
	<fieldset>
 		<legend><?php __('Entidades - Nova Entidade'); ?></legend>
	<?php
		echo $this->Form->input('entity_type_id', array('label' => 'Tipo'));
		echo $this->Form->input('entity_name', array('label' => 'Nome'));
		echo $this->Form->input('entity_real_name', array('label' => 'Nome Real'));
		echo $this->Form->input('entity_birth_date', array('label' => 'Nascimento', 'empty' => '-', 'dateFormat' => 'DMY', 'minYear' => '1900'));
		echo $this->Form->input('entity_cnpj_cpf', array('label' => 'CNPJ/CPF'));
		echo $this->Form->input('entity_inscr_est_rg', array('label' => 'Inscrição Estadual/RG'));
		echo $this->Form->input('entity_inscr_munic', array('label' => 'Inscrição Municipal'));
		echo $this->Form->input('entity_adress', array('label' => 'Endereço'));
		echo $this->Form->input('entity_neighborhood', array('label' => 'Bairro'));
		echo $this->Form->input('entity_city', array('label' => 'Cidade'));
		echo $this->Form->input('entity_email', array('label' => 'E-mail'));
		echo $this->Form->input('entity_postal_code', array('label' => 'CEP'));
		echo $this->Form->input('entity_state_province', array('label' => 'UF'));
		echo $this->Form->input('entity_ordinary_fone', array('label' => 'Telefone'));
		echo $this->Form->input('entity_ordinary_fone_extension', array('label' => 'Ramal'));
		echo $this->Form->input('entity_mobile_fone', array('label' => 'Celular'));
		echo $this->Form->input('EntityGroup', array('label' => 'Grupos'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Salvar', true));?>
</div>