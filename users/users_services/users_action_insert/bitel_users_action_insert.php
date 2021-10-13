<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
 $office_name = $_POST['office_name'];
 $money_code = $_POST['money_code'];
 $pos_terminal = $_POST['pos_terminal'];
 $sn = $_POST['sn'];
 $auth = $_POST['auth'];
 $id = $_POST['id'];
 $names = $_POST['names'];
 $action = $_POST['action'];

    $query_bitel_users_action_insert = "
    INSERT INTO
    `bitel_users_action`
    (`names`, `id`,`auth`, `money_code`, `office_name`, `sn`, `pos_terminal`,`action`)
    VALUES
    (
        '$names',
        '$id',
        '$auth',
        '$money_code',
        '$office_name',
        '$sn',
        '$pos_terminal',
        '$action'
    )
    ";
$conn->query($query_bitel_users_action_insert);


?>
