<?php
/*
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];*/
session_start();
include '../connection.php';
$query1=mysqli_query($conn, "SELECT sn,dvice_name,office_name, COUNT(sn) FROM dvice WHERE sn != '' GROUP BY sn,office_name HAVING COUNT(sn) > 1");
$rowcount1=mysqli_num_rows($query1);

?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/count_dvice.css">
  <style>
      
    </style> 
        </head>
<body dir="rtl">
    <div class="middle">
        <div class="menu">
            <table class="">
                <tr class="">
                    <th>اسم المكتب</th>
                    <th>الجهاز</th>
                    <th>السريال</th>
                 </tr>
<?php
        while($row=mysqli_fetch_assoc($query1)){
    echo "<tr><td>".
        $row['office_name']."</td><td>".$row['dvice_name']."</td><td>".$row['sn']."</td></tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>