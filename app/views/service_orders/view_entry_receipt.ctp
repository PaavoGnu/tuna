<?php
App::import('Vendor','xtcpdf');
$tcpdf = new XTCPDF();
$textfont = 'freesans';

$tcpdf->SetAuthor("KBS Homes & Properties at http://kbs-properties.com");
$tcpdf->SetAutoPageBreak( false );
$tcpdf->setHeaderFont(array($textfont,'',40));
$tcpdf->xheadercolor = array(150,0,0);
$tcpdf->xheadertext = 'KBS Homes & Properties';
$tcpdf->xfootertext = 'Copyright Â© %d KBS Homes & Properties. All rights reserved.';

$tcpdf->AddPage();

$tcpdf->SetTextColor(0, 0, 0);
$tcpdf->SetFont($textfont,'B',20);
$tcpdf->Cell(0,14, "Hello World", 0,1,'L');

echo $tcpdf->Output('filename.pdf', 'S');
?>