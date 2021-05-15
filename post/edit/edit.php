<?php                            
session_start();
include '../../connection.php';

$_num = $_POST['_num'];
$_sn = $_POST['_sn'];
$_ip = $_POST['_ip'];
$_domain_name = $_POST['_domian_name'];

$sql_pc_edit = "UPDATE dvice SET 
sn = '$_sn',
ip ='$_ip',
pc_doman_name ='$_domain_name'
WHERE num ='$_num' ";
if ($conn->query($sql_pc_edit) === TRUE)
{
echo '<script>alert("; يتم التحديث");</script>';
}
else
{ 
echo '<script>alert("لم يتم التحديث");</script>';
}
?>