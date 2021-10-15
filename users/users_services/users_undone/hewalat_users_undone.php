<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
$num = $_POST['num'];
$query_hewalat_users_action_undone = " DELETE FROM hewalat_users_action where num = $num ";
 $conn->query($query_hewalat_users_action_undone);
?>
