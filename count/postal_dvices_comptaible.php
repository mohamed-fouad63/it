<?php
/*session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];*/
session_start();
include '../connection.php';
$query_all_office=mysqli_query($conn, "SELECT office_name , office_type from all1 ");

/*
SELECT dvice.office_name , all1.office_type FROM dvice 
INNER JOIN all1 where
all1.office_type = 'منطقه توزيع' and dvice.office_name = all1.office_name
OR
all1.office_type = 'مكتب بريد' and dvice.office_name = all1.office_name
OR
all1.office_type = 'مركز خدمات' and dvice.office_name = all1.office_name
OR
all1.office_type = 'مكتب متنقل' and dvice.office_name = all1.office_name
OR
all1.office_type = 'نقطه توزيع' and dvice.office_name = all1.office_name

GROUP BY office_name HAVING COUNT(*) >= 1
*/

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
                    <th>قارئ باركود</th>
                    <th> طابعه باركود</th>
                    <th>ميزان اليكترونى</th>
                    <th>شاشه عرض عملاء</th>
                 </tr>
<?php
                while($row=mysqli_fetch_assoc($query_all_office)){
$office = $row['office_name'];
$office_type = $row['office_type'];
$query_scanner=mysqli_query($conn, "select * from dvice where office_name = '$office' AND dvice_type = 'قارىء باركود' ");
$rowcount_scanner=mysqli_num_rows($query_scanner);

$quer_parcode_printer=mysqli_query($conn, "select * from dvice where office_name = '$office' AND dvice_type = 'طابعه باركود' ");
$rowcount_parcode_printer=mysqli_num_rows($quer_parcode_printer);

$quer_scale=mysqli_query($conn, "select * from dvice where office_name = '$office' AND dvice_type = 'ميزان الكتروني' ");
$rowcount_scale=mysqli_num_rows($quer_scale);

$quer_display=mysqli_query($conn, "select * from dvice where office_name = '$office' AND dvice_type = 'شاشه عرض عملاء' ");
$rowcount_display=mysqli_num_rows($quer_display);
$all_postal_dvice_counter = $rowcount_scanner + $rowcount_parcode_printer + $rowcount_scale + $rowcount_display ;
if($all_postal_dvice_counter != 0 and $office_type != 'قسم'
or
$all_postal_dvice_counter != 0 and $office_type != 'اداره عامه'
or
$all_postal_dvice_counter != 0 and $office_type != 'خزينه'
or
$all_postal_dvice_counter != 0 and $office_type != 'مباحث البريد'
)
  {

?>
    <tr>
    <td><?php echo $office ; ?></td>
    <td <?PHP if( $rowcount_scanner == 0 ){ echo 'style="background-color:#a51717" ';} ?>><?php echo $rowcount_scanner ;?></td>
    <td><?php echo $rowcount_parcode_printer; ?></td>
    <td><?php echo $rowcount_scale; ?></td>
    <td><?php echo $rowcount_display ; ?></td>
    </tr>

<?php } } ?>

            </table>
        </div>
    </div>
</body>
</html>
