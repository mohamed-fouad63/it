<?php
session_start();
$session_username = $_SESSION['user_name'];
if(!$_SESSION['user_name']){header('location: login.php');}
$key=$_POST['key'];
include '../connection.php';
$query_pc_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'pc'");
$query_monitor_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'MONITOR'");
$query_printer_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'PRINTER'");
$query_pos_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'pos'");
$query_network_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'NETWORK'");
$query_postal_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'postal'");
$query_other_in_it=mysqli_query($conn, "select * from in_it where status like '{$key}' && id like 'other'");
$pc_in_it=mysqli_num_rows($query_pc_in_it);
 $monitor_in_it=mysqli_num_rows($query_monitor_in_it);
 $printer_in_it=mysqli_num_rows($query_printer_in_it);
 $pos_in_it=mysqli_num_rows($query_pos_in_it);
 $network_in_it=mysqli_num_rows($query_network_in_it);
 $postal_in_it=mysqli_num_rows($query_postal_in_it);
 $other_in_it=mysqli_num_rows($query_other_in_it);
 
?>
 <!-- start pc -->
<?php include "details\pc_details.php" ?>
<!-- end pc -->

<!-- start monitor -->
<?php include "details\monitor_details.php" ?>
<!-- end monitor -->
<!-- start printer -->
<?php include "details\printer_details.php" ?>
<!-- end printer -->
<!-- start pos -->
<?php include "details\pos_details.php" ?>
<!-- end pos -->
<!-- start network -->
<?php include 'details\network_details.php'; ?>
<!-- end network -->
<!-- start postal -->
<?php include "details\postal_details.php" ?>
<!-- end postal -->
<!-- start other -->
<?php include "details\other_details.php" ?>
<!-- end other -->