<?php                            
session_start();
include '../../connection.php'; 
$post_group=$_POST['post_group'];;
$id_hg = $_POST['id_hg'];
$id_it = $_POST['id_it'];


$update_office_group = "UPDATE all1 SET 


id_hg = '$id_hg',
id_it = '$id_it'




WHERE post_group ='$post_group' ";
if ($conn->query($update_office_group) === TRUE) {echo '<script>alert("تم التحديث");</script>';}

    else { echo '<script>alert("لم يتم التحديث");</script>';}
header("location:office_group.php");
?>
