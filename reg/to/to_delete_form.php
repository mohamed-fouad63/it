<?php
session_start();
include '../../setup/session/no_session.php';
include '../../connection.php';
$del_num = $_POST['del_num'];
$sql_del_to = "
DELETE FROM `send` WHERE id ='$del_num'
";
if ($conn->query($sql_del_to) === TRUE){
    header("Refresh:0; url=../../reg/to/to_edit.php");
} else {
    
}
?>