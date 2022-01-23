<?php

/**
 * get dictionary with key[id] and value[name]
 */
function get_main_accounts($con)
{
    $select = selectND('accounts') . andWhere('account_id', '0') . " and name <> '' and id <> '1' and id <> '2' and id <> '3'";
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
    $select = selectND('accounts') . andWhere('account_id', $id);
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_all($select_exec);
}


function getId($con, $table, $column, $value)
{
    $select = selectND($table, ['id', $column]) . andWhere($column, $value);
    $select_exec = mysqli_query($con, $select);
    return mysqli_fetch_array($select_exec)['id'];
}
function getIds($con, $table, $column, $value)
{
    $select = selectND($table, ['id', $column]) . andWhere($column, $value);
    $select_exec = mysqli_query($con, $select);
    $ids = [];
    while($id = mysqli_fetch_array($select_exec)['id'])
        array_push($ids , $id);
    return $ids;
}

function get_current_daen_using_id($con , $id){
    $select_daen_query = selectND('account_statements').andWhere('main_account_id' , $id);
    $select_daen_exec = mysqli_query($con , $select_daen_query);
    $total_daen = '0';
    while($row = mysqli_fetch_array($select_daen_exec)){
        $total_daen += $row['daen'];
    }
    return $total_daen;
}

function get_current_maden_using_id($con , $id){
    $select_maden_query = selectND('account_statements').andWhere('main_account_id' , $id);
    $select_maden_exec = mysqli_query($con , $select_maden_query);
    $total_maden = '0';
    while($row = mysqli_fetch_array($select_maden_exec)){
        $total_maden += $row['maden'];
    }
    return $total_maden;
}

function get_current_daen_using_code($con , $code){
    $id = getId($con , 'accounts' , 'code' , $code);
    return get_current_daen_using_id($con , $id);
}

function get_current_maden_using_code($con , $code){
    $id = getId($con , 'accounts' , 'code' , $code);
    return get_current_maden_using_id($con , $id);
}

function get_main_account_id_parent($con , $code){
    $select_account_id_query = selectND('accounts').andWhere('code' , $code);
    $select_account_id_exec = mysqli_query($con , $select_account_id_query);
    return mysqli_fetch_array($select_account_id_exec)['account_id'];
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
    $insert_main_accounts_query ="
    INSERT INTO `accounts` (`id`, `code`, `name`, `maden`, `daen`, `phone`, `email`, `account_id`, `city`, `state`, `location`, `note`, `is_deleted`, `type`, `created_at`, `updated_at`) VALUES (NULL, '1', 'الصندوق', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', '', current_timestamp(), current_timestamp()); 
    INSERT INTO `accounts` (`id`, `code`, `name`, `maden`, `daen`, `phone`, `email`, `account_id`, `city`, `state`, `location`, `note`, `is_deleted`, `type`, `created_at`, `updated_at`) VALUES (NULL, '2', 'المشتريات', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', '', current_timestamp(), current_timestamp()); 
    INSERT INTO `accounts` (`id`, `code`, `name`, `maden`, `daen`, `phone`, `email`, `account_id`, `city`, `state`, `location`, `note`, `is_deleted`, `type`, `created_at`, `updated_at`) VALUES (NULL, '3', 'المبيعات', NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '0', '', current_timestamp(), current_timestamp()); 
    ";
    $insert_main_accounts_exec = mysqli_multi_query($con , $insert_main_accounts_query);
}


function get_box_account($con){
    $select_box_account_query = select('accounts').where('id' , '1');
    $select_box_account_exec = mysqli_query($con , $select_box_account_query);
    $account = mysqli_fetch_array($select_box_account_exec);
    return $account['code'] . ' - ' . $account['name'];
}

function get_all_accounts($con){
    $select_box_accounts_query = selectND('accounts');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [];
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}

function get_all_accounts_without_buying_selling($con){
    $select_box_accounts_query = selectND('accounts').andWhereNotEqual('id' , '2').andWhereNotEqual('id' , '3');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [];
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}

function get_all_accounts_without_buying_selling_main_accounts($con){
    $select_box_accounts_query = selectND('accounts').andWhereNotEqual('account_id' , '0');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [['name' => 'الصندوق' , 'code' => '1']];
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}
function get_all_accounts_without_main_accounts($con){
    $select_box_accounts_query = selectND('accounts').andWhereNotEqual('account_id' , '0');
    $select_box_accounts_exec = mysqli_query($con , $select_box_accounts_query);
    $accounts = [];
    array_push($accounts , ['name' => 'الصندوق' , 'code' => '1']);
    array_push($accounts , ['name' => 'المشتريات' , 'code' => '2']);
    array_push($accounts , ['name' => 'المبيعات' , 'code' => '3']);
    while($account = mysqli_fetch_array($select_box_accounts_exec))
        array_push($accounts , $account);
    return $accounts;
}