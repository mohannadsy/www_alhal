<?php
include('include/nav.php');
?>

<?php

include("sql/sql_queries.php");

echo delete("users");

?>

<?php
include('include/footer.php');
?>