<?php
$host = "172.19.0.3";
$username = "root";
$password = "root";
$dbname = "chip_coffee";
$dsn = 'mysql:host='. $host. ';dbname=' .$dbname;
$pdo = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //Dont forget to change collation to utf8_general_ci to db
$pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
?>