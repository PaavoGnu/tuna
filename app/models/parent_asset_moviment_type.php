<?php
class ParentAssetMovimentType extends AppModel {
	var $name = 'AssetMovimentType';
	var $useDbConfig = 'tuna';
	var $useDbTable = 'asset_moviment_types';
	var $displayField = 'asset_moviment_type_structure';
	var $order = 'asset_moviment_type_structure';
	
	var $virtualFields = array(
		'asset_moviment_type_structure' => 'fn_asset_moviment_type_structure(ParentAssetMovimentType.id)'
		);
}
?>