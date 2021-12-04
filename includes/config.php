<?php

$host = 'localhost';
$db = 'post';
$user = 'root';
$pass = '12345678';
$charset = 'UTF8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$db = new PDO($dsn, $user, $pass);
//set come db attributes
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>