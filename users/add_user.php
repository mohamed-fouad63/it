<?php
session_start();
include '../connection.php';  
$id= $_POST['user_id'];
$first_name = $_POST['first_name'];
$job = $_POST['job'];
$id_card = $_POST['id_card'];

$sql_insert_user = "INSERT INTO `tbl_user`(`id`, `password`, `first_name`, `job`,`id_card`) VALUES 
                                            ('$id','$id','$first_name','$job','$id_card')
";

if ($conn->query($sql_insert_user) === true){
header("location:user_auth.php");
} else {  echo "<script> alert ('لم يتم اضافه المستخدم')</script>"; }

?>