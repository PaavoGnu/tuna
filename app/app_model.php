<?php

App::import('DateTime', false);

class AppModel extends Model {
	
	var $swModelFields = array();
	
	function setModelFilterData($data) {	
		
		foreach($this->swModelFields as $k => $v) :
			if ($this->swModelFields[$k]['filter']) {
				if (isset($this->swModelFields[$k]['fieldType'])) {
					switch ($this->swModelFields[$k]['fieldType']) {
						case 'text':
							$this->swModelFields[$k]['filterData'] = $data[$this->name][$k];
							break;
						
						case 'datetime':
							$filterData = $data[$this->name][$k . '_from']['year'] .
								$data[$this->name][$k . '_from']['month'] .
								$data[$this->name][$k . '_from']['day'] .
								$data[$this->name][$k . '_from']['hour'] . 
								$data[$this->name][$k . '_from']['min'] . 
								'_and_' . 
								$data[$this->name][$k . '_to']['year'] .
								$data[$this->name][$k . '_to']['month'] .
								$data[$this->name][$k . '_to']['day'] .
								$data[$this->name][$k . '_to']['hour'] . 
								$data[$this->name][$k . '_to']['min'];
							
							if ($filterData != '_and_') {
								$this->swModelFields[$k]['filterData'] = $filterData;
							}
							
							break;	
					}
				} else {
					$this->swModelFields[$k]['filterData'] = $data[$this->name][$k];
				}				
			}
		endforeach;
	}
	
	function setModelFilterUrl() {
		$filterUrl = array();
			
		foreach($this->swModelFields as $k => $v) :
			if (($this->swModelFields[$k]['filter']) and (!empty($this->swModelFields[$k]['filterData']))) {
				if (isset($this->swModelFields[$k]['fieldType'])) {
					switch($this->swModelFields[$k]['fieldType']) {
						case 'text':
							switch($this->swModelFields[$k]['filterType']) {
								case 'equal':
									$filterUrl = array_merge($filterUrl, array('filter_' . $k . '_equal' => $this->swModelFields[$k]['filterData']));
									break;	

								case 'like':
									$filterUrl = array_merge($filterUrl, array('filter_' . $k . '_like' => $this->swModelFields[$k]['filterData']));
									break;
							}
							break;
					
						case 'datetime':
							switch($this->swModelFields[$k]['filterType']) {
								case 'between':
									$filterUrl = array_merge($filterUrl, array('filter_' . $k . '_between' => $this->swModelFields[$k]['filterData']));
									break;
							}
					}
				} else {
					switch($this->swModelFields[$k]['filterType']) {
						case 'equal':
							$filterUrl = array_merge($filterUrl, array('filter_' . $k . '_equal' => $this->swModelFields[$k]['filterData']));
							break;	

						case 'like':
							$filterUrl = array_merge($filterUrl, array('filter_' . $k . '_like' => $this->swModelFields[$k]['filterData']));
							break;
					}
				}
			}			
			
		endforeach;
		
		return $filterUrl;
	}
}
?>
