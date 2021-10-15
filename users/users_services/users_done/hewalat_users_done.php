<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
$money_code = $_POST['money_code'];
$names = $_POST['names'];
$auth = $_POST['auth'];
$id = $_POST['id'];
$code = $_POST['code'];
$action = $_POST['action'];
$office_name = $_POST['office_name'];
$num = $_POST['num'];
$query_hewalat_users_insert = "
INSERT INTO
`hewalat`
(`names`, `id`,`code`,`auth`, `money_code`,`office_name`)
VALUES
('$names','$id','$code','$auth','$money_code','$office_name')
";
$query_hewalat_users_done_history_insert = "
INSERT INTO
`hewalat_users_done_history`
(`names`, `id`,`code`,`auth`, `money_code`,`office_name`,`action`)
VALUES
('$names','$id','$code','$auth','$money_code','$office_name','$action')
";
$query_hewalat_users_delete = "
DELETE FROM hewalat where id = $id ;
";

$query_hewalat_users_action_delete = "
DELETE FROM hewalat_users_action where num = $num ;
";
switch ($action) {
    case 'اضافة':
        if ($conn->query($query_hewalat_users_insert) == true) {
        $conn->query($query_hewalat_users_done_history_insert);
        $conn->query($query_hewalat_users_action_delete);
        echo "done";
        }
        else if ($conn->query($query_hewalat_users_insert) == false) {
        echo "حذف المستخدم اولا";
        }
    break;
    case 'الغاء':
        if ($conn->query($query_hewalat_users_delete) == true) {
        $conn->query($query_hewalat_users_done_history_insert);
        $conn->query($query_hewalat_users_action_delete);
        echo "done";
        }
    break;
    case 'اعادة تعيين كلمة السر':
        $conn->query($query_hewalat_users_done_history_insert);
        $conn->query($query_hewalat_users_action_delete);
        echo "done";
    break;
}
?>
