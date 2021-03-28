<?php

$host = 'localhost';
$username = "root";
$password = "";
$db = 'amal_drop_db1';

$connect = mysqli_connect($host, $username, $password, $db);
$connect->query("SET NAMES UTF8");
$connect->query("SET CHARACTER SET UTF8");


?>