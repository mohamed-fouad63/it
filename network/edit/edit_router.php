<?php                            
session_start();
include '../../connection.php';

$num = $_POST['num'];
$router_sn = $_POST['router_sn'];
$classification = $_POST['classification'];
$IP = $_POST['IP'];
$connecting = $_POST['connecting'];

$sql_router_edit = "UPDATE dvice SET 
ip ='$IP',
classification ='$classification',
connecting = '$connecting'
WHERE num ='$num' and sn = '$router_sn' ";
if ($conn->query($sql_router_edit) === TRUE)
{
echo '<script>alert("; يتم التحديث");</script>';
}
else
{ 
echo '<script>alert("لم يتم التحديث");</script>';
}
?>