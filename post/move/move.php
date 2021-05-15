<?php
session_start();
include '../../connection.php';
$session_username = $_SESSION['user_name'];
$_move_num = $_POST['_move_num'];
$_id1 = $_POST['_id1'];
$_move_name = $_POST['_move_name'];
$_move_sn = $_POST['_move_sn'];
$_move_to = $_POST['_move_to'];
$_move_from = $_POST['_move_from'];
$_move_date = $_POST['_move_date'];
$_move_parcel = $_POST['_move_parcel'];
$_move_like = $_POST['_move_like'];
$_move_note = $_POST['_move_note'];
if(!empty($_move_to)  and !empty( $_move_like) ){
if($_move_like === "عهده"){
$sql_move_custody_spare = "UPDATE dvice SET
office_name='$_move_to',
note_move_to ='',
note = ''
WHERE num ='$_move_num'";
$sql_insert_move_to = "INSERT INTO move_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note,admin_move) VALUES ('$_move_num','$_id1','$_move_name','$_move_sn','$_move_from','$_move_to','$_move_date','$_move_parcel','$_move_like','$_move_note','$session_username') ";
}
if($_move_like === "مؤقت"){
$sql_move_custody_spare = "UPDATE dvice SET
note_move_to ='منقول مؤقتا الى $_move_to',
note = ''
WHERE num ='$_move_num' ";
$sql_insert_move_to = "INSERT INTO move_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note,admin_move) VALUES ('$_move_num','$_id1','$_move_name','$_move_sn','$_move_from','$_move_to','$_move_date','$_move_parcel','$_move_like','$_move_note','$session_username') ";
}
if ($conn->query($sql_move_custody_spare) === true && $conn->query($sql_insert_move_to) === true) {}

$sql_norepait_move = "DELETE n2 FROM move_to n1, move_to n2 WHERE n1.count_move_to < n2.count_move_to AND n1.num = n2.num AND n1.date = n2.date AND n1.office_name_from = n2.office_name_from AND n1.office_name_to = n2.office_name_to AND n1.move_like = n2.move_like";
if ($conn->query($sql_norepait_move)=== true ){}
}
else {
    echo "يجب اختيار اسم مكتب و نوع نقل العهده";
}
?>