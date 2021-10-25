<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
$office_name = $_POST['office_name'];
$money_code = $_POST['money_code'];
$pos_terminal = $_POST['pos_terminal'];
$sn = $_POST['sn'];
$auth = $_POST['auth'];
$names = $_POST['names'];
$id = $_POST['id'];
$action = $_POST['action'];
$num = $_POST['num'];
$query_bitel_users_insert = "
INSERT INTO
`bitel_users`
(`names`, `id`,`auth`,`money_code`, `office_name`,`sn`,`pos_terminal`)
VALUES
('$names','$id','$auth','$money_code','$office_name','$sn','$pos_terminal')
";
$query_bitel_users_done_history_insert = "
INSERT INTO
`bitel_users_done_history`
(`names`, `id`,`auth`,`money_code`, `office_name`,`sn`,`pos_terminal`,`action`)
VALUES
('$names','$id','$auth','$money_code','$office_name','$sn','$pos_terminal','$action')
";
$query_bitel_users_delete = "
DELETE FROM bitel_users where id = '$id';
";

$query_bitel_users_action_delete = "
DELETE FROM bitel_users_action where num = '$num' ;
";
switch ($action) {
    case 'اضافة':
        if ($conn->query($query_bitel_users_insert) == true) {
        $conn->query($query_bitel_users_done_history_insert);
        $conn->query($query_bitel_users_action_delete);
        echo "تم";
        }
        else if ($conn->query($query_bitel_users_insert) == false) {
        echo "حذف المستخدم اولا";
        }
    break;
    case 'الغاء':
        if ($conn->query($query_bitel_users_delete) == true) {
        $conn->query($query_bitel_users_done_history_insert);
        $conn->query($query_bitel_users_action_delete);
        echo "done";
        }
    break;
    case 'اعادة تعيين كلمة السر':
        $conn->query($query_bitel_users_done_history_insert);
        $conn->query($query_bitel_users_action_delete);
        echo "done";
    break;
}
?>
