<?php

/**
 * get dictionary with key[id] and value[name]
 */
function get_main_accounts($con)
{
    $select = select('accounts') . where('account_id', '0') . " and name <> ''";
    $select_exec = mysqli_query($con, $select);
    $result_array = [];
    if ($select_exec)
        foreach (mysqli_fetch_all($select_exec) as $row) {
            $result_array[$row[0]] = $row[2];// $row[0] => id column // $row[2] => name column {in accounts table}
        }
    return $result_array;
}

/**
 * get accounts
 */
function get_accounts($con , $id=''){
    $select = select('accounts') . where('account_id', $id);
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_all($select_exec);
}


function getId($con, $table, $column, $value)
{
    $select = select($table, ['id', $column]) . where($column, $value);
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_row($select_exec)[0];
}
