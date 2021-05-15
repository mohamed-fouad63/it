<?php
/*session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];*/
session_start();
include '../connection.php';
$query_all_office=mysqli_query($conn, "SELECT office_name FROM dvice GROUP BY office_name HAVING COUNT(*) >= 1");



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
                    <th>عدد الاجهزه</th>
                    <th>عدد الشاشات</th>
                 </tr>
<?php
                while($row=mysqli_fetch_assoc($query_all_office)){
$office = $row['office_name'];
$querypc=mysqli_query($conn, "select * from dvice where office_name LIKE '$office' AND id like 'pc' AND note not like 'تم تكهينها'");
$rowcountpc=mysqli_num_rows($querypc);
$querymo=mysqli_query($conn, "select * from dvice where office_name LIKE '$office' AND id like 'MONITOR' AND note not like 'تم تكهينها'");
$rowcountmo=mysqli_num_rows($querymo);
                    
    if ($rowcountpc != $rowcountmo ){
        

        
        
    echo "<tr><td>".
        $office."</td><td>".$rowcountpc."</td><td>".$rowcountmo."</td</tr>";
} }?> 
            </table>
        </div>
    </div>
</body>
</html>
