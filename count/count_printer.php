<?php
session_start();
//include '../../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';
$query1=mysqli_query($conn, "SELECT id,dvice_name,COUNT(dvice_name)  FROM dvice WHERE id like 'printer' GROUP BY dvice_name
");
$rowcount1=mysqli_num_rows($query1);

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
                    <th>اسم الشاشه</th>
                    <th>عدد</th>
                 </tr>
<?php
                while($row=mysqli_fetch_assoc($query1)){
    echo "<tr><td>".
        $row['dvice_name']."</td><td>".$row['COUNT(dvice_name)']."</td></tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>