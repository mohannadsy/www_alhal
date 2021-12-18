<?php

include("sql_functions.php");
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


// select id,name from users,phones
// select id,name from users
// select * from users
// select id from users
function select($table , $columns =' * ')
{
    $col = $columns;
    if(is_array($columns))
    {
        $col = getStrFromList($columns);
    }
    $sql="select $col  from ";
    if(!is_array($table))
          return $sql . $table;
     else
         $sql = $sql . getStrFromList($table);
     return $sql;
}


function selectWithTable($table1,$table2)
{
  return "select * from  $table1  ,  $table2  where  $table2 .id = $table1 " . "." . getSingleName($table2) ."_id ";
}

// insert into users ( name, phone) values ( 'ahmad', '123')
?>
<style>
  body{
    direction : ltr
  }
</style>
<?php
function insert($table , $array)
{
    $sql = "insert into  $table  (" ;
    foreach ($array as $key => $value)
    {
        $sql = $sql . $key  . " ,";
    }
    $sql =rtrim($sql,",") . ") values (";
    foreach ($array as $key => $value)
    {
        $sql = $sql . " '$value' ,";
    }
    $sql =rtrim( $sql ,",") . ")";
    return $sql;
}

//update users set  name = 'ahmad' , phone = '123'
function update($table ,$array)
{
    $sql="update $table set ";
    foreach($array as $key => $value)
    {
        $sql = $sql . " " . $key . " ='" . $value . "' ,";
    }
    $sql = rtrim( $sql , ','). " ";
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
  return " where $column " . " " .$op . " '$value'";
} 
function whereLarger($column,$value)
{
  return where($column,$value,">");
} 
function whereSmaller($column,$value)
{
  return where($column,$value,"<");
} 
function whereNotEqual( $column , $value)
{
  return where( $column , $value , "<>");
}

function andWhere( $column, $value, $op = "=")
{
  return " and ". where( $column , $value , $op);
}
function andWhereLarger( $column , $value)
{
  return " and ". where($column , $value , ">");
}
function andWhereSmaller( $column, $value)
{
  return " and ". where( $column , $value , "<");
}

function orWhere( $column , $value,$op="=")
{
  return " or" . where( $column , $value , $op);
}
function orWhereLarger( $column , $value)
{
  return "or ". where( $column , $value ,">");
}
function orWhereSmaller( $column , $value)
{
  return "or ". where( $column , $value,"<");
}
function whereBetween( $column , $first_value , $second_value)
{
  return " where  $column  between '" . $first_value . "' and '$second_value' " ;
}

function whereLike( $column , $value)
{
  return   " where  $column   like'%$value%' ";
}
function whereRlike( $column , $value)
{
  return " where $column  like'%$value' ";
}
function whereLlike( $column , $value)
{
  return " where  $column like '$value%' ";
}

##############################
# other Ready CRUD functions
function selectWhereId( $table , $id)
{
    return select( $table) . where("id", $id);

}
function updateWhereId( $table, $id, $array)
{
    return update( $table , $array) .where("id", $id);
}
function deleteWhereId( $table , $id)
{
    return delete( $table) . where("id", $id);
}
function selectDistinct( $table, $column)
{
    return "select DISTINCT  $column  from  $table";
}
##############################

function orderBy( $column = "id")
{
    $sql = " order by ";
    if(is_array( $column ))
    {
        $sql = $sql . getStrFromList( $column);
    }
    else
        $sql = $sql . $column;
    return $sql;
}

function resetAutoIncrement( $table)
{
    return "ALTER TABLE". $table." AUTO_INCREMENT = 1 ";
}

# Columns ###
function addColumn( $table , $column, $type)
{
    return "alter table  $table  add $column  $type ";
}
function addColumnTimestamp( $table , $column)
{
    return addColumn( $table , $column , "timestamp");
}
function addColumnVarchar( $table , $column)
{
    return addColumn( $table , $column , "varchar(250)");
}
function addColumnInt( $table , $column)
{
    return addColumn( $table , $column , "int(10)");
}
function dropColumn( $table , $column)
{
    return "alter table $table  drop  $column ";
}
function updateColum( $table , $column , $new_type)
{
    return "Alter Table $table  Modify column $column  $new_type " ;
}

################################################################################
########################## Helper CODE SECTION ###################################
################################################################################

function search( $table, $columns , $search_word)
{
    return "select * from $table " . whereLike( $columns , $search_word)  ;
}






?>