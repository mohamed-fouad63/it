<?php

session_start();
include '../../connection.php';
$_count_in_tts = $_POST['_count_in_tts'];
$_num_tts = $_POST['_num_tts'];
$_name_tts = $_POST['_name_tts'];
$_sn_tts = $_POST['_sn_tts'];
$_date_tts = $_POST['_date_tts'];
$_auth_repair = $_POST['_auth_repair'];

/*
if($postal_export_like === "عهده"){
$sql_export_postal_custody_spare = "UPDATE dvice SET 
note_export_to ='منقول من $postal_export_from ',
office_name='$postal_export_to'
WHERE num ='$postal_export_num'";
$sql_insert_export_to = "INSERT INTO export_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,export_by,export_like,export_note,admin_export) VALUES ('$postal_export_num','postal','$postal_export_name','$postal_export_sn','$postal_export_from','$postal_export_to','$postal_export_date','$postal_export_parcel','$postal_export_like','$postal_export_note','$session_username') ";} 

if($postal_export_like === "مؤقت"){
$sql_export_postal_custody_spare = "UPDATE dvice SET 
note_export_to ='منقول مؤقتا الى $postal_export_to'
WHERE num ='$postal_export_num' ";
$sql_insert_export_to = "INSERT INTO export_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,export_by,export_like,export_note,admin_export) VALUES ('$postal_export_num','postal','$postal_export_name','$postal_export_sn','$postal_export_from','$postal_export_to','$postal_export_date','$postal_export_parcel','$postal_export_like','$postal_export_note','$session_username') ";} */
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