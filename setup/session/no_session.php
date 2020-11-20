<?php
$session_username = $_SESSION['user_name'];
if(!$session_username){header('location:../../../it/setup/log/login.php');}
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
$in_tts = $_SESSION['in_tts'];
?>
