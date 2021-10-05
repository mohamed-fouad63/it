<!-- am -->
<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
include '../connection.php';

$query8=mysqli_query($conn, "SELECT * FROM `dvice` WHERE id = 'network' AND dvice_type LIKE 'روتر%' ORDER BY office_name");
$rowcount8=mysqli_num_rows($query8);

?>

<!-- strat network -->
<?php include 'details/routers_details.php'; ?>
<!-- end network -->

<div class="clearfix"></div>
<!-- start footer -->
<!--<footer>
Copyright 2019 &copy; All Right reserved By Good-Heart 
</footer>-->
