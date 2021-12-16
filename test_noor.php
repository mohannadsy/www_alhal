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


//echo selectWhereId('users' , '1');
// echo selectWithTable('roles','users');
 echo select('users,phones' , 'id,name');
 echo select('users' , 'id,name');
 echo select('users');
 echo select('users' , 'id');
// echo insert('users',$users);
// echo update('users',$users);
// echo delete('users');
// echo delete('users')+ where('id','2');
// echo addColumn('users','n','int');
// echo search('users','id','1');
// echo selectWithTable("users","items");

?>

<?php
include('include/footer.php');
?>