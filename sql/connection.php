<?php

$host = json_decode(file_get_contents('config.json') , true)['host'];
$user = json_decode(file_get_contents('config.json') , true)['user'];
$pass = json_decode(file_get_contents('config.json') , true)['pass'];
$database = json_decode(file_get_contents('config.json') , true)['database'];

$con = mysqli_connect($host,$user,$pass,$database) or die('Connection Failed');

?>