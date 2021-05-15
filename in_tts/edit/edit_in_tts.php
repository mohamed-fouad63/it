<?php
session_start();
include '../../connection.php';  
$_date_auth_repair = $_POST['_date_auth_repair'];
$_auth_repair = $_POST['_auth_repair'];
$_num = $_POST['_num'];
$sql_edit_in_tts = "UPDATE in_it SET 
date_auth_repair = '$_date_auth_repair',
auth_repair = '$_auth_repair'
WHERE count_in_it ='$_num' ";
if ($conn->query($sql_edit_in_tts) === TRUE) {}
    else { echo '<script>alert("لم يتم التحديث");</script>';}