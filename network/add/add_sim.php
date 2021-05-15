<?php
session_start();
include '../../connection.php'; 
$sim_num = $_POST['sim_num'];
$sim_type = $_POST['sim_type'];
$sim_ip = $_POST['sim_ip'];

$sql_insert_sim = "INSERT INTO `sims`(`sim_num`, `sim_type`, `sim_ip`) VALUES 
('$sim_num','$sim_type','$sim_ip')
";

if ($conn->query($sql_insert_sim) === true){ ?>

<?php
} else {  echo "<script> alert ('لم يتم التحديث')</script>"; }

?>