<?php
session_start();
include '../../connection.php'; 
$_export_count_in_it = $_POST['_export_count_in_it'];
$_export_num = $_POST['_export_num'];
$_export_name = $_POST['_export_name'];
$_export_sn = $_POST['_export_sn'];
$_export_date = $_POST['_export_date'];
$_export_parcel = $_POST['_export_parcel'];
$sql_export_in_it = "UPDATE in_it SET 
parcel_out_it ='$_export_parcel',
data_out_it='$_export_date',
status = 'in_office',
admin_out_it='$session_username'
WHERE count_in_it ='$_export_count_in_it'";

$sql_update_note_dvice = "UPDATE dvice SET 
note =''
WHERE num ='$_export_num'";
if ($conn->query($sql_export_in_it) === true && $conn->query($sql_update_note_dvice) ) { ?>
<script>
</script>';
<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}
?>