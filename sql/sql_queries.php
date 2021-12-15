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


function selectWithTable($table1,$table2)
{
 return "select * from " + $table1 +" , " + $table2 + " where " + $table2 + ".id = " + $table1+ " . " +func.getSingleName($table2) + "_id";
}

// insert into users ( name, phone) values ( 'ahmad', '123')
function insert($table , $array)
{
    $sql = "insert into  $table  (" ;
    foreach ($array as $key => $value)
    {
        $sql = $sql . $key  . " , ";
    }
    $sql =substr($sql,0,-1) . ") values (";
    foreach ($array as $key => $value)
    {
        $sql = $sql . " '$value' , ";
    }
    $sql =substr($sql,0,-1) . ")";
    return $sql;
}

//update users set  name = 'ahmad' , phone = '123'
function _update($table ,$array)
{
    $sql="update $table set ";
    foreach($array as $key => $value)
    {
        $sql = $sql + " " +$key +" ='" + $value + "' ,";
    }
    $sql = sql.rstrip(',')+ " ";
    return $sql;
}

//delete from users
function delete($table)
{
    return "delete from $table ";
}

########################
#### Where Section ####

function where($column,$value,$op="=")
{
    return "where $column " . " " .$op . " ' $value '";
} 
function whereLarger($column,$value)
{
    return where($column,$value,">");
} 
function whereSmaller($column,$value)
{
    return where($column,$value,"<");
} 
function whereNotEqual($column, $value)
{
    return where($column ,$value , "<>");
}
function andWhere($column,$value,$op="=")
{
    return " and ".where($column , $value , $op);
}
function andWhereLarger($column,$value)
{
    return " and ".where($column , $value , ">");
}
function andWhereSmaller($column,$value)
{
    return " and ".where($column , $value , "<");
}
function orWhere($column,$value,$op="=")
{
    return " or" . where($column , $value , $op);
}
function orWhereLarger($column,$value)
{
    return "or ".where($column,$value,">");
}
function orWhereSmaller($column,$value)
{
    return "or ".where($column,$value,"<");
}
function whereBetween($column , $first_value , $second_value)
{
        return " where  $column  between '" . $first_value . "' and '$second_value' " ;

}






##############################











?>