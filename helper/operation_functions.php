<?php
/** Generate Auto Code Section */
define("NUMBER_OF_ZEROS" , get_value_from_config('number_of_zeros_code'));
function generate_code($prefix , $code){
    $code_trim = substr($code , strlen($prefix."_")-1)+1;
    $code_result = "";
    for($i = NUMBER_OF_ZEROS ; $i > strlen($code_trim) ; $i--){
        $code_result .= "0";
    }
    return $prefix .$code_result . $code_trim;
}
function get_auto_code($con , $table , $column , $prefix){
    $select_max_id_query = "select max(id) from $table";
    $select_max_id_exec= mysqli_query($con , $select_max_id_query);
    $max_id = mysqli_fetch_row($select_max_id_exec)[0];
    
    $select_code_query = "select $column from $table where id = '$max_id' and $column like '$prefix%'";
    $select_code_exec = mysqli_query($con,$select_code_query);
    @$code = mysqli_fetch_row($select_code_exec)[0];
    if($code == null)
        return $prefix . "00000";
    return generate_code($prefix , $code);
}
################################################################################################
/**
 * Dictionary
 */
function get_array_from_array($dictionary,$array){
    $result_array=[];
    foreach ($array as $key){
        foreach ($dictionary as $_key=>$value){
            if($key==$_key)
                $result_array[$_key] = $value;
        }
    }
return $result_array;
}



###############################################################################################
function is_empty($text){
    return strlen(trim($text)) == 0 ? true : false;
}
function is_not_empty($text){
    return !is_empty($text);
}
