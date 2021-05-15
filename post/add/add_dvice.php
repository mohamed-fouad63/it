<?php
session_start();
include '../../connection.php';
$office_name_dvice = $_POST['office_name_dvice'];
$dvice_name = $_POST['dvice_name'];
$dvice_id = $_POST['dvice_id'];
$sn = $_POST['sn'];
$dvice_type = $_POST['dvice_type'];
$code_inventory = $_POST['code_inventory'];
if(!empty($dvice_name) &  !empty($dvice_id) )
{
$sql_insert_dvice = "INSERT INTO `dvice`(`num`, `id`, `office_name`, `dvice_name`, `sn`, `dvice_type`,`code_inventory`) VALUES 
('','$dvice_id','$office_name_dvice','$dvice_name','$sn','$dvice_type','$code_inventory')";
$conn->query($sql_insert_dvice);
   echo '
   <div class="toast-body btn-success">
    <strong> تم اضافه الجهاز</strong>
    </div>
   ';
} 
 else {
     echo '
    <div class="toast-body btn-warning">
        <strong>لم يتم اضافه الجهاز</strong>
    </div>
   '; }

?>