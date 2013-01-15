<?php
App::import('Vendor','tcpdf');
$tcpdf = new TCPDF();

$fontHeader = 'freesans';
$fontFooter = 'freesans';
$fontText = 'freesans';

//$tcpdf->xHeaderColor = array(150,0,0);
//$tcpdf->xHeaderText = 'Relatório de Ordem de Serviço';
//$tcpdf->xFooterText = $appTitleVersion;

//$tcpdf->SetCreator($appTitleVersion);
//$tcpdf->SetAuthor('Bruno Arins');
//$tcpdf->SetTitle('Relatório de Ordem de Serviço (' . $appTitle . ')');
//$tcpdf->SetSubject('Ordem de Serviço: ' . $serviceOrder['ServiceOrder']['id']);
//$tcpdf->SetKeywords('Tuna, Relatório, Ordem de Serviço,');

$tcpdf->SetHeaderData('customer_bw64.png', 35, 'Relatório de Ordem de Serviço', 'Universidade Santa Cecília | Ordem de Serviço: ' . $serviceOrder['ServiceOrder']['id']);

$tcpdf->SetHeaderFont(array($fontHeader,'',12));
$tcpdf->SetFooterFont(array($fontFooter,'',10));

//$tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$tcpdf->SetMargins(10, 30, 10);
$tcpdf->SetHeaderMargin(10);
$tcpdf->SetFooterMargin(20);

$tcpdf->SetAutoPageBreak(true, 30);

$tcpdf->SetImageScale(PDF_IMAGE_SCALE_RATIO);

//$tcpdf->SetLanguageArray($l);

// ---------------------------------------------------------

$tcpdf->AddPage();

$tcpdf->SetFont($fontText, '', 8);
$tcpdf->SetTextColor(0, 0, 0);

//MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0)

if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
	$tcpdf->SetFont($fontText, '', 14);	
	$tcpdf->SetTextColor(255, 0, 0);

	$lineY = $tcpdf->GetY();

	$tcpdf->MultiCell(0, 0, 'Ordem de Serviço Cancelada', 1, 'C', 0, 1, '', '', true, 0);
}					

$tcpdf->SetFont($fontText, '', 8);
$tcpdf->SetTextColor(0, 0, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Empresa', 1, 'L', 0, 2, '', '', true, 0);
$tcpdf->MultiCell(0, 0, $serviceOrder['Enterprise']['id'] . ' - ' . $serviceOrder['Enterprise']['enterprise_structure'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Un. de Empresa', 1, 'L', 0, 2, '', '', true, 0);
$tcpdf->MultiCell(0, 0, $serviceOrder['EnterpriseUnit']['id'] . ' - ' . $serviceOrder['EnterpriseUnit']['enterprise_unit_structure'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

$tcpdf->MultiCell(40, 0, 'Grupo de Entidade', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0, $serviceOrder['EntityGroup']['id'] . ' - ' . $serviceOrder['EntityGroup']['entity_group_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Entidade', 1, 'L', 0, 2, '', '', true, 0);
$tcpdf->MultiCell(0, 0, $serviceOrder['Entity']['id'] . ' - ' . $serviceOrder['Entity']['entity_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Contato', 1, 'L', 0, 2, '', '', true, 0);
$tcpdf->MultiCell(0, 0, $serviceOrder['EntityContact']['id'] . ' - ' . $serviceOrder['EntityContact']['entity_contact_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

$tcpdf->MultiCell(40, 0, 'Prioridade', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrderPriorityType']['id'] . ' - ' . $serviceOrder['ServiceOrderPriorityType']['service_order_priority_type_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Tipo', 1, 'L', 0, 2, '', '', true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrderType']['id'] . ' - ' . $serviceOrder['ServiceOrderType']['service_order_type_structure'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

$serviceOrderWarranty = $serviceOrder['ServiceOrder']['service_order_warranty'] ? 'Sim' : 'Não';

$tcpdf->MultiCell(40, 0, 'Garantia', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrderWarranty, 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Descrição', 1, 'L', 0, 2, '', '', true, 0);
$tcpdf->MultiCell(0, 0, nl2br($serviceOrder['ServiceOrder']['service_order_warranty_description']), 1, 'L', 0, 1, '', $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

if (!is_null($serviceOrder['ServiceOrder']['service_order_opening_date'])) {
	$serviceOrderOpening = date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_opening_date'])) . ' (' .
		$serviceOrder['ServiceOrderOpeningUser']['id'] . ' - ' . $serviceOrder['ServiceOrderOpeningUser']['user_name'] . ')';
} else {
	$serviceOrderOpening = '';
}

$tcpdf->MultiCell(40, 0, 'Abertura', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrderOpening, 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Descrição', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrder']['service_order_opening_description'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Observação', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrder']['service_order_opening_observation'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

$tcpdf->MultiCell(40, 0, 'Técnico', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['EntityTechnician']['id'] . ' - ' . $serviceOrder['EntityTechnician']['entity_technician_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

if (!is_null($serviceOrder['ServiceOrder']['service_order_routing_date'])) {
	$serviceOrderRouting = date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_routing_date'])) . ' (' .
		$serviceOrder['ServiceOrderRoutingUser']['id'] . ' - ' . $serviceOrder['ServiceOrderRoutingUser']['user_name'] . ')';
} else {
	$serviceOrderRouting = '';
}

$tcpdf->MultiCell(40, 0, 'Encaminhamento', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrderRouting, 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
	$serviceOrderCancellation = date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) . ' (' .
		$serviceOrder['ServiceOrderCancellationUser']['id'] . ' - ' . $serviceOrder['ServiceOrderCancellationUser']['user_name'] . ')';
} else {
	$serviceOrderCancellation = '';
}

$tcpdf->MultiCell(40, 0, 'Cancelamento', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrderCancellation, 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Motivo', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrder']['service_order_cancellation_description'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY() + 5;

if (!is_null($serviceOrder['ServiceOrder']['service_order_close_date'])) {
	$serviceOrderClose = date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_close_date'])) . ' (' .
		$serviceOrder['ServiceOrderCloseUser']['id'] . ' - ' . $serviceOrder['ServiceOrderCloseUser']['user_name'] . ')';
} else {
	$serviceOrderClose = '';
}

$tcpdf->MultiCell(40, 0, 'Encerramento', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrderClose, 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Solução', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrder']['service_order_close_description'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);


$lineY = $tcpdf->GetY() + 5;

if (!is_null($serviceOrder['ServiceOrder']['service_order_evaluation_date'])) {
	$serviceOrderEvaluation = date('d/m/Y H:i', strtotime($serviceOrder['ServiceOrder']['service_order_evaluation_date'])) . ' (' .
		$serviceOrder['ServiceOrderEvaluationUser']['id'] . ' - ' . $serviceOrder['ServiceOrderEvaluationUser']['user_name'] . ')';
} else {
	$serviceOrderEvaluation = '';
}

$tcpdf->MultiCell(40, 0, 'Avaliação', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrderEvaluation, 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Tipo', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrderEvaluationType']['id'] . ' - ' . $serviceOrder['ServiceOrderEvaluationType']['service_order_evaluation_type_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Grupo de Entidade', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrderEvaluationEntityGroup']['id'] . ' - ' . $serviceOrder['ServiceOrderEvaluationEntityGroup']['entity_group_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Entidade', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrderEvaluationEntity']['id'] . ' - ' . $serviceOrder['ServiceOrderEvaluationEntity']['entity_name'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$lineY = $tcpdf->GetY();

$tcpdf->MultiCell(40, 0, 'Descrição', 1, 'L', 0, 2, '', $lineY, true, 0);
$tcpdf->MultiCell(0, 0,  $serviceOrder['ServiceOrder']['service_order_evaluation_description'], 1, 'L', 0, 1, $tcpdf->GetX(), $lineY, true, 0);

$tcpdf->LastPage();

// ---------------------------------------------------------

echo $tcpdf->Output('pdfServiceOrder.pdf', 'I');
?>