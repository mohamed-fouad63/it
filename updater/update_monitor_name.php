<?php
session_start();
include '../connection.php';

$query_update_monitor_name = '
UPDATE dvice
INNER JOIN post.dvice_type ON dvice.id = post.dvice_type.id
SET dvice.dvice_name =  post.dvice_type.dvice_name_new
WHERE  dvice.dvice_name = post.dvice_type.dvice_name
AND dvice.id = "monitor"
';
$update_monitor_name = $pdo->prepare($query_update_monitor_name);
$update_monitor_name->execute();

if($update_monitor_name){
header("location:../index.php");
}

?>