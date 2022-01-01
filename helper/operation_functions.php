<?php

/** Generate Auto Code Section */
define("NUMBER_OF_ZEROS_CHILD", get_value_from_config('number_of_zeros_code_child'));
define("NUMBER_OF_ZEROS_PARENT", get_value_from_config('number_of_zeros_code_parent'));
function generate_code($prefix, $code, $type)
{
    $code_trim = substr($code, strlen($prefix . "-") - 1) + 1;
    $code_result = "";
    if ($type == "child")
        for ($i = NUMBER_OF_ZEROS_CHILD; $i > strlen($code_trim); $i--) {
            $code_result .= "0";
        }
    if ($type == "parent")
        for ($i = NUMBER_OF_ZEROS_PARENT; $i > strlen($code_trim); $i--) {
            $code_result .= "0";
        }
    return $prefix . $code_result . $code_trim;
}
function get_auto_code($con, $table, $column, $prefix, $type = "child", $parent_col_name = '', $parent_id = '')
{
    if ($parent_id != '')
        $select_max_id_query = "select max(id),$parent_col_name from $table where $parent_col_name = '$parent_id'";
    // if ($parent_id == '' && $parent_col_name != '')
    //     $select_max_id_query = "select max(id),$parent_col_name from $table where $parent_col_name = '$parent_id'";

    else
        $select_max_id_query = "select max(id) from $table";
    $select_max_id_exec = mysqli_query($con, $select_max_id_query);
    $max_id = mysqli_fetch_row($select_max_id_exec)[0];

    $select_code_query = "select $column from $table where id = '$max_id' and $column like '$prefix%'";
    $select_code_exec = mysqli_query($con, $select_code_query);
    @$code = mysqli_fetch_row($select_code_exec)[0];
    if ($code == null)
        if ($type == "child") {
            $zeros = '';
            for ($i = 1; $i < NUMBER_OF_ZEROS_CHILD; $i++)
                $zeros .= "0";
            return $prefix . $zeros . "1";
        } else {
            $zeros = '';
            for ($i = 1; $i < NUMBER_OF_ZEROS_PARENT; $i++)
                $zeros .= "0";
            return $prefix . $zeros . "1";
        }
    return generate_code($prefix, $code, $type);
}
function get_code_from_input($input)
{
    return substr($input, 0, strpos($input, '-') - 1);
}

################################################################################################
/**
 * Dictionary
 */
function get_array_from_array($dictionary, $array)
{
    $result_array = [];
    foreach ($array as $key) {
        foreach ($dictionary as $_key => $value) {
            if ($key == $_key)
                $result_array[$_key] = $value;
        }
    }
    return $result_array;
}



###############################################################################################
function is_empty($text)
{
    return strlen(trim($text)) == 0 ? true : false;
}
function is_not_empty($text)
{
    return !is_empty($text);
}
