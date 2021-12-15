<?php

//import functions as func
// include("sql_functions.php");
################################################################################
########################## Contents SECTION ###################################
################################################################################
#
# select
# insert
# update
# delete
# 
# where, andWhere, orWhere
# whereNotEqual
# whereLarger, whereSmaller, 
# andWhereLarger, andWhereSmaller
# orWhereLarger, orWhereSmaller
# whereBetween,
# whereLike , whereRlike, whereLlike
#
# selectWhereId, updateWhereId, deleteWhereId
#
#
# 
#
# orderBy
# resetAutoIncrement
# addColumn, dropColumn , updateColumn
#
##########################################
# search 
#
###############################################################################




#### CRUD Section ###

function select($table , $columns =' * ')
{
    $col = $columns;
    if(is_array($columns,$list))
    {
        $col =func.getStrFromList($columns);
    }
    $sql="select"+ $col + " from ";
    if(is_array($table,$str))
            return $sql + $table;
     else
            $sql = $sql + func.getStrFromList($table);
     return $sql;
}


function _selectWithTable($table1,$table2)
{
 return "select * from " + $table1 +" , " + $table2 + " where " + $table2 + ".id = " + $table1+ " . " +func.getSingleName($table2) + "_id";
}

// insert into users ( name, phone) values ( 'ahmad', '123')
function _insert($table , $array)
{
    $sql = "insert into " + $table + " (";
    foreach ($array as $key => $value)
    {
        $sql = $sql + " " + $key +" , ";
    }
    $sql =$sql.rstrip(',')+ ") values (";
    foreach ($array as $key => $value)
    {
        $sql = $sql + " '" + $value +"' , ";
    }
    $sql =$sql.rstrip(',')+")";
    return $sql;
}

//update users set  name = 'ahmad' , phone = '123'
function _update($table ,$array)
{
    $sql="update "+ $table +"set ";
    forach($array as $key => $value)
    {
        $sql = $sql + " " +$key +" ='" + $value + "' ,";
    }
    $sql = sql.rstrip(',')+ " ";
    return $sql;
}
//delete from users
function _delete($table)
{
    return "delete from "+$table+" ";
}

########################

#### Where Section ####
def where(column, value, op = "="):
    return " where " + column + " " + op + " '" + value + "'"
def whereLarger(column, value):
    return where(column , value , '>')
def whereSmaller(column, value):
    return where(column , value , '>')
def whereNotEqual(column, value):
    return where(column , value , '<>')












?>