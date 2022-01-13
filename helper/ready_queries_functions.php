<?php

/**
 * get dictionary with key[id] and value[name]
 */
function get_main_accounts($con)
{
    $select = select('accounts') . where('account_id', '0') . " and name <> '' and id <> '1' and id <> '2' and id <> '3'";
    $select_exec = mysqli_query($con, $select);
    $result_array = [];
    if ($select_exec)
        foreach (mysqli_fetch_all($select_exec) as $row) {
            $result_array[$row[0]] = $row[2]; // $row[0] => id column // $row[2] => name column {in accounts table}
        }
    return $result_array;
}

/**
 * get accounts
 */
function get_accounts($con, $id = '')
{
    $select = select('accounts') . where('account_id', $id);
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_all($select_exec);
}


function getId($con, $table, $column, $value)
{
    $select = select($table, ['id', $column]) . where($column, $value);
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_array($select_exec)['id'];
}
function getIds($con, $table, $column, $value)
{
    $select = select($table, ['id', $column]) . where($column, $value);
    $select_exec = mysqli_query($con, $select);
    $ids = [];
    while($id = mysqli_fetch_array($select_exec)['id'])
        array_push($ids , $id);
    return $ids;
}

function get_value_from_table_using_column($con , $table , $column , $value , $column_return){
    $select = select($table).where($column,$value);
    $select_exec = mysqli_query($con , $select);
    return mysqli_fetch_array($select_exec)[$column_return];
}

function get_value_from_table_using_id($con , $table , $column , $id){
    $select = selectWhereId($table , $id );
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_array($select_exec)[$column];
}

function get_name_from_table_using_id($con , $table , $id){
    return get_value_from_table_using_id($con , $table , 'name' , $id);
}
function get_code_from_table_using_id($con , $table , $id){
    return get_value_from_table_using_id($con , $table , 'code' , $id);
}
function get_name_and_code_from_table_using_id($con , $table , $id){
    $result = get_code_from_table_using_id($con , $table, $id) . 
    ' - ' . get_name_from_table_using_id($con , $table , $id);
    return ($result == ' - ' )?'' : $result;
}


function insert_main_accounts($con)
{
    $insert_main_accounts_query = ' 
            INSERT INTO accounts VALUES("1","1","الصندوق","","","","","0","","","","","","2022-01-04 18:54:08","2022-01-04 18:54:08");
            INSERT INTO accounts VALUES("2","2","المشتريات","","","","","0","","","","","","2022-01-04 18:54:08","2022-01-04 18:54:08");
            INSERT INTO accounts VALUES("3","3","المبيعات","","","","","0","","","","","","2022-01-04 18:54:27","2022-01-04 18:54:27");    
    ';
    $insert_main_accounts_exec = mysqli_multi_query($con , $insert_main_accounts_query);
}


function get_box_account($con){
    $select_box_account_query = select('accounts').where('id' , '1');
    $select_box_account_exec = mysqli_query($con , $select_box_account_query);
    $account = mysqli_fetch_array($select_box_account_exec);
    return $account['code'] . ' - ' . $account['name'];
}

function get_all_accounts($con){
    $select_box_accounts_query = select('accounts');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [];
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}

function get_all_accounts_without_buying_selling($con){
    $select_box_accounts_query = select('accounts').whereNotEqual('id' , '2').andWhereNotEqual('id' , '3');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [];
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}

function get_all_accounts_without_buying_selling_main_accounts($con){
    $select_box_accounts_query = select('accounts').whereNotEqual('account_id' , '0');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [['name' => 'الصندوق' , 'code' => '1']];
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}