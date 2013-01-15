<?php

class SwIndexHelper extends AppHelper {
	
	var $helpers = array('Html', 'Paginator');
	
	function indexDefaultHeader() {
	
		$defaultHeader = '';
			
		return $defaultHeader;
	}
	
	function indexDefaultPageCount() {
	
		$defaultPageCount = ''
			. '<div class="pagecount"><p>'
			. $this->Paginator->counter(array('format' => __('Página %page% de %pages%, exibindo %current% registro(s) do total de %count%, do registro %start% ao %end%', true)))
			. '</p></div>';			
		
		return $defaultPageCount;		
	}
	
	function indexDefaultPagination() {
		
		$defaultPagination = ''
			. '<div class="paging">'
			. $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'))
			. ' | '
			. $this->Paginator->numbers()
			. ' | '
			. $this->Paginator->next(__('próxima', true) . ' >>', array(), null, array('class' => 'disabled'))
			. '</div>';
		
		return $defaultPagination;			
	}
	
	function indexDefaultActions() {
		
		$defaultActions = ''
			. '<div class="actions">'
			. $this->Html->link(__('Novo Registro', true), array('action' => 'add'))
			. ' | '
			. $this->Html->link(__('Filtrar', true), array('action' => 'indexFilter'))
			//. ' | '
			//. $this->Html->link(__('CSV', true), array('action' => 'indexExportCsv'), array('target' => '_blank'))
			. '</div>';
		
		return $defaultActions;
	}
	
	function indexDefaultFooter() {
	
		$defaultFooter = ''
			. $this->indexDefaultPageCount()
			. $this->indexDefaultPagination()
			. $this->indexDefaultActions();
			
		return $defaultFooter;
	}
}
?>