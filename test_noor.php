<?php
include('include/nav.php');
?>

<?php

include("sql/sql_queries.php");

$users = [
    "name" => "noor",
    "email" => "noor@gmail"
] ;

    echo selectWithTable("users","items");

?>

<?php
include('include/footer.php');
?>