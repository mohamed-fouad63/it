<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
$num = $_POST['num'];
$pos_terminal = $_POST['pos_terminal'];
$query_v200t_users_action_undone = " DELETE FROM v200t_users_action where num = $num ";
 $conn->query($query_v200t_users_action_undone);
?>
