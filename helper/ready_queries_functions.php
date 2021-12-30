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
    return mysqli_fetch_row($select_exec)[0];
}



function insert_main_accounts($con)
{
    $insert_main_accounts_query = ' INSERT INTO accounts VALUES("1","1","الصندوق","","","0","","","","","","","2021-12-28 12:14:56","2021-12-28 12:14:56");
                INSERT INTO accounts VALUES("2","2","المشتريات","","","0","","","","","","","2021-12-28 12:14:56","2021-12-28 12:14:56");
                INSERT INTO accounts VALUES("3","3","المبيعات","","","0","","","","","","","2021-12-28 12:15:19","2021-12-28 12:15:19");          
    ';
    $insert_main_accounts_exec = mysqli_multi_query($con , $insert_main_accounts_query);
}
