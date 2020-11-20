<?php
session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
include '../connection.php';
$query1=mysqli_query($conn, "SELECT a.sn,a.office_name,a.dvice_name FROM dvice a JOIN (SELECT sn, COUNT(sn) FROM dvice WHERE sn !='' GROUP BY sn HAVING count(sn) > 1 ) b ON a.sn = b.sn ORDER BY a.sn
");
?>
<!DOCTYPE html>
<html>
    <head>
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