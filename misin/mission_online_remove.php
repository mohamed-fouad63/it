<?php
session_start();
include '../connection.php';

$counter = $_POST['counter'];

$sql_delet_missin_online = " DELETE FROM misin_it_online WHERE counter = $counter ";

if ($conn->query($sql_delet_missin_online) === true) {
} else {
    echo "<script>alert('not done');</script>";
}
// $sql_del_postal_in_it = "DELETE n1 FROM misin_it_online n1, misin_it_online n2 WHERE n1.counter > n2.counter AND n1.misin_date = n2.misin_date AND n1.office_name = n2.office_name AND n1.it_name = n2.it_name";
// if ($conn->query($sql_del_postal_in_it) === true) {
// }
