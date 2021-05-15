<?php
session_start();
//include '../../connection.php';
include '../../connection.php';
$router_sn = $_POST['router_sn'];
$router_name = $_POST['router_name'];
$office_name = $_POST['office_name'];
$replace_date = $_POST['replace_date'];

$from_ip = $_POST['from_ip'];
$from_sim_num = $_POST['from_sim_num'];
$from_sim_type = $_POST['from_sim_type'];

$to_ip = $_POST['to_ip'];
$to_sim_num = $_POST['to_sim_num'];
$to_sim_type = $_POST['to_sim_type'];



    $insert_sim = " INSERT INTO `sims`
(`sim_type`, `sim_num`, `sim_ip`)
VALUES ('$from_sim_type','$from_sim_num','$from_ip')
";

$delete_sim = "
DELETE FROM `sims` WHERE `sim_num` = '$to_sim_num'
";

$insert_replace_sim = "
INSERT INTO `replace_sims`(`office_name`, `router_name`, `router_sn`, `from_ip`, `from_sim_num`, `from_sim_type`, `to_ip`, `to_sim_num`, `to_sim_type`, `replace_date`)
VALUES ('$office_name','$router_name','$router_sn','$from_ip','$from_sim_num','$from_sim_type','$to_ip','$to_sim_num','$to_sim_type','$replace_date')
";

$update_ip_router = "UPDATE DVICE SET IP = '$to_ip' WHERE SN = '$router_sn' ";
if(!empty($from_sim_num)){
    if ($conn->query($insert_sim) ) {

    echo '<script>alert(" تم ادخال القديم");</script>';
 } else {
     echo '<script>alert("لم يتم ادخال القديم");</script>';
 }

}

 if ($conn->query($delete_sim)) {

    echo '<script>alert(" تم الحذف");</script>';
 } else {
     echo '<script>alert("لم يتم الحذف");</script>';
 }

 if ($conn->query($insert_replace_sim) AND $conn->query($update_ip_router)  ) {

    echo '<script>alert(" تم التحديث");</script>';
 } else {
     echo '<script>alert("لم يتم التحديث");</script>';
 }
?>