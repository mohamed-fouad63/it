<?php
$session_username = $_SESSION['user_name'];
if(!$session_username){header('location:../../../it/setup/log/login.php');}
?>
