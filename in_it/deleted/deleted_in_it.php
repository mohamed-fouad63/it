<?php

session_start();
include '../../connection.php';   
$_deleted_count_in_it = $_POST['_deleted_count_in_it'];
$_deleted_num = $_POST['_deleted_num'];
$_deleted_name = $_POST['_deleted_name'];
$_deleted_sn = $_POST['_deleted_sn'];
$_deleted_date = $_POST['_deleted_date'];
$_deleted_parcel = $_POST['_deleted_parcel'];

$sql_deleted_in_it = "UPDATE in_it SET 
deleted_parcel ='$_deleted_parcel',
data_deleted	='$_deleted_date',
status = 'deleted',
admin_out_it='$session_username'
WHERE count_in_it ='$_deleted_count_in_it'";
$sql_update_note_dvice = "DELETE FROM `dvice`
WHERE num ='$_deleted_num'";
if ($conn->query($sql_deleted_in_it) === true && $conn->query($sql_update_note_dvice) === true ) { ?>
<script>
</script>';
<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}
?>