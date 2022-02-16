<?php
require_once('tcpdf/tcpdf.php');
@include('sql/connection.php');
include('sql/sql_queries.php');
include('helper/ready_queries_functions.php');
include('helper/config_functions.php');
include('helper/operation_functions.php');

require 'vendor/autoload.php';

// class PDF extends TCPDF{
//     public function Header(){
//     }
//     public function Footer(){
//     }
// }

function type($x){
    if($x=='cash'){
        return 'نقدي';
    }else{
        return 'آجل';
    }

}
function convert_number_to_arabic_text($num){
    $obj = new \ArPHP\I18N\Arabic();
    return $obj->int2str($num).' ليرة سورية فقط لا غير' ;
  }
//ratio between A4 and A5
//A4: 8.3*11.7in
//A5: 5.8*8.3in
//$pageLayout = array($width,$height);
//8.3/5.8=1.43 in
//11.7/8.3=1.40 in 
//4.1 x 5.8 A6
//4.1/8.3=0.50
//5.8/11.7=0.50

//$title='أبناء المرحوم صالح درويش';
$title=get_value_from_config('printing','company_name');
$location=get_value_from_config('printing','location');
$commercial_record=get_value_from_config('printing','commercial_record');
//$commercial_record='س -ت 40592';
$first_name=get_value_from_config('printing','first_name');
//$name1 = 'طلال ';
//$name2= 'جلال ';
$second_name = get_value_from_config('printing','second_name');
//$phone1='0988828388';
$first_num= get_value_from_config('printing','first_num');
//$phone2='0944571145';
$second_num= get_value_from_config('printing','second_num');


$page_type ='A4';

if(isset($_GET['print_type']) && $_GET['print_type'] == 'seller')
    $page_type = get_value_from_config('printing' , 'selling_bill_page_size');

if(isset($_GET['print_type']) && $_GET['print_type'] == 'buyer')
    $page_type = get_value_from_config('printing' , 'buying_bill_page_size');

if( isset($_GET['payment_code']) || isset($_GET['catch_code']))
    $page_type = get_value_from_config('printing' , 'bonds_page_size');


if( isset($_GET['comission_report']) || isset($_GET['item_report']) || isset($_GET['account_statement']))
    $page_type = get_value_from_config('printing' , 'reports_page_size');


$ratio = 1;
$font_size = 12;
if($page_type == 'A5'){
    $ratio = 0.71;
    $font_size = 8;
}
if($page_type == 'A6'){
    $ratio = 0.50;
    $font_size = 7;
}

//طباعة فاتورة بائع وفاتورة مشتري
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
	$pdf = new TCPDF('P', 'mm', $page_type, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(false);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    $pdf->SetFont('arial', '', $font_size);

    // print newline
    //$pdf->Ln();

    // Add a page
	$pdf->AddPage();
    $pdf->SetFont('aealarabiya', '', 14);

    if($page_type == 'A4'){
        $html='
    <style>
        
    </style>
    <h2>'.$title.'</h2>';
    }
    if($page_type == 'A5'){
        $html='
    <style>
        
    </style>
    <h4>'.$title.'</h4>';
    }
    if($page_type == 'A6'){
        $html='
    <style>
        
    </style>
    <h6>'.$title.'</h6>';
    }

    $pdf->writeHTML($html, true, false, true, false, '');
    //$pdf->Cell(0, 0, $title, 0, 1, 'R', 0, '', 0);
    $pdf->SetFont('aealarabiya', '', $font_size);
    //$pdf->Cell(0, 0, $location .' '. $commercial_record, 0, 1, 'R', 0, '', 0);
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $location .' '. $commercial_record ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(7*$ratio);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $first_name .' ' . $first_num ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $first_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('arial', '', $font_size);
    $num_bill='رقم الفاتورة: ' . $bill['code'];
    $pdf->MultiCell(85 * $ratio, 6 * $ratio, $num_bill ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $second_name .' ' . $second_num,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $second_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('arial', '', $font_size);
    if($pageLayout='A6'){
        $date = $bill['date'];
        $pdf->MultiCell(86 * $ratio, 6 * $ratio, $date ,0, 'L', 0, 0, '', '', true);
    }else{
        $date = 'تاريخ الفاتورة: ' . $bill['date'];
        $pdf->MultiCell(140 * $ratio, 6 * $ratio, $date ,0, 'L', 0, 0, '', '', true);
    }
    $pdf->Ln(7*$ratio);
    if($page_type == 'A4'){
        $font_for_title = 14;
    }
    if($page_type == 'A5'){
        $font_for_title = 10;
    }
    if($page_type == 'A6'){
        $font_for_title = 9;
    }
    $pdf->SetFont('arial', '',  $font_for_title);
    if($_GET['print_type'] == 'seller'){
    $bill_title='فاتورة شراء';
    $pdf->MultiCell(170 * $ratio, 6 * $ratio,  $bill_title ,0, 'C', 0, 0, '', '', true);
    }elseif($_GET['print_type'] == 'buyer'){
    $bill_title='فاتورة بيع';
    $pdf->MultiCell(170 * $ratio, 6 * $ratio,  $bill_title ,0, 'C', 0, 0, '', '', true);
    }
    $pdf->Ln(7*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $name=' البائع: ' . $seller['name'];
    if (get_value_from_config('printing','account_code') == "true") {
        $name=' البائع: '. $seller['code'] . ' - ' . $seller['name'];
    }
    if($_GET['print_type'] == 'buyer'){
        $name =' المشتري : ' . $buyer['name'];
         $pdf->MultiCell(100 * $ratio, 6 * $ratio, $name ,0, 'R', 0, 0, '', '', true);
        if (get_value_from_config('printing','account_code') == "true") {
        $name=' المشتري: '. $buyer['code'] . ' - ' . $buyer['name'];
        $payment_method='طريقة الدفع: ' . type($bill['buyer_type_pay']);
        $pdf->MultiCell(106 * $ratio, 6 * $ratio, $payment_method ,0, 'C', 0, 0, '', '', true);
         $pdf->Ln(6*$ratio);
    }
    }else{
    $pdf->MultiCell(100 * $ratio, 6 * $ratio, $name ,0, 'R', 0, 0, '', '', true);

    $payment_method='طريقة الدفع: ' . type($bill['seller_type_pay']);
    $payment_method='طريقة الدفع: ' . type($bill['buyer_type_pay']);
    $pdf->MultiCell(107 * $ratio, 6 * $ratio, $payment_method ,0, 'C', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    }
   

    $notes='ملاحظات: ' . $bill['seller_note'];
    if($_GET['print_type'] == 'buyer')
        $notes='ملاحظات: ' . $bill['buyer_note'];
    $pdf->MultiCell(170 * $ratio, 6 * $ratio, $notes ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(100 * $ratio, 6 * $ratio, $notes ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(9*$ratio);

    // Set some content to print
    $content = '';
    $content .= '
        <style>
            th,td{
                text-align:center;
            }
            .num{
                width:7%;
            }
            .item{
                width:22%;
            }
            .unit{
                width:9%;
            }
            .total_weight{
                width:10%;
            }
            .real_weight{
                width:13%;
            }
            .price{
                width:10%;
            }
            .total_item_price{
                width:18%; 
            }
            .bill_item_note{
                width:11%;
            }
        </style>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
            <thead>
                <tr>
                    <th class="num">الرقم</th>
                    <th class="item">المادة</th>
                    <th class="unit">الوحدة</th>
                    <th class="total_weight">وزن قائم</th>
                    <th class="real_weight">وزن الصافي</th>
                    <th class="price">الإفرادي</th>
                    <th class="total_item_price">الإجمالي</th>
                    <th class="bill_item_note">ملاحظات</th>
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
                    $content.="<td class='num'>" . $number++ . "</td>";
                     if (get_value_from_config('printing','item_code') == "true") {
                         $content.="<td class='item'>" .$row['code']. ' '. $row['name'] . "</td>";
                    }else{
                        $content.="<td class='item'>" . $row['name'] . "</td>";  
                    }
                    $content.="<td class='unit'>" . $row['unit'] . "</td>";
                    $content.="<td class='total_weight'>" . $row['total_weight'] . "</td>";
                    $content.="<td class='real_weight'>" . $row['real_weight'] . "</td>";
                    $content.="<td class='price'>" . $row['price'] . "</td>";
                    $content.="<td class='total_item_price'>" . $row['total_item_price'] . "</td>";
                    $content.="<td class='bill_item_note'>" . $row['bill_item_note'] . "</td>";
                    $content.="</tr>";
                }
                $content.='
            </tbody>
        </table>';
	$pdf->writeHTML($content);
    if($_GET['print_type'] == 'buyer'){
        if (get_value_from_config('printing','only_layra') == "true") {
            $fun = convert_number_to_arabic_text($bill['total_price']);
            $total_price='الإجمالي: ' . $bill['total_price'] .' ل . س ' . $fun;
            $pdf->MultiCell(185 * $ratio, 6 * $ratio,$total_price  ,0, 'R', 0, 0, '', '', true);
        }elseif(get_value_from_config('printing','only_layra') == "false"){
            $total_price='الإجمالي: ' . $bill['total_price'] .' ل . س ';
            $pdf->MultiCell(185 * $ratio, 6 * $ratio,$total_price  ,0, 'R', 0, 0, '', '', true);
        }
    }else{
        if (get_value_from_config('printing','only_layra') == "true") {
        $fun = convert_number_to_arabic_text($bill['total_price']);
        $total_price='الإجمالي: ' . $bill['total_price'] .' ل . س ' . $fun;
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $total_price ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(6*$ratio);
        }else{
            $total_price='الإجمالي: ' . $bill['total_price'] .' ل . س ';
            $pdf->MultiCell(185 * $ratio, 6 * $ratio, $total_price ,0, 'R', 0, 0, '', '', true);
            $pdf->Ln(6*$ratio);
        }
        $com_ratio='الكمسيون: ' .'%' . $bill['com_ratio'] ;
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $com_ratio ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(6*$ratio);

        if (get_value_from_config('printing','only_layra') == "true") {
            $fun = convert_number_to_arabic_text($bill['com_value']);
            $com_value='قيمة الكمسيون: ' . $bill['com_value'] .' ل . س '. $fun;
            $pdf->MultiCell(185 * $ratio, 6 * $ratio, $com_value ,0, 'R', 0, 0, '', '', true);
            $pdf->Ln(6*$ratio);
        }else{
            $com_value='قيمة الكمسيون: ' . $bill['com_value'] .' ل . س ';
            $pdf->MultiCell(185 * $ratio, 6 * $ratio, $com_value ,0, 'R', 0, 0, '', '', true);
            $pdf->Ln(6*$ratio);
        }

        if (get_value_from_config('printing','only_layra') == "true") {
            $fun = convert_number_to_arabic_text($bill['real_price']);
            $real_price='الصافي: ' . $bill['real_price'] .' ل . س ' .$fun ;
            $pdf->MultiCell(185 * $ratio, 6 * $ratio, $real_price ,0, 'R', 0, 0, '', '', true);
        }else{
            $real_price='الصافي: ' . $bill['real_price'] .' ل . س ';
            $pdf->MultiCell(185 * $ratio, 6 * $ratio, $real_price ,0, 'R', 0, 0, '', '', true);
        }
    }
        
	if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('SellerBill_'.$bill['code'], 'I');
    // END OF FILE
    }

//طباعة سند دفع
if(isset($_GET['payment_code'])){
    $payment_bond = [];
    $select_payment_bond_query = selectND('payment_bonds').andWhere('code' , $_GET['payment_code']);
    $select_payment_bond_exec = mysqli_query($con , $select_payment_bond_query);
    $payment_bond = mysqli_fetch_array($select_payment_bond_exec);
    
    $pdf = new TCPDF('P', 'mm', $page_type, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(false);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    //$pdf->SetFont('arial', 'B', 24);
    // Add a page
	$pdf->AddPage();
    $pdf->SetFont('aealarabiya', '', 14);

    if($page_type == 'A4'){
        $html='
    <style>
        
    </style>
    <h2>'.$title.'</h2>';
    }
    if($page_type == 'A5'){
        $html='
    <style>
        
    </style>
    <h4>'.$title.'</h4>';
    }
    if($page_type == 'A6'){
        $html='
    <style>
        
    </style>
    <h6>'.$title.'</h6>';
    }

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $location.' '. $commercial_record ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $first_name . ' ' . $first_num  ,0, 'R', 0, 0, '', '', true);
     $pdf->Ln(5*$ratio);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $first_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $second_name . ' ' . $second_num ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $second_num ,0, 'R', 0, 0, '', '', true);
    if($page_type == 'A4'){
        $pdf->SetFont('arial', 'B', 20);
    }
    if($page_type == 'A5'){
        $pdf->SetFont('arial', 'B', 13);
    }
    if($page_type == 'A6'){
        $pdf->SetFont('arial', 'B', 12);
    }
    //$pdf->SetFont('arial', 'B', 18);
    $tilte='سند دفع';
    $pdf->MultiCell(116 * $ratio, 8 * $ratio, $tilte ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(4*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $receipt_number = 'رقم الإيصال: ' . $payment_bond['code'];
    $pdf->MultiCell(165 * $ratio, 6 * $ratio, $receipt_number ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    $date = $payment_bond['date'];
    $pdf->MultiCell(165 * $ratio, 6 * $ratio, $date ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    $main_account_with_code = @get_name_and_code_from_table_using_id($con , 'accounts' , $payment_bond['main_account_id']);
    $main_account = @get_name_from_table_using_id($con , 'accounts' , $payment_bond['main_account_id']);
    //get_name_from_table_using_id
    if (get_value_from_config('printing','account_code') == "true") {
        $account = 'الحساب: ' .$main_account_with_code;
        $pdf->MultiCell(100 * $ratio , 6 * $ratio, $account ,0, 'R', 0, 0, '', '', true);
    }else{
        $account = 'الحساب: ' .$main_account;
        $pdf->MultiCell(100 * $ratio , 6 * $ratio, $account ,0, 'R', 0, 0, '', '', true);
    }
    $currency = 'العملة: ' . $payment_bond['currency'];
    $pdf->MultiCell(68 * $ratio, 6 * $ratio, $currency ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    $notes='ملاحظات: ' . $payment_bond['main_note'];
    $pdf->MultiCell(100 * $ratio, 6 * $ratio, $notes ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(9*$ratio);

    // Set some content to print
    $content = '';
    $content .= '
        <style>
            th,td{
                text-align:center;
            }
            .num{ 
                width : 8%;
             }
            .acc{
                width : 39%;
             }
            .maden{
                width : 18%;
             }
             .note{
                 width:35%;
             }
        </style>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
            <thead>
                <tr>
                    <th class="num">رقم</th>
                    <th class="maden">مدين</th>
                    <th class="acc">الحساب</th>
                    <th class="note">ملاحظات</th>
                </tr>
            <thead>
            <tbody>';
            $select_all_payment_bonds_with_same_code_query = select('payment_bonds').where('code' , $payment_bond['code']);
            $select_all_payment_bonds_with_same_code_exec = mysqli_query($con , $select_all_payment_bonds_with_same_code_query);
            $counter = 1;
            $total_payment = 0;
            while ($payment_bond_from_code = mysqli_fetch_array($select_all_payment_bonds_with_same_code_exec)){
                $content.="<tr>";
                $content.="<td  class='num'>" . $counter++ . "</td>";
                $content.="<td>" . $payment_bond_from_code['daen'] ."</td>";
                if (get_value_from_config('printing','account_code') == "true") {
                    $content.="<td>" . get_name_and_code_from_table_using_id($con , 'accounts' , $payment_bond_from_code['other_account_id']) . "</td>";
                }else{
                    $content.="<td>" . get_name_from_table_using_id($con , 'accounts' , $payment_bond_from_code['other_account_id']) . "</td>";
                }
                //$content.="<td>" . get_name_and_code_from_table_using_id($con , 'accounts' , $payment_bond_from_code['other_account_id']) . "</td>";
                $content.="<td>" . $payment_bond_from_code['note'] . "</td>";
                $content.="</tr>";

            $total_payment += $payment_bond_from_code['daen'];
            }

            $content.='  
            </tbody>
        </table>';
	$pdf->writeHTML($content);
    if (get_value_from_config('printing','only_layra') == "true") {
        $fun=convert_number_to_arabic_text($total_payment);
        $res_number='المجموع: ' .$total_payment . ' ل . س ' . $fun;
        $pdf->MultiCell(170 * $ratio , 6 * $ratio, $res_number ,0, 'L', 0, 0, '', '', true);
    }else{
        $res_number='المجموع: ' .$total_payment . ' ل . س ';
        $pdf->MultiCell(170 * $ratio , 6 * $ratio, $res_number ,0, 'L', 0, 0, '', '', true);
    }
   
    if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document

	$pdf->output('payment', 'I');
    // END OF FILE
} 
//////////////////////////سند قبض
if(isset($_GET['catch_code'])){
    $catch_bond = [];
    $select_catch_bond_query = selectND('catch_bonds').andWhere('code' , $_GET['catch_code']);
    $select_catch_bond_exec = mysqli_query($con , $select_catch_bond_query);
    $catch_bond = mysqli_fetch_array($select_catch_bond_exec);

    $pdf = new TCPDF('P', 'mm', $page_type, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(false);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    $pdf->SetFont('arial', 'B', 24);
    // Add a page
	$pdf->AddPage();
    $pdf->SetFont('aealarabiya', '', 14);

    if($page_type == 'A4'){
        $html='
    <style>
        
    </style>
    <h2>'.$title.'</h2>';
    }
    if($page_type == 'A5'){
        $html='
    <style>
        
    </style>
    <h4>'.$title.'</h4>';
    }
    if($page_type == 'A6'){
        $html='
    <style>
        
    </style>
    <h6>'.$title.'</h6>';
    }

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $location.' '. $commercial_record ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $first_name . ' ' . $first_num  ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $first_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $second_name . ' ' . $second_num ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $second_num ,0, 'R', 0, 0, '', '', true);
    if($page_type == 'A4'){
        $pdf->SetFont('arial', 'B', 20);
    }
    if($page_type == 'A5'){
        $pdf->SetFont('arial', 'B', 13);
    }
    if($page_type == 'A6'){
        $pdf->SetFont('arial', 'B', 12);
    }
    //$pdf->SetFont('arial', 'B', 18);
    $tilte='سند دفع';
    $pdf->MultiCell(116 * $ratio, 8 * $ratio, $tilte ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(4*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $receipt_number = 'رقم الإيصال: ' . $catch_bond['code'];
    $pdf->MultiCell(165 * $ratio, 6 * $ratio, $receipt_number ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio); 
    $date =  $catch_bond['date'];
    $pdf->MultiCell(165 * $ratio, 6 * $ratio, $date ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    $main_account_with_code = @get_name_and_code_from_table_using_id($con , 'accounts' , $catch_bond['main_account_id']);
    $main_account = @get_name_from_table_using_id($con , 'accounts' , $catch_bond['main_account_id']);
    //$account = 'الحساب: ' . $main_account;
    //$pdf->MultiCell(100 * $ratio , 6 * $ratio, $account ,0, 'L', 0, 0, '', '', true);
    if (get_value_from_config('printing','account_code') == "true") {
        $account = 'الحساب: ' .$main_account_with_code;
        $pdf->MultiCell(100 * $ratio , 6 * $ratio, $account ,0, 'R', 0, 0, '', '', true);
    }else{
        $account = 'الحساب: ' .$main_account;
        $pdf->MultiCell(100 * $ratio , 6 * $ratio, $account ,0, 'R', 0, 0, '', '', true);
    }
    $currency = 'العملة: '. $catch_bond['currency'];
    $pdf->MultiCell(68 * $ratio, 6 * $ratio, $currency ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(6*$ratio);
    $notes='ملاحظات: ' . $catch_bond['main_note'];
    $pdf->MultiCell(100 * $ratio, 6 * $ratio, $notes ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(9*$ratio);
    $content = '';
    $content .= '
        <style>
            th,td{
                text-align:center;
            }
            .num{ 
                width : 8%;
             }
             .daen{
                 width : 18%;
             }
            .acc{
                 width : 39%;
             }
             .note{
                 width:35%;
             }
        </style>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
            <thead>
                <tr>
                    <th class="num">رقم</th>
                    <th class="daen">دائن</th>
                    <th class="acc">الحساب</th>
                    <th class="note">ملاحظات</th>
                </tr>
            <thead>
            <tbody>';
            $select_all_catch_bonds_with_same_code_query = select('catch_bonds').where('code' , $catch_bond['code']);
            $select_all_catch_bonds_with_same_code_exec = mysqli_query($con , $select_all_catch_bonds_with_same_code_query);
            $counter = 1;
            $total_catch = 0;
            while ($catch_bond_from_code = mysqli_fetch_array($select_all_catch_bonds_with_same_code_exec)){
                $content.= "<tr>";
                $content.= "<td>" . $counter++ . "</td>";
                $content.= "<td>". $catch_bond_from_code['maden'] ."</td>";
                if (get_value_from_config('printing','account_code') == "true") {
                   $content.= "<td>" . get_name_and_code_from_table_using_id($con , 'accounts' , $catch_bond_from_code['other_account_id']) . "</td>";
                }else{
                    $content.= "<td>" . get_name_from_table_using_id($con , 'accounts' , $catch_bond_from_code['other_account_id']) . "</td>";
                }
                //$content.= "<td>" . get_name_and_code_from_table_using_id($con , 'accounts' , $catch_bond_from_code['other_account_id']) . "</td>"; 
                $content.= "<td>" . $catch_bond_from_code['note'] . "</td>";
                $content.= "</tr>";

                $total_catch += $catch_bond_from_code['maden'];
            }
            $content.='  
            </tbody>
        </table>';
	$pdf->writeHTML($content);
    if (get_value_from_config('printing','only_layra') == "true") {
        $fun = convert_number_to_arabic_text($total_catch);
        $res_number='المجموع: ' .$total_catch . ' ل .س ' .$fun;
    }else{
        $fun = convert_number_to_arabic_text($total_catch);
        $res_number='المجموع: ' .$total_catch . ' ل .س ';
    }
    $pdf->MultiCell(170 * $ratio, 6 * $ratio, $res_number ,0, 'L', 0, 0, '', '', true);

    if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document

	$pdf->output('catch', 'I');
    // END OF FILE
}

////////////////////////طباعة حركة مادة
if(isset($_GET['item_report'])){
    // if (isset($_POST['radio_value_from_report_item']) && isset($_POST['text_value_from_report_item'])) {
        $and_where_condition = '';
    
        if ($_GET['radio_value_from_report_item'] == 'items' && $_GET['text_value_from_report_item'] != '') {
            $and_where_condition = " and items.code = '" . get_code_from_input($_GET['text_value_from_report_item']) . "'";
        }
        if ($_GET['radio_value_from_report_item'] == 'accounts' && $_GET['text_value_from_report_item'] != '') {
            $and_where_condition = " and (seller_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_GET['text_value_from_report_item'])) . "'
                                    or buyer_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_GET['text_value_from_report_item'])) . "')";
        }
        if ($_GET['radio_value_from_report_item'] == 'categories' && $_GET['text_value_from_report_item'] != '') {
            $and_where_condition = " and category_id = '" . getId($con, 'categories', 'code', get_code_from_input($_GET['text_value_from_report_item']))  . "'";
        }
        $from_date = $_GET['from_date'];
        $to_date = $_GET['to_date'];
    $pdf = new TCPDF('P', 'mm', $page_type, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(false);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    //$pdf->SetFont('arial', 'B', 24);
    // Add a page
	$pdf->AddPage();
    $pdf->SetFont('aealarabiya', '', 14);
    if($page_type == 'A4'){
        $html='
    <style>
        
    </style>
    <h2>'.$title.'</h2>';
    }
    if($page_type == 'A5'){
        $html='
    <style>
        
    </style>
    <h4>'.$title.'</h4>';
    }
    if($page_type == 'A6'){
        $html='
    <style>
        
    </style>
    <h6>'.$title.'</h6>';
    }

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $location.' '. $commercial_record ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $first_name . ' ' . $first_num  ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $first_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $second_name . ' ' . $second_num ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $second_num ,0, 'R', 0, 0, '', '', true);
    if($page_type == 'A4'){
        $pdf->SetFont('arial', 'B', 20);
    }
    if($page_type == 'A5'){
        $pdf->SetFont('arial', 'B', 13);
    }
    if($page_type == 'A6'){
        $pdf->SetFont('arial', 'B', 12);
    }
    //$pdf->SetFont('arial', 'B', 18);
    $pdf->Ln(2*$ratio);
    $tilte='تقرير حركة مادة';
    $pdf->MultiCell(180 * $ratio, 8 * $ratio, $tilte ,0, 'C', 0, 0, '', '', true);
    $pdf->Ln(4*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $from='من تاريخ: ' .$from_date;
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $from ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $to ='إلى تاريخ: '  . $to_date;
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $to ,0, 'L', 0, 0, '', '', true);
    //$pdf->Ln(10*$ratio);
    $pdf->Ln(6*$ratio);

    $pdf->SetFont('arial', '', $font_size);
    
    if($_GET['text_value_from_report_item']==''){
        $item='';
        $pdf->Ln(9*$ratio);
    }elseif($_GET['radio_value_from_report_item'] == 'items'){
        $item=' المادة: ' .$_GET['text_value_from_report_item'];
        $pdf->MultiCell(180*$ratio, 6*$ratio,$item, 0, 'R', 0, 0, '', '', true);
        $pdf->Ln(9*$ratio);
    }elseif($_GET['radio_value_from_report_item'] == 'accounts'){
        $item=' العميل: ' .$_GET['text_value_from_report_item'];
        $pdf->MultiCell(182*$ratio, 6*$ratio,$item, 0, 'R', 0, 0, '', '', true);
        $pdf->Ln(9*$ratio);
    }elseif($_GET['radio_value_from_report_item'] == 'categories'){
        $item=' الصنف: ' .$_GET['text_value_from_report_item'];
        $pdf->MultiCell(168*$ratio, 6*$ratio,$item, 0, 'R', 0, 0, '', '', true);
        $pdf->Ln(9*$ratio);
    }
    if($page_type == 'A5'){
        $font_table = 6;
    }
    if($page_type == 'A6'){
        $font_table = 5;
    }else{
        $font_table = 10;
    }
    $pdf->SetFont('arial', '',  $font_table);
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
                    <th colspan="3" rowspan=""></th>
                    <th colspan="2"> الإدخالات </th>
                    <th colspan="2">الإخراجات</th>
                    <th colspan="2">الرصيد</th>
                </tr>
                <tr>
                    <th> التاريخ </th>
                    <th> الفاتورة </th>
                    <th>اسم المادة </th>
                    <th> الكمية </th>
                    <th> السعر </th>
                    <th> الكمية </th>
                    <th> السعر </th>
                    <th> الكمية </th>
                    <th> السعر </th>
                </tr>
            </thead>
            <tbody>';

            $select_items_using_id_query = "select DISTINCT items.code as item_code,
                                                            bills.code as bill_code,
                                                            bills.id as bill_id,
                                                            unit, date, buyer_id,seller_id,
                                                            category_id,total_item_price,
                                                            name,currency,
                                                            real_weight,real_price,
                                                            total_weight,total_price,
                                                            com_value,com_ratio
                                                             from bill_item, items,bills 
                                                             where items.id = bill_item.item_id and bills.id = bill_item.bill_id $and_where_condition 
                                                             and date between '$from_date' and '$to_date'";
            $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
            while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
                $category_name = get_value_from_table_using_id($con, 'categories', 'name', $row['category_id']);
                // $buyer_name = get_name_from_table_using_id($con, 'accounts', $row['buyer_id']);
                // $seller_name = get_name_from_table_using_id($con, 'accounts', $row['seller_id']);
                $content.= "<tr ondblclick='window.open(\"com_bill_open.php?id=" . $row['bill_id'] . "\" , \"_self\")'>";
                $content.= "<td>" . $row['date'] . "</td>";
                $content.= "<td>" . $row['bill_code'] . "</td>";
                $content.= "<td>" . $row['name'] . "</td>";
                $content.= "<td>" . $row['real_weight'] . "</td>";
                $content.= "<td>" . $row['total_item_price'] . "</td>";
                $inbox_weight = $row['real_weight'];
                $inbox_price = $row['total_item_price'];
                $outbox_price = '0';
                $outbox_weight = '0';
                if ($row['buyer_id'] == 0)
                    $content.= "<td>" . '0' . "</td>";
                else{
                    $content.= "<td>" . $row['real_weight'] . "</td>";
                    $outbox_weight = $row['real_weight'];
                }
                if ($row['buyer_id'] == 0)
                    $content.= "<td>" . '0' . "</td>";
                else{
                    $content.= "<td>" . $row['total_item_price'] . "</td>";
                    $outbox_price = $row['total_item_price'];
                }
                $content.= "<td>" . ($inbox_weight - $outbox_weight) . "</td>";
                $content.= "<td>" . ($inbox_price - $outbox_price) . "</td>";
                $content.= "</tr>";
            }
            $content.='  
            </tbody>
        </table>';
	$pdf->writeHTML($content);
    if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('item report', 'I');
    // END OF FILE
}
//////////////////////////////طباعة حركة كمسيون
if(isset($_GET['comission_report'])){
    //if (isset($_POST['radio_value']) && isset($_POST['text_value'])) {
    $and_where_condition = '';

    if ($_GET['radio_value'] == 'items' && $_GET['text_value'] != '') {
        $and_where_condition = " and items.code = '" . get_code_from_input($_GET['text_value']) . "'";
    }
    if ($_GET['radio_value'] == 'accounts' && $_GET['text_value'] != '') {
        $and_where_condition = " and (seller_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_GET['text_value'])) . "'
                                or buyer_id = '" . getId($con, 'accounts', 'code', get_code_from_input($_GET['text_value'])) . "')";
    }
    if ($_GET['radio_value'] == 'categories' && $_GET['text_value'] != '') {
        $and_where_condition = " and category_id = '" . getId($con, 'categories', 'code', get_code_from_input($_GET['text_value']))  . "'";
    }
    $total_comission = '0';
    $total_bill = '0';
    $real_bill = '0';

    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];

    $pdf = new TCPDF('P', 'mm', $page_type, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(false);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl';
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    $pdf->SetFont('arial', 'B', 24);
    // Add a page
	$pdf->AddPage();
    
    $pdf->SetFont('aealarabiya', '', 14);

    if($page_type == 'A4'){
        $html='
    <style>
        
    </style>
    <h2>'.$title.'</h2>';
    }
    if($page_type == 'A5'){
        $html='
    <style>
        
    </style>
    <h4>'.$title.'</h4>';
    }
    if($page_type == 'A6'){
        $html='
    <style>
        
    </style>
    <h6>'.$title.'</h6>';
    }

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $location.' '. $commercial_record ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $first_name . ' ' . $first_num  ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $first_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $second_name . ' ' . $second_num ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $second_num ,0, 'R', 0, 0, '', '', true);
    if($page_type == 'A4'){
        $pdf->SetFont('arial', 'B', 20);
    }
    if($page_type == 'A5'){
        $pdf->SetFont('arial', 'B', 13);
    }
    if($page_type == 'A6'){
        $pdf->SetFont('arial', 'B', 12);
    }
    //$pdf->SetFont('arial', 'B', 18);
    $pdf->Ln(2*$ratio);
    $tilte='تقرير حركة كمسيون';
    $pdf->MultiCell(180 * $ratio, 8 * $ratio, $tilte ,0, 'C', 0, 0, '', '', true);
    $pdf->Ln(4*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $from='من تاريخ: ' .$from_date;
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $from ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $to ='إلى تاريخ: '  . $to_date;
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $to ,0, 'L', 0, 0, '', '', true);
    //$pdf->Ln(10*$ratio);
    $pdf->Ln(7*$ratio);
    $pdf->SetFont('arial', '', $font_size);

    if($_GET['text_value']==''){
        $item='';
        $pdf->Ln(9*$ratio);
    }elseif($_GET['radio_value'] == 'items'){
        $item=' المادة: ' .$_GET['text_value'];
        $pdf->MultiCell(179*$ratio, 6*$ratio,$item, 0, 'R', 0, 0, '', '', true);
        $pdf->Ln(11*$ratio);
    }elseif($_GET['radio_value'] == 'accounts'){
        $item=' العميل: ' .$_GET['text_value'];
        $pdf->MultiCell(182*$ratio, 6*$ratio,$item, 0, 'R', 0, 0, '', '', true);
        $pdf->Ln(11*$ratio);
    }elseif($_GET['radio_value'] == 'categories'){
        $item=' الصنف: ' .$_GET['text_value'];
        $pdf->MultiCell(169*$ratio, 6*$ratio,$item, 0, 'R', 0, 0, '', '', true);
        $pdf->Ln(11*$ratio);
    }

    if($page_type == 'A5'){
        $font_table = 6;
    }
    if($page_type == 'A6'){
        $font_table = 5;
    }else{
        $font_table = 10;
    }
    $pdf->SetFont('arial', '',  $font_table);
    $content = '';
    $content .= '
        <style>
            th,td{
                text-align:center;
            }
            .num{
                width:8%;
            }
            .date{
                width: 12%;
            }
            .item{
                width: 10%;
            }
            .total_weight{
                width: 10%;
            }
            .real_weight{
                width: 10%;
            }
            .buyer{
                width:15%;
            }
            .seller{
                width:15%;
            }
            .comission{
                width:10%;
            }
            .total{
                width:10%;
            }
        </style>
        <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
            <thead>
            <tr>
                <th class="num">رقم الفاتورة </th>
                <th class= "date">تاريخ الفاتورة </th>
                <th class="buyer"> المشتري </th>
                <th class="seller">البائع </th>
                <th class="item">اسم المادة </th>
                <th class="total_weight"> القائم </th>
                <th class="real_weight"> الصافي </th>
                <th class="comission"> الكمسيون </th>
                <th class= "total">الاجمالي</th>
            </tr>
            </thead>
            <tbody>';
            $select_items_using_id_query = "select DISTINCT items.code as item_code,
                                                            bills.code as bill_code,
                                                            bills.id as bill_id,total_item_price,com_ratio,
                                                            unit, date, buyer_id,seller_id,
                                                            name,currency,com_ratio,
                                                            com_value,category_id,total_weight,real_weight
                                                             from bill_item, items,bills 
                                                             where items.id = bill_item.item_id and bills.id = bill_item.bill_id $and_where_condition 
                                                             and date between '$from_date' and '$to_date'";
            $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
            $counter_for_com_id = 0;
            while ($row = mysqli_fetch_array($select_items_using_id_exec)) {
                $category_name = get_value_from_table_using_id($con, 'categories', 'name', $row['category_id']);
                $buyer_name = get_name_from_table_using_id($con, 'accounts', $row['buyer_id']);
                $seller_name = get_name_from_table_using_id($con, 'accounts', $row['seller_id']);
                $bill_code = get_value_from_table_using_id($con, 'bills', 'code', $row['bill_id']);
                $content.= "<tr >";
                $content.= "<td class=\"num\">" . $row['bill_code'] . "</td>";
                $content.= "<td class= \"date\">" . $row['date'] . "</td>";
                //$content.= "<td class = \"category\">" . $category_name . "</td>";
                //$content.= "<td class=\"unit\">" . $row['unit'] . "</td>";
                // echo "<td>" . $row['currency'] . "</td>";
                $content.= "<td class=\"buyer\">" . $buyer_name . "</td>";
                $content.= "<td class=\"seller\">" . $seller_name . "</td>";
                $content.= "<td class=\"item\">" . $row['name'] . "</td>";
                $content.= "<td class=\"total_weight\">" . $row['total_weight'] . "</td>";
                $content.="<td class=\"real_weight\">" . $row['real_weight'] . "</td>";
                 $current_com_value = ($row['com_ratio'] / 100) * $row['total_item_price'];
                $content.= "<td class=\"comission\" id='com_" . $counter_for_com_id++ . "'>" . $current_com_value . "</td>";
                $content.= "<td class= \"total\">".$row['total_item_price']."</td>";
                $content.= "</tr>";
                $total_comission += $current_com_value;
                $total_bill += $row['total_item_price'];
            }
            $real_bill = $total_bill - $total_comission;
            $content.='  
            </tbody>
        </table>';
	$pdf->writeHTML($content);
    $pdf->SetFont('arial', '', $font_size);
    if (get_value_from_config('printing','only_layra') == "true") {
        $fun = convert_number_to_arabic_text($total_bill);
        $total_price='إجمالي الفواتير: ' . $total_bill . ' ل .س ' . $fun;
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $total_price ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(6*$ratio);
    }else{
        $total_price='إجمالي الفواتير: ' . $total_bill . ' ل .س ';
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $total_price ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(6*$ratio);
    }
    if (get_value_from_config('printing','only_layra') == "true") {
        $fun = convert_number_to_arabic_text($total_comission);
        $com_ratio='قيمة الكمسيون: ' . $total_comission . ' ل .س ' . $fun;
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $com_ratio ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(6*$ratio);
    }else{
        $com_ratio='قيمة الكمسيون: ' . $total_comission . ' ل .س ';
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $com_ratio ,0, 'R', 0, 0, '', '', true);
        $pdf->Ln(6*$ratio);
    }
    if (get_value_from_config('printing','only_layra') == "true") {
        $fun = convert_number_to_arabic_text($real_bill);
        $real_price='صافي الفواتير: ' . $real_bill . ' ل .س ' . $fun;
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $real_price ,0, 'R', 0, 0, '', '', true);
    }else{
        $real_price='صافي الفواتير: ' . $real_bill . ' ل .س ';
        $pdf->MultiCell(185 * $ratio, 6 * $ratio, $real_price ,0, 'R', 0, 0, '', '', true);
    }
  
    if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('comission report', 'I');
    // END OF FILE

}
/////////////////////طباعة كشف حساب
if(isset($_GET['account_statement'])){
    
    $report_type_details = false;
    if(get_value_from_config('account_statement' , 'report_type_details') == "true"){
        $report_type_details = true;
    }

    $pdf = new TCPDF('P', 'mm', $page_type, true, 'UTF-8', false);
    
    $pdf->SetCreator(PDF_CREATOR);
    //header
	$pdf->setPrintHeader(false);

    // set some language dependent data:
    $lg = Array();
    $lg['a_meta_charset'] = 'UTF-8';
    $lg['a_meta_dir'] = 'rtl'; 
    $lg['a_meta_language'] = 'fa';
    $lg['w_page'] = 'page';
    // set some language-dependent strings (optional)
    $pdf->setLanguageArray($lg);

    // set font
    $pdf->SetFont('arial', 'B', 24);
    // Add a page
	$pdf->AddPage();


    $pdf->SetFont('aealarabiya', '', 14);
    if($page_type == 'A4'){
        $html='
    <style>
        
    </style>
    <h2>'.$title.'</h2>';
    }
    if($page_type == 'A5'){
        $html='
    <style>
        
    </style>
    <h4>'.$title.'</h4>';
    }
    if($page_type == 'A6'){
        $html='
    <style>
        
    </style>
    <h6>'.$title.'</h6>';
    }

    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->SetFont('aealarabiya', '', $font_size);
   $pdf->MultiCell(80 * $ratio, 6 * $ratio, $location.' '. $commercial_record ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $first_name . ' ' . $first_num  ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $first_num ,0, 'R', 0, 0, '', '', true);
    $pdf->SetFont('aealarabiya', '', $font_size);
    $pdf->MultiCell(80 * $ratio, 6 * $ratio, $second_name . ' ' . $second_num ,0, 'R', 0, 0, '', '', true);
    //$pdf->MultiCell(32 * $ratio, 6 * $ratio, $second_num ,0, 'R', 0, 0, '', '', true);
    if($page_type == 'A4'){
        $pdf->SetFont('arial', 'B', 20);
    }
    if($page_type == 'A5'){
        $pdf->SetFont('arial', 'B', 13);
    }
    if($page_type == 'A6'){
        $pdf->SetFont('arial', 'B', 12);
    }
    //$pdf->SetFont('arial', 'B', 18);
    $tilte='كشف حساب';
    $pdf->MultiCell(116 * $ratio, 8 * $ratio, $tilte ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(4*$ratio);
    $pdf->SetFont('arial', '', $font_size);
    $pdf->Ln(2*$ratio);
    $from_date = $_GET['from_date'];
    $to_date = $_GET['to_date'];
    $from='من تاريخ: ' .$from_date;
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $from ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(5*$ratio);
    $to ='إلى تاريخ: '  . $to_date;
    $pdf->MultiCell(180 * $ratio, 6 * $ratio, $to ,0, 'L', 0, 0, '', '', true);
    $pdf->Ln(10*$ratio);
    $account='الحساب: ' .$_GET['account_name'];
    $pdf->MultiCell(80 * $ratio, 9* $ratio, $account ,0, 'R', 0, 0, '', '', true);
    $currency='العملة: ' .'ليرة سورية';
    $pdf->MultiCell(60 * $ratio, 6 * $ratio, $currency ,0, 'R', 0, 0, '', '', true);
    $pdf->Ln(12*$ratio);
    if($page_type == 'A5'){
        $font_table = 6;
    }
    if($page_type == 'A6'){
        $font_table = 5;
    }else{
        $font_table = 10;
    }
    $pdf->SetFont('arial', '',  $font_table);
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
                <th>التاريخ </th>
                <th>المستند </th>
                <th>مدين </th>
                <th> دائن </th>';
                if(get_value_from_config('printing' , 'other_account') == "true")
                    $content.= '<th>الحساب المقابل </th>';
                $content .= '
                <th> البيان </th>
                <th>رصيد الحركة </th>';
                if($report_type_details){
                    if(get_value_from_config('account_statement' , 'item') == "true")
                        $content.=" <th  style='display:none' contenteditable='false'>المادة</th>";
                    if(get_value_from_config('account_statement' , 'total_weight') == "true")
                    $content.="
                        <th  style='display:none' contenteditable='false'> الوزن القائم</th>";
                    if(get_value_from_config('account_statement' , 'real_weight') == "true")
                    $content.= "
                        <th style='display:none' contenteditable='false'> الوزن الصافي</th>";
                    if(get_value_from_config('account_statement' , 'price') == "true")
                    $content.="
                        <th  style='display:none' contenteditable='false'> الإفرادي</th>";
                    if(get_value_from_config('account_statement' , 'total_item_price') == "true")
                    $content.="
                        <th  style='display:none' contenteditable='false'>الإجمالي</th>";
                    
                    if(get_value_from_config('account_statement' , 'com_value') == "true")
                    $content.="
                        <th  style='display:none' contenteditable='false'>الكمسيون</th>";
                }
            $content.="</tr>
            </thead>
            <tbody>";
            $main_account_code = get_code_from_input($_GET['account_name']);
            $select_main_accounta_id_using_code_query = "select id,code from accounts where code = '$main_account_code'";
            $select_main_accounta_id_using_code_exec = mysqli_query($con, $select_main_accounta_id_using_code_query);
            $main_account_id = 0;
            if (mysqli_num_rows($select_main_accounta_id_using_code_exec) > 0)
                $main_account_id = mysqli_fetch_row($select_main_accounta_id_using_code_exec)[0];

            $select_account_statements_query = selectND('account_statements') . andWhere('main_account_id', $main_account_id) . "
            and date between '" . $_GET['from_date'] . "' and '" . $_GET['to_date'] . "'";
            $select_account_statements_exec = mysqli_query($con, $select_account_statements_query);

            $current_currency = 0;
            $total_daen = 0;
            $total_maden = 0;

            if (mysqli_num_rows($select_account_statements_exec) > 0)
                while ($row = mysqli_fetch_array($select_account_statements_exec)) {
                    
                    ///////////////////////////////////////////////////////////////////////////////////////////////////
                    /**
                                         * make links section
                                         */
                                        
                                        $href_link = 'accountStatment.php';
                                        $document_type = '';
                                        if ($row['code_type'] == 'accounts') { // accounts -> رصيد افتتاحي
                                            $account_id = getId($con, 'accounts', 'code', $row['code_number']);
                                            
                                            $document_type = 'رصيد افتتاحي';
                                        }
                                        if ($row['code_type'] == 'bills') { // bills -> السطر تابع لفاتورة
                                            // input output
                                            $bill_row = mysqli_fetch_array(mysqli_query($con, selectND('bills') . andWhere('id', $row['code_number'])));
                                            if (get_value_from_config('account_statement' , 'report_type_details') == 'false') {continue;}
                                            if ($_GET['report_account_type'] == 'input') {
                                                if ($row['main_account_id'] == $bill_row['buyer_id'])
                                                    continue;

                                                if ($row['main_account_id'] == 3 || $row['other_account_id'] == 2)
                                                    continue;
                                            }
                                            if ($_GET['report_account_type'] == 'output') {
                                                if ($row['main_account_id'] == $bill_row['seller_id'])
                                                    continue;
                                                if ($row['main_account_id'] == 2)
                                                    continue;

                                                if ($row['main_account_id'] == 1 && $row['other_account_id'] == 3)
                                                    continue;
                                            }
                                            
                                            $document_type = 'فاتورة رقم ' . $row['code_number'];
                                        }
                                        if ($row['code_type'] == 'mid_bonds') { // mid_bonds السطر تابع لسند قيد

                                            $bill_id = get_value_from_table_using_column($con, 'mid_bonds', 'code', $row['code_number'], 'bill_id');

                                            $bill_row = mysqli_fetch_array(mysqli_query($con, selectND('bills') . andWhere('id', $bill_id)));
                                            if (get_value_from_config('account_statement' , 'report_type_details') == 'false') {continue;}
                                            if ($_GET['report_account_type'] == 'input') {
                                                if ($row['main_account_id'] == $bill_row['buyer_id'])
                                                    continue;

                                                if ($row['main_account_id'] == 3 || $row['other_account_id'] == 2)
                                                    continue;
                                            }
                                            if ($_GET['report_account_type'] == 'output') {
                                                if ($row['main_account_id'] == $bill_row['seller_id'])
                                                    continue;

                                                if ($row['main_account_id'] == 2)
                                                    continue;

                                                if ($row['main_account_id'] == 1 && $row['other_account_id'] == 3)
                                                    continue;
                                            }

                                            $bill_code = get_code_from_table_using_id($con, 'bills', $bill_id);
                                            
                                            $document_type = 'فاتورة رقم ' . $bill_code;
                                        }
                                        if ($row['code_type'] == 'payment_bonds') { // تابع لسند الدفع
                                            $payment_bond_id = getId($con, 'payment_bonds', 'code', $row['code_number']);
                                            $document_type = 'سند دفع رقم ' . $row['code_number'];;
                                        }

                                        if ($row['code_type'] == 'catch_bonds') { // تابع لسند القبض
                                            $catch_bond_id = getId($con, 'catch_bonds', 'code', $row['code_number']);
                                            $document_type = 'سند قبض رقم ' . $row['code_number'];;
                                        }
                                        $current_currency +=  ($row['maden'] - $row['daen']);
                    $total_daen += $row['daen'];
                    $total_maden += $row['maden'];
                    $content.= "<tr>";
                    $content.= "<td>" . $row['date'] . "</td>";
                    $content.= "<td>" . $document_type . "</td>";
                    $content.= "<td>" . $row['maden'] . "</td>";
                    $content.= "<td>" . $row['daen'] . "</td>";
                    $select_other_account_name_query = selectND('accounts', ['id', 'name']) . andWhere('id', $row['other_account_id']);
                    $select_other_account_name_exec = mysqli_query($con, $select_other_account_name_query);
                    // echo "<td>" . $row['code_number'] . "</td>";
                    if(get_value_from_config('printing' , 'other_account') == "true")
                    $content.= "<td>" . mysqli_fetch_row($select_other_account_name_exec)[1] . "</td>";
                    $content.= "<td>" . $row['note'] . "</td>";
                    $content.= "<td>" . "$current_currency" . "</td>";
                    // if($report_type_details)
                    if ($row['code_type'] == 'bills' || $row['code_type'] == 'mid_bonds') {
                        if ($row['code_type'] == 'mid_bonds'){
                            $bill_id = get_value_from_table_using_column($con, 'mid_bonds', 'code', $row['code_number'], 'bill_id');
                            $bill_code = get_code_from_table_using_id($con , 'bills' , $bill_id);
                        }
                        else{
                            $bill_id = getId($con, 'bills', 'code', $row['code_number']);
                            $bill_code = get_code_from_table_using_id($con , 'bills' , $bill_id);
                        }
                        $select_items_using_id_query = "select DISTINCT items.code as item_code,
                            bills.code as bill_code,com_ratio,
                            unit, date, buyer_id,seller_id,
                            name,currency,real_weight,price,total_price,
                            total_item_price,total_weight,
                            com_value,category_id
                             from bill_item, items,bills 
                             where items.id = bill_item.item_id and bill_item.bill_id = '$bill_id' and bills.code = '$bill_code'";
                        $select_items_using_id_exec = mysqli_query($con, $select_items_using_id_query);
                        $number_of_items = mysqli_num_rows($select_items_using_id_exec);

                        $content.= "<td ></td>";
                        $content.= "<td ></td>";
                        $content.= "<td ></td>";
                        $content.= "<td ></td>";
                        $content.= "<td ></td>";
                        $content.= "<td ></td></tr>";
                        while ($item = mysqli_fetch_array($select_items_using_id_exec)) {
                            $current_com_value = ($item['com_ratio'] / 100) * $item['total_item_price'];
                            // $content.= "<tr><td colspan='7' ></td>";
                        if(get_value_from_config('printing' , 'other_account') == "false"){
                            $content.= "<tr><td colspan=\"6\"></td>";
                        }elseif(get_value_from_config('printing' , 'other_account') == "true")    
                        $content.= "<tr><td colspan=\"7\"></td>";
                        if(get_value_from_config('account_statement' , 'item') == "true")
                            $content.= "<td  >" . $item['name'] . "</td>";
                        if(get_value_from_config('account_statement' , 'total_weight') == "true")
                            $content.= "<td  >" . $item['total_weight'] . "</td>";
                        if(get_value_from_config('account_statement' , 'real_weight') == "true")
                            $content.= "<td >" . $item['real_weight'] . "</td>";
                        if(get_value_from_config('account_statement' , 'price') == "true")
                            $content.= "<td  >" . $item['price'] . "</td>";
                        if(get_value_from_config('account_statement' , 'total_item_price') == "true")
                            $content.= "<td  >" . $item['total_item_price'] . "</td>";
                        if(get_value_from_config('account_statement' , 'com_value') == "true")
                            $content.= "<td class='hidden com_value_hidden' >" .  $current_com_value  . "</td>";
                        $content.="</tr>";
                        }
                        
                        
                    } else {
                        
                        $content.= "<td ></td>";
                        $content.= "<td ></td>";
                        $content.= "<td></td>";
                        $content.= "<td ></td>";
                        $content.= "<td ></td>";
                        $content.= "<td class='hidden com_value_hidden' ></td></tr>";
                    }
                    // $content.= "</tr>";
                }
            $content.='  
            </tbody>
        </table>';
     $pdf->writeHTML($content);
     $pdf->SetFont('arial', '', $font_size);
     $fun = convert_number_to_arabic_text($total_maden);
     $maden='مجموع مدين: ' . $total_maden . ' ل .س ' .$fun;
     $pdf->MultiCell(185 * $ratio, 6 * $ratio, $maden ,0, 'R', 0, 0, '', '', true);
     $pdf->Ln(6*$ratio);
     $fun = convert_number_to_arabic_text($total_daen);
     $daen='مجموع دائن: ' . $total_daen . ' ل .س ' .$fun;
     $pdf->MultiCell(185 * $ratio, 6 * $ratio, $daen ,0, 'R', 0, 0, '', '', true);
     $pdf->Ln(6*$ratio);
     $fun = convert_number_to_arabic_text($current_currency);
     $total='الرصيد: ' . $current_currency. ' ل .س ' .$fun;
     $pdf->MultiCell(185 * $ratio, 6 * $ratio, $total ,0, 'R', 0, 0, '', '', true);
    if (ob_get_contents()) ob_end_clean();
    // Close and output PDF document
	$pdf->output('account statment', 'I');
    // END OF FILE
}


?>