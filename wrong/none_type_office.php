<?php
session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
include '../connection.php';
$query1=mysqli_query($conn, "select * from all1 where office_type = ''
");
?>
<!DOCTYPE html>
<html>
    <head>
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
                 </tr>
<?php
             while($row=mysqli_fetch_assoc($query1)){   
    echo "<tr><td>".
        $row['office_name']."</td></tr>";
} ?> 
            </table>
        </div>
    </div>
</body>
</html>