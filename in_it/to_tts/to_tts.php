<?php
session_start();
include '../../connection.php';
$_count_in_tts = $_POST['_count_in_tts'];
$_num_tts = $_POST['_num_tts'];
$_name_tts = $_POST['_name_tts'];
$_sn_tts = $_POST['_sn_tts'];
$_date_tts = $_POST['_date_tts'];
$_auth_repair = $_POST['_auth_repair'];
$sql__in_tts = "UPDATE in_it SET 
auth_repair ='$_auth_repair',
date_auth_repair='$_date_tts',
status = 'in_tts'
WHERE count_in_it ='$_count_in_tts'";
$sql_update_note_dvice = "UPDATE dvice SET 
note ='بقطاع الدعم الفنى بالقاهره'
WHERE num ='$_num_tts'";
if ($conn->query($sql__in_tts) === true && $conn->query($sql_update_note_dvice)  === true ) { ?>
<script>
</script>';
<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}
?>