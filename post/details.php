<!-- am -->
<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
$key=$_POST['key'];
include '../connection.php';
$query=mysqli_query($conn, "select * from all1 where money_code LIKE '{$key}' OR office_name LIKE '{$key}' OR post_code LIKE '%{$key}%'");
$query1=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'pc' ");
$rowcount1=mysqli_num_rows($query1);
$query2=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'MONITOR' ");
$rowcount2=mysqli_num_rows($query2);
$query3=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'PRINTER' ");
$rowcount3=mysqli_num_rows($query3);
$query4=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'pos' ");
$rowcount4=mysqli_num_rows($query4);
$query5=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'NETWORK' ");
$rowcount5=mysqli_num_rows($query5);
$query6=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'postal' ");
$rowcount6=mysqli_num_rows($query6);
$query7=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'other' ");
$rowcount7=mysqli_num_rows($query7);
$query8=mysqli_query($conn, "select * from dvice where office_name LIKE '{$key}' AND id like 'NETWORK' And dvice_type like 'روتر هوائى' ");
$rowcount8=mysqli_num_rows($query8);

?>
<!-- start office deatails -->
<?php include 'details/office_details.php'; ?>
<!-- end  office deatails-->
<!-- start pc -->
<?php include 'details/pc_details.php'; ?>
<!-- end pc -->
<!-- srart monitor -->
<?php include 'details/monitor_details.php'; ?>
<!-- end montor -->
<!-- start printer -->
<?php include 'details/printer_details.php'; ?>
<!-- end printer -->
<!-- start pos -->
<?php include 'details/pos_details.php'; ?>
<!-- end pos -->
<!-- strat network -->
<?php include 'details/network_details.php'; ?>
<!-- end network -->
<!-- strat postal -->
<?php include 'details/postal_details.php'; ?>
<!-- end postal -->
<!-- start other -->
<?php include 'details/other_details.php'; ?>
<!-- end other -->
<div class="clearfix"></div>
<!-- start footer -->
<!--<footer>
Copyright 2019 &copy; All Right reserved By Good-Heart 
</footer>-->
