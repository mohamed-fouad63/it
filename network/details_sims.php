<?php 
session_start();
include '../connection.php';
$query_vodafone = mysqli_query($conn, "select * from sims where sim_type = 'vodafone' ");
$rowcount_query_vodafone=mysqli_num_rows($query_vodafone);

$query_orange = mysqli_query($conn, "select * from sims where sim_type = 'orange' ");
$rowcount_query_orange=mysqli_num_rows($query_orange);

$query_etisalat = mysqli_query($conn, "select * from sims where sim_type = 'etisalat' ");
$rowcount_query_etisalat =mysqli_num_rows($query_etisalat);
?>
<?php include 'details/vodafone.php'; ?>
<!-- end  vodafone -->
<!-- start orange -->
<?php include 'details/orange.php'; ?>
<!-- end orange -->
<!-- srart etisalat -->
<?php include 'details/etisalat.php'; ?>
<!-- end etisalat -->

<!-- php start change_pass -->