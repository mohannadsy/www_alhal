<?php
include('include/nav.php');
?>

<?php

include("sql/sql_queries.php");

$users = [
    "name" => "noor",
    "email" => "noor@gmail"
] ;

$tables = ['users' , 'phones' , 'roles'];
$columns = ['id' , 'name' , 'phone'];

##############################Nour#
////echo select('users');
//echo selectWithTable('items','categories');
////echo insert('users',$users);
////echo update('users',$users);
//echo delete('users');
////echo delete('users') . where ('id'= '2');
////echo selectWhereId('users','1');
//echo(addColumn('users','n','int'));
//echo(search('users','id','1'));

?>

<?php
include('include/footer.php');
?>