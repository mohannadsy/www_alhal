<?php
require_once('tcpdf/tcpdf.php');
@include('sql/connection.php');
include('sql/sql_queries.php');
include('helper/ready_queries_functions.php');

class PDF extends TCPDF{
    public function Header(){
    }
    public function Footer(){
    }
}

function type($x){
    if($x=='cash'){
        return 'نقدي';
    }else{
        return 'آجل';
    }

}

// $_GET['print_type'] => seller || buyer

if(isset($_GET['code'])){
    $bill = [];
    $seller = [];
    $buyer = [];
    $items = [];
    $_GET['id'] = get_value_from_table_using_column($con , 'bills' ,'code' ,$_GET['code'] ,'id' );
        $select_bill_using_id_query = selectWhereId('bills', $_GET['id']);
        $select_bill_using_id_exec = mysqli_query($con, $select_bill_using_id_query);
        $bill = mysqli_fetch_array($select_bill_using_id_exec);
    
        $select_seller_details_query = selectWhereId('accounts', $bill['seller_id']);
        $select_seller_details_exec = mysqli_query($con, $select_seller_details_query);
        $seller = mysqli_fetch_array($select_seller_details_exec);
    
        $select_buyer_details_query = selectWhereId('accounts', $bill['buyer_id']);
        $select_buyer_details_exec = mysqli_query($con, $select_buyer_details_query);
        $buyer = mysqli_fetch_array($select_buyer_details_exec);
    
    // if(isset($_POST["create_pdf"])){
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
    $pdf->SetFont('arial', '', 12);

    // print newline
    $pdf->Ln();

    // Add a page
	$pdf->AddPage();
    $num_bill='رقم الفاتورة: ' . $bill['code'];
    $pdf->MultiCell(50, 6, $num_bill ,0, 'R', 0, 0, '', '', true);
    $date = 'تاريخ الفاتورة: ' . $bill['date'];
    $pdf->MultiCell(50, 6, $date ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(8);

    $name=' البائع: ' . $seller['name'];
    if($_GET['print_type'] == 'buyer')
        $name =' المشتري : ' . $buyer['name'];
    $pdf->MultiCell(50, 6, $name ,0, 'R', 0, 0, '', '', true);

    $payment_method='طريقة الدفع: ' . type($bill['seller_type_pay']);
    if($_GET['print_type'] == 'buyer')
        $payment_method='طريقة الدفع: ' . type($bill['buyer_type_pay']);
    $pdf->MultiCell(50, 6, $payment_method ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(8);

    $notes='ملاحظات: ' . $bill['seller_note'];
    if($_GET['print_type'] == 'buyer')
        $notes='ملاحظات: ' . $bill['buyer_note'];
    $pdf->MultiCell(100, 6, $notes ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(10);

    // Set some content to print
    $content = '';
    $content .= '
        <style>
            th,td{
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
                    <th>ملاحظات</th>
                </tr>
            <thead>
            <tbody>
                ';
                $select_items_using_id_query = "select DISTINCT * from bill_item, items where bill_id = '" . $_GET['id'] . "'
                and items.id = bill_item.item_id";
                $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
                $number = 1;
                while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
                    $content.="<tr>";
                    $content.="<td>" . $number++ . "</td>";
                    $content.="<td>" . $row['code'] . " - " . $row['name'] . "</td>";
                    $content.="<td>" . $row['unit'] . "</td>";
                    $content.="<td>" . $row['total_weight'] . "</td>";
                    $content.="<td>" . $row['real_weight'] . "</td>";
                    $content.="<td>" . $row['price'] . "</td>";
                    $content.="<td>" . $row['total_item_price'] . "</td>";
                    $content.="<td>" . $row['bill_item_note'] . "</td>";
                    $content.="</tr>";
                }
                $content.='
            </tbody>
        </table>';
	$pdf->writeHTML($content);
    if($_GET['print_type'] == 'buyer'){
        $total_price='الإجمالي: ' . $bill['total_price'] .' ل. س ';
        $pdf->MultiCell(100, 6, $total_price ,0, 'R', 0, 0, '', '', true);
    }else{
        $total_price='الإجمالي: ' . $bill['total_price'] .' ل. س ';
        $pdf->MultiCell(100, 6, $total_price ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(8);
        $com_ratio='الكمسيون: ' .'%' . $bill['com_ratio'];
        $pdf->MultiCell(25, 6, $com_ratio ,0, 'R', 0, 0, '', '', true);
        $com_value='قيمته: ' . $bill['com_value'] .' ل. س ';
        $pdf->MultiCell(100, 6, $com_value ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(8);
        $real_price='الصافي: ' . $bill['real_price'] .' ل. س ';
        $pdf->MultiCell(100, 6, $real_price ,0, 'R', 0, 0, '', '', true);
    }
        
    
	if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('SellerBill_'.$bill['code'], 'I');
    // END OF FILE
    }

if(isset($_GET['payment_code'])){
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
    $pdf->SetFont('arial', '', 12);
    // Add a page
	$pdf->AddPage();
    if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('payment', 'I');
    // END OF FILE
} 

?>