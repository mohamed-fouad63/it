<?php
session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';
$query_none_id=mysqli_query($conn, "SELECT id,dvice_name,office_name,COUNT(id) FROM dvice WHERE id like '' GROUP BY dvice_name,office_name
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
                    <th>السريال</th>
                    <th>اسم المكتب</th>
                 </tr>
<?php
           while($row=mysqli_fetch_assoc($query_none_id)){  
    echo "<tr><td>".
        $row['dvice_name']."</td><td>".$row['office_name']."</td></tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>