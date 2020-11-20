<?php
session_start();
include '../connection.php';
$misin_day = $_POST['misin_day'];
$misin_date = $_POST['misin_date'];
$id = $_POST['id'];
$it_name = $_POST['it_name'];
$office_name = $_POST['office_name'];
$misin_type = $_POST['misin_type'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$counter = $_POST['counter'];

$sql_insert_in_misin = "INSERT INTO misin_it (
misin_day,
misin_date,
id,
it_name,
office_name,
misin_type,
start_time,
end_time
)
VALUES (
'$misin_day',
'$misin_date',
'$id',
'$it_name',
'$office_name',
'$misin_type',
'$start_time',
'$end_time'
)";

$sql_delet_missin_online = " DELETE FROM misin_it_online WHERE counter = $counter ";

if ($conn->query($sql_insert_in_misin) === true && $conn->query($sql_delet_missin_online) === true) {
} else {
    echo "<script>alert('not done');</script>";
}
// $sql_del_postal_in_it = "DELETE n1 FROM misin_it_online n1, misin_it_online n2 WHERE n1.counter > n2.counter AND n1.misin_date = n2.misin_date AND n1.office_name = n2.office_name AND n1.it_name = n2.it_name";
// if ($conn->query($sql_del_postal_in_it) === true) {
// }
