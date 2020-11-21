<?php
session_start();

// remov all session variables
include '../../connection.php';
$id = $_SESSION['id'];

$sql_delete_user_login = "DELETE FROM `tbl_users_login`
WHERE id ='$id'";
if ($conn->query($sql_delete_user_login) === true) {
  session_unset();

  // destroy the session 
  session_destroy();
  header('location:login.php');
}
