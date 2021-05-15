<?php

session_start();
include '../../connection.php'; 

$_export_num = $_POST['_export_num'];
$_export_name = $_POST['_export_name'];
$_export_sn = $_POST['_export_sn'];
$_export_date = $_POST['_export_date'];
$_export_parcel = $_POST['_export_parcel'];
$_export_post_office = $_POST['_post_office'];
$_export_from_post_office = $_POST['_from_post_office'];
$Char = mb_substr($_export_from_post_office,16,60,'utf-8');
$sql_resend_ = "UPDATE dvice SET
note_move_to =''
WHERE num ='$_export_num'
";
$sql_insert_move_to = "INSERT INTO move_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note,admin_move) VALUES 
('$_export_num','','$_export_name','$_export_sn','$Char','$_export_post_office','$_export_date','$_export_parcel','معاد للمكتب الاصلى','','$session_username') ";

if ($conn->query($sql_resend_) === true && $conn->query($sql_insert_move_to) ) { ?>
<script>
    alert(" يتم الجهاز");
</script>';
<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}
?>