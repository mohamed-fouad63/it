<?php
session_start();
include '../../connection.php';   
$_move_num = $_POST['_move_num'];
$_move_num_in_it = $_POST['_move_num_in_it'];
$_move_name = $_POST['_move_name'];
$_move_sn = $_POST['_move_sn'];
$_move_to = $_POST['_move_to'];
$_move_from = $_POST['_move_from'];
$_move_date = $_POST['_move_date'];
$_move_parcel = $_POST['_move_parcel'];
$_move_like = $_POST['_move_like'];
$_move_note = $_POST['_move_note'];

if($_move_like === "عهده"){
$sql_move__custody_spare = "UPDATE dvice SET 
office_name='$_move_to',
note = ''
WHERE num ='$_move_num'";
$sql_insert_move_to = "INSERT INTO move_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note,admin_move) VALUES ('$_move_num','','$_move_name','$_move_sn','$_move_from','$_move_to','$_move_date','$_move_parcel','$_move_like','$_move_note','$session_username') ";

$sql_move__in_it = "UPDATE in_it SET
status = 'in_office',
in_it_note = CONCAT(' تم نقلها الى $_move_to $_move_like / ', in_it_note),
parcel_out_it = '$_move_parcel',
data_out_it = '$_move_date'
WHERE count_in_it ='$_move_num_in_it'";
    
}
if($_move_like === "مؤقت"){
$sql_move__custody_spare = "UPDATE dvice SET 
note_move_to ='منقول مؤقتا الى $_move_to',
note = ''
WHERE num ='$_move_num' ";
$sql_insert_move_to = "INSERT INTO move_to (num,id,dvice_name,sn,office_name_from,office_name_to,date,move_by,move_like,move_note,admin_move) VALUES ('$_move_num','','$_move_name','$_move_sn','$_move_from','$_move_to','$_move_date','$_move_parcel','$_move_like','$_move_note','$session_username') ";

    $sql_move__in_it = "UPDATE in_it SET
status = 'in_office',
in_it_note = CONCAT(' تم نقلها الى $_move_to $_move_like / ', in_it_note),
parcel_out_it = '$_move_parcel',
data_out_it = '$_move_date'
WHERE count_in_it ='$_move_num_in_it'";
}

if ($conn->query($sql_move__custody_spare) === true
    &&
    $conn->query($sql_insert_move_to) === true
    &&
    $conn->query($sql_move__in_it)=== true) { ?>

<?php } else { echo '<script>alert("لم يتم التحديث");</script>';}

$sql_norepait__move = "DELETE n2 FROM move_to n1, move_to n2 WHERE n1.count_move_to < n2.count_move_to AND n1.num = n2.num AND n1.date = n2.date AND n1.office_name_from = n2.office_name_from AND n1.office_name_to = n2.office_name_to AND n1.move_like = n2.move_like";

if ($conn->query($sql_norepait__move)=== true ){}

?>