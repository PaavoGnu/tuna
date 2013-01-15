<?php

class SwModelFilterHelper extends AppHelper {
	
	var $helpers = array('Form');
	
	function indexModelFilterFieldSet($swModelFields) {
		
		$fieldSet = null;
		
		foreach($swModelFields as $k => $v) :
			if ($swModelFields[$k]['filter']) {
				$options = array();
				
				if (isset($v['fieldLabel'])) {
					$options = array_merge($options, array('label' => $v['fieldLabel']));
				}
				
				if (isset($v['fieldType'])) {
					$options = array_merge($options, array('type' => $v['fieldType']));
				}
				
				if (isset($v['fieldEmpty'])) {
					$options = array_merge($options, array('empty' => $v['fieldEmpty']));
				}
				
				if (isset($v['fieldValue'])) {
					$options = array_merge($options, array('value' => $v['fieldValue']));
				}
				
				if (isset($v['fieldDateFormat'])) {
					$options = array_merge($options, array('dateFormat' => $v['fieldDateFormat']));
				}
				
				if (isset($v['fieldTimeFormat'])) {
					$options = array_merge($options, array('timeFormat' => $v['fieldTimeFormat']));
				}
				
				if (isset($v['fieldMinYear'])) {
					$options = array_merge($options, array('minYear' => $v['fieldMinYear']));
				}
				
				if (isset($swModelFields[$k]['fieldType'])) {
					switch($swModelFields[$k]['fieldType']) {
						case 'text':
							$fieldSet = $fieldSet . $this->Form->input($k, $options);
							break;
							
						case 'datetime':
							switch($swModelFields[$k]['filterType']) {
								case 'between':
									$optionsFrom = $options;
									$optionsTo = $options;
									
									$optionsFrom['label'] = $optionsFrom['label'] . ' (De)';
									$optionsTo['label'] = $optionsTo['label'] . ' (Até)';
									
									$fieldSet = $fieldSet . $this->Form->input($k . '_from', $optionsFrom);
									$fieldSet = $fieldSet . $this->Form->input($k . '_to', $optionsTo);
									break;
							}
							break;
					}
				} else {
					$fieldSet = $fieldSet . $this->Form->input($k, $options);
				}
			}
		endforeach;
		
		return $fieldSet;
	}
}
?>