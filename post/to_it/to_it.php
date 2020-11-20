<?php
session_start();
include '../../connection.php';
$_num_in_it = $_POST['_num_in_it'];
$_name_in_it = $_POST['_name_in_it'];
$_sn_in_it = $_POST['_sn_in_it'];
$_id = $_POST['_id'];
$_office_in_it = $_POST['_office_in_it'];
$_date_in_it = $_POST['_date_in_it'];
$_parcel_in_it = $_POST['_parcel_in_it'];
$_damage_in_it = $_POST['_damage_in_it'];
$_note_in_it = $_POST['_note_in_it'];
$query_dvice_type = mysqli_query($conn, "select dvice_type from dvice where num = '$_num_in_it' AND id = '$_id' ");
while($row_query_dvice_type = mysqli_fetch_assoc($query_dvice_type)){ $_dvice_type = $row_query_dvice_type["dvice_type"]; }
if(!empty($_parcel_in_it)){
$sql_note_in_it = "UPDATE dvice SET
note ='بقسم الدعم الفنى',
note_move_to = ''
WHERE num ='$_num_in_it' ";
$sql_insert_in_it = "INSERT INTO in_it (num,office_name,id,dvice_type,dvice_name,sn,date_in_it,parcel_in_it,damage,in_it_note,admin_in_it,status) VALUES 
('$_num_in_it','$_office_in_it','$_id','$_dvice_type','$_name_in_it','$_sn_in_it','$_date_in_it','$_parcel_in_it','$_damage_in_it','$_note_in_it','$session_username','in_it')";

if ($conn->query($sql_note_in_it) === true && $conn->query($sql_insert_in_it) === true) {
?>
<?php  } else { echo '<script>alert("لم يتم التحديث");</script>';}
$sql_del_in_it = "DELETE n1 FROM in_it n1, in_it n2 WHERE n1.count_in_it < n2.count_in_it AND n1.num = n2.num AND n1.date_in_it = n2.date_in_it";
if ($conn->query($sql_del_in_it)=== true ){}
}
?>