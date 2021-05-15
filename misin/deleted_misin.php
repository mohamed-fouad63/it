<?php

session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';

$num = $_POST['num'];


$sql_deleted_misin = "DELETE FROM `misin_it` WHERE counter LIKE '$num'";

if ($conn->query($sql_deleted_misin) === true ) { ?>

<?php } else { echo '<script>alert("لم يتم الحذف");</script>';}
?>
