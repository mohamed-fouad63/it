<?php
session_start();
include '../connection.php';
$session_username = $_SESSION['user_name'];
$search = $_POST["query"];

$query_vacation1 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and office_name = 'اجازه اعتياديه' and misin_date like '%$search%' ");
$query_vacation2 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and office_name = 'اجازه عارضه' and misin_date like '%$search%' ");
$query_vacation3 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and office_name = 'بدل راحه' and misin_date like '%$search%' ");
$query_vacation4 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and office_name like '%ماموريه%' and misin_date like '%$search%' ");
$query_vacation5 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and office_name = 'اجازه مرضيه' and misin_date like '%$search%' ");
$query_vacation6 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and office_name like '%اجازه استثنائيه%' and misin_date like '%$search%' ");
$query_vacation7 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$session_username' and misin_day = 'السبت' and misin_date like '%$search%' ");

$rowcount_query_vacation1=mysqli_num_rows($query_vacation1);
$rowcount_query_vacation2=mysqli_num_rows($query_vacation2);
$rowcount_query_vacation3=mysqli_num_rows($query_vacation3);
$rowcount_query_vacation4=mysqli_num_rows($query_vacation4);
$rowcount_query_vacation5=mysqli_num_rows($query_vacation5);
$rowcount_query_vacation6=mysqli_num_rows($query_vacation6);
$rowcount_query_vacation7=mysqli_num_rows($query_vacation7);
?>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">اجازه اعتياديه</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation1 ;?></label>
    </div>
</div>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">اجازه عارضه</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation2 ;?></label>
    </div>
</div>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">ايام السبت</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation7 ;?></label>
    </div>
</div>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">بدل راحه</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation3 ;?></label>
    </div>
</div>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">ماموريه خارجيه</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation4 ;?></label>
    </div>
</div>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">اجازه مرضيه</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation5 ;?></label>
    </div>
</div>
<div class="w13">
    <div class="panel panel-default dvice_mode">
        <div class="panel-heading">
            <label class="panel-title" for="des">اجازه استثنائيه</label>
        </div>
    <div class="panel-body">
        <label class="panel-title" for="des"><?php echo $rowcount_query_vacation6 ;?></label>
    </div>
</div>





