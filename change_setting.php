<?php

if(isset($_POST['account_statement_setting_array']['item_post'])){
    
$myFile = "config.json";
$get_json = json_decode(file_get_contents($myFile) ,true);
$arr_input_values = $_POST['account_statement_setting_array'];
$get_json['account_statement']['report_type_details'] = $arr_input_values['report_type_details_post'];
$get_json['account_statement']['item'] = $arr_input_values['item_post'];
$get_json['account_statement']['total_weight'] = $arr_input_values['total_weight_post'];
$get_json['account_statement']['real_weight'] = $arr_input_values['real_weight_post'];
$get_json['account_statement']['total_item_price'] = $arr_input_values['total_item_price_post'];
$get_json['account_statement']['com_value'] = $arr_input_values['com_value_post'];
$get_json['account_statement']['price'] = $arr_input_values['price_post'];
$get_json['account_statement']['other_account'] = $arr_input_values['other_account_post'];
$get_json['account_statement']['current_currency'] = $arr_input_values['current_currency_post'];
$get_json['account_statement']['note'] = $arr_input_values['note_post'];
// $get_json[''][]= $_POST[''];
//  $stringData = $_POST['item'];
file_put_contents($myFile , json_encode($get_json));

}
