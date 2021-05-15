<?php
session_start();
include '../../connection.php';
$id = $_POST['dvice_id'];
$office_name = $_POST['pc_replace_office_name'];
$replace_type = $_POST['pc_replace_type'];
$dvice_name = $_POST['pc_replace_name'];
$sn = $_POST['pc_replace_sn'];
$_date = $_POST['pc_replace_date'];





$sql_insert_replace_pices_dvice = "INSERT INTO `replace_pices_dvice`
(`id`, `office_name`, `replace_type`, `dvice_name`, `sn`, `date`) VALUES ('$id','$office_name','$replace_type','$dvice_name','$sn','$_date') ";

if ($conn->query($sql_insert_replace_pices_dvice) === true ) { ?>
<script>
</script>';
<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}
?>