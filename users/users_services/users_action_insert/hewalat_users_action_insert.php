<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
 $office_name = $_POST['office_name'];
 $money_code = $_POST['money_code'];
 $auth = $_POST['auth'];
 $id = $_POST['id'];
 $code = $_POST['code'];
 $names = $_POST['names'];
 $action = $_POST['action'];

    $query_hewalat_users_action_insert = "
    INSERT INTO
    `hewalat_users_action`
    (`names`, `id`,`code`,`auth`, `money_code`, `office_name`,`action`)
    VALUES
    (
        '$names',
        '$id',
        '$code',
        '$auth',
        '$money_code',
        '$office_name',
        '$action'
    )
    ";
$conn->query($query_hewalat_users_action_insert);
?>
