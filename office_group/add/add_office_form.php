<?php
session_start();
include '../../connection.php';  
$office_name = $_POST['office_name'];
$post_group = $_POST['post_group'];
$money_code = $_POST['money_code'];
$post_code = $_POST['post_code'];
$postal_code = $_POST['postal_code'];
$g_postal = $_POST['g_postal'];
$domain_name = $_POST['domain_name'];
$stamps = $_POST['stamps'];
$id_hg = $_POST['id_hg'];
$id_it = $_POST['id_it'];
$sat = $_POST['sat'];
$address = $_POST['address'];
$g3 = $_POST['3G'];
$LL = $_POST['LL'];
$tel = $_POST['tel'];
$office_type = $_POST['office_type'];
$sql_insert_office = "INSERT INTO all1
(id_it,id_hg,office_name,post_group,office_type,money_code,post_code,postal_code,g_postal,tel,sat,address,3G,LL,Stamps,domain_name) VALUES ('$id_it','$id_hg','$office_name','$post_group','$office_type','$money_code','$post_code','$postal_code','$g_postal','$tel','$sat','$address','$g3','$LL','$stamps','$domain_name')";

if ($conn->query($sql_insert_office) === true){
    
} else {  echo "<script> alert ('لم يتم اضافه المكتب او القسم')</script>"; }

$sql_del_insert_office = "DELETE n1 FROM all1 n1, all1 n2 WHERE n1.id > n2.id AND n1.office_name = n2.office_name";
if ($conn->query($sql_del_insert_office)=== true ){echo '<script>alert(" المكتب \ القسم موجود مسبقا ");</script>';}
header("location:add_office.php");
?>