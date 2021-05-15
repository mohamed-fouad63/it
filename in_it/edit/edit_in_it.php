<?php
session_start();
include '../../connection.php';
$_damage = $_POST['_damage'];
$_in_it_note = $_POST['_in_it_note'];
$_num = $_POST['_num'];
$sql_edit_in_it = "UPDATE in_it SET 
damage = '$_damage',
in_it_note = '$_in_it_note'
WHERE count_in_it ='$_num' ";
if ($conn->query($sql_edit_in_it) === TRUE) {}
    else { echo '<script>alert("لم يتم التحديث");</script>';}
?>