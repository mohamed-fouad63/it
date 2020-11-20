<?php
session_start();
//include '../../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';
$queryll_3g=mysqli_query($conn, "select * from all1 where  LL != '' AND  3G != '' ");
$rowcount1=mysqli_num_rows($queryll_3g);

?>
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
                    <th>IP leasd line</th>
                    <th>IP 3G </th>
                 </tr>
<?php
                while($row=mysqli_fetch_assoc($queryll_3g)){
    echo "<tr><td>".
        $row['office_name']."</td><td>".$row['LL']."</td><td>".$row['3G']."</td</tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>