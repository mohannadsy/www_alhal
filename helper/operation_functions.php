<?php

/** Generate Auto Code Section */
define("NUMBER_OF_ZEROS" , 5);
function generate_code($prefix , $code){
    $code_trim = substr($code , strlen($prefix."_")-1)+1;
    $code_result = "";
    for($i = NUMBER_OF_ZEROS ; $i > strlen($code_trim) ; $i--){
        $code_result .= "0";
    }
    return $code_result . $code_trim;
}
function get_auto_code($con , $table , $column , $prefix){
    $select_max_id_query = "select max(id) from $table";
    $select_max_id_exec= mysqli_query($con , $select_max_id_query);
    $max_id = mysqli_fetch_row($select_max_id_exec)[0];
    
    $select_code_query = "select $column from $table where id = '$max_id' and $column like '$prefix%'";
    $select_code_exec = mysqli_query($con,$select_code_query);
    $code = mysqli_fetch_row($select_code_exec)[0];
    return generate_code($prefix , $code);
}
################################################################################################








?>