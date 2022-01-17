<?php
require_once('tcpdf/tcpdf.php');
class PDF extends TCPDF{
    public function Header(){
    }
    public function Footer(){
    }
}
if(isset($_POST["create_pdf"])){
	// create new PDF document
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(true);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    $pdf->SetFont('aealarabiya', '', 12);

    // print newline
    $pdf->Ln();

    // Add a page
	$pdf->AddPage();
    $num_bill='رقم الفاتورة:';
    $pdf->MultiCell(50, 6, $num_bill ,0, 'R', 0, 0, '', '', true);
    $date = 'تاريخ الفاتورة:';
    $pdf->MultiCell(50, 6, $date ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(8);
    $seller_name='البائع:';
    $pdf->MultiCell(50, 6, $seller_name ,0, 'R', 0, 0, '', '', true);
    $payment_method='طريقة الدفع:';
    $pdf->MultiCell(50, 6, $payment_method ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(8);
    $notes='ملاحظات:';
    $pdf->MultiCell(100, 6, $notes ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(10);
    // Set some content to print
    $content = <<<EOD
        <style>
            th{
                text-align:center;
            }
        </style>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>المادة</th>
                    <th>الوحدة</th>
                    <th>وزن قائم</th>
                    <th>وزن الصافي</th>
                    <th>الإفرادي</th>
                    <th>الإجمالي</th>
                </tr>
            <thead>
            <tbody>

            </tbody>
        </table>
EOD;
	$pdf->writeHTML($content);
	if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('pdfReport.pdf', 'I');
    // END OF FILE
    }
?>