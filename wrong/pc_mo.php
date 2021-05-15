<?php
/*session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];*/
session_start();
include 'connection.php';
$query_all_office=mysqli_query($conn, "SELECT office_name FROM dvice GROUP BY office_name HAVING COUNT(*) >= 1");
while($row=mysqli_fetch_assoc($query_all_office)){
$office = $row['office_name'];

}

