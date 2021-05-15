<?php
session_start();
include '../connection.php';  
$id= $_POST['user_id'];
$first_name = $_POST['first_name'];
$job = $_POST['job'];
if(!empty($job)){

$sql_insert_user = "INSERT INTO `tbl_user`(`id`, `password`, `first_name`, `job`) VALUES 
                                            ('$id','$id','$first_name','$job')
";

if ($conn->query($sql_insert_user) === true){
header("location:user_auth.php");
} else 
{

}
}
else {
    echo "<script> alert ('لم يتم اضافه المستخدم')</script>";
    header("location:user_auth.php");
}
?>