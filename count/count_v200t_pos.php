<?php
session_start();
//include '../../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';
$query_post_pos=mysqli_query($conn, "select office_name,dvice_name,ip,sn from dvice where 
dvice_name = 'VERIFONE V200T'");
$rowcount_post_pos=mysqli_num_rows($query_post_pos);

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
                    <th>نوع الماكينه</th>
                    <th>السريال</th>
                    <th>IP</th>
                 </tr>
<?php
                while($row=mysqli_fetch_assoc($query_post_pos)){
    echo "<tr><td>".
        $row['office_name']."</td><td>".$row['dvice_name']."</td><td>".$row['sn']."</td><td>".$row['ip']."</td</tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>