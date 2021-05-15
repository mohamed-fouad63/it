<?php
session_start();
include '../../connection.php';  
$_export_count_in_it = $_POST['_export_count_in_it'];
$_export_num = $_POST['_export_num'];
$_export_name = $_POST['_export_name'];
$_export_sn = $_POST['_export_sn'];
$_from_tts_date = $_POST['_export_date'];

$sql_export_in_it = "UPDATE in_it SET 
status = 'in_it',
date_from_auth_repair='$_from_tts_date'
WHERE count_in_it ='$_export_count_in_it'";

$sql_update_note_dvice = "UPDATE dvice SET 
note ='بقسم الدعم الفنى'
WHERE num ='$_export_num'";
if ($conn->query($sql_export_in_it) === true && $conn->query($sql_update_note_dvice) ) { ?>
<script>
</script>';
<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}
?>