<?php

class SwExportCsvHelper extends AppHelper {
	
	var $helpers = array('Form');
	
	function indexExportCsvStream($data) {
		
		$exportCsvData = null;
		
		foreach ($data as $row) {
			$exportCsvData = $exportCsvData . implode(",", $row[$this->model()]) . "\n";
		}
		
		return $exportCsvData;		
	}
}

?>