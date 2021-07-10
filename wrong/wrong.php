<?php
session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$job = $_SESSION['job'];
include '../connection.php';
// ارقم تسلسل مكرره
$query_repeat_sn=mysqli_query($conn, "SELECT sn, COUNT(sn) FROM dvice WHERE sn != '' GROUP BY sn HAVING COUNT(sn) > 1
");
$rowcount_repeat_sn=mysqli_num_rows($query_repeat_sn);
// بدون نوع جهاز
$query_none_id=mysqli_query($conn, "SELECT id,dvice_name,office_name,COUNT(id) FROM dvice WHERE dvice_type = '' GROUP BY dvice_name,office_name");
$rowcount_none_id=mysqli_num_rows($query_none_id);
// مكتب به سريال مكرر
$query_repeat_sn_one_office=mysqli_query($conn, "SELECT sn,office_name, COUNT(sn) FROM dvice WHERE sn != '' GROUP BY sn,office_name HAVING COUNT(sn) > 1
");
$rowcount_repeat_sn_one_office=mysqli_num_rows($query_repeat_sn_one_office);
// مكتب او قسم بدون نوع المكتب
$query_none_type_office = mysqli_query($conn,"select * from all1 where office_type = ''");
$row_none_type_office = mysqli_num_rows($query_none_type_office);
// اختلاف ip
$query_def_ip = mysqli_query($conn,"select b.dvice_name,a.office_name,a.3G,a.LL,b.ip,b.dvice_type from all1 a join dvice b on a.office_name = b.office_name and b.dvice_type like '%روتر%'
");
$row_def_ip = mysqli_num_rows($query_def_ip);
// روتر بدون ip
$query_none_ip = mysqli_query($conn,"select * from dvice where ip = '' and dvice_type like '%روتر%'
");
$row_none_ip = mysqli_num_rows($query_none_ip);
?>
<html>
   <link rel="stylesheet" href="../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="../css/count.css">
    
<body dir="rtl">
    <a href="../index.php"><i class="fas fa-home"></i></a>
    <div class="middle">
        <div class="menu">
            <li class="item" id="profile">
                <a href="repeat_sn_office.php"  class="btn">
                    <i class="fas fa-cubes"></i>
                    <label>رقم تسلسلى مكرر</label>
                    <span class="badge"><?php echo $rowcount_repeat_sn; ?></span>
                </a>

            </li>
            
            <li class="item" id="message">
                <a href="none_id.php" class="btn">
                    <i class="fas fa-desktop"></i>
                    <label>بدون نوع جهاز</label>
                    <span class="badge"><?php echo $rowcount_none_id; ?></span>
                </a>

            </li>
            
            <li class="item" id="setting">
                <a href="repeat_sn_one_office.php" class="btn">
                    <i class="fas fa-cube"></i>
                    <label>مكتب به سريال مكرر</label>
                    <span class="badge"><?php echo $rowcount_repeat_sn_one_office; ?></span>
                </a> 
            </li>

            <li class="item" id="setting">
                <a href="pc_monitor.php" class="btn">
                    <i class="fas fa-dice"></i>
                    <label>وجود جهاز بدون شاشه او العكس</label>
                    <span class="badge"><?php ?></span>
                </a>
            </li>
    
            <li class="item" id="setting">
                <a href="none_type_office.php" class="btn">
                    <i class="fas fa-dice"></i>
                    <label>بدون نوع مكتب </label>
                    <span class="badge"><?php echo $row_none_type_office ; ?></span>
                </a>
            </li>
            <li class="item" id="setting">
                <a href="" class="btn">
                    <i class="fas fa-dice"></i>
                    <label>روتر بدون ip </label>
                    <span class="badge"><?php echo $row_none_ip ; ?></span>
                </a>
            </li>
        </div>
    </div>

</body>
</html>