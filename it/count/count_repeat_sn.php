<?php
session_start();
//include '../../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';
$query1=mysqli_query($conn, "SELECT sn, COUNT(sn) FROM dvice GROUP BY sn HAVING count(sn) > 1");
$rowcount1=mysqli_num_rows($query1);
while($row=mysqli_fetch_assoc($query1)){
    echo $row['sn']." = ".$row['COUNT(sn)']."<br>";
}
echo "<a href='repeat_sn_office.php'>عرض المكاتب</a>"; ?>
 <!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/count_dvice.css">
  <style>
      
    </style> 
        </head>
<body dir="rtl">
    <div class="middle">
        <div class="menu">
            <table class="">
                <tr class="">
                    <th>اسم المكتب</th>
                    <th>IP 3G</th>
                 </tr>
<?php
                while($row=mysqli_fetch_assoc($query3g)){
    echo "<tr><td>".
        $row['office_name']."</td><td>".$row['3G']."</td></tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>