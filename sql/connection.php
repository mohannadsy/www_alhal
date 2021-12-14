<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$database = json_decode(file_get_contents('config.json') , true)['database'];

$con = mysqli_connect($host,$user,$pass,$database) or die('Connection Failed');

?>