<?php
session_start();
include '../../setup/session/no_session.php';
include '../../connection.php';
$del_num = $_POST['del_num'];
$sql_del_to = "
DELETE FROM `inbox` WHERE id ='$del_num'
";
if ($conn->query($sql_del_to) === TRUE){
    header("Refresh:0; url=../../reg/in/in_edit.php");
} else {
    
}
?>