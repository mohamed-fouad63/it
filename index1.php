<?php
session_start();
//if(!$_SESSION['user_name']){header('location:setup/log/login.php');}
include 'setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<title>الصفحه الرئيسيه</title>
<meta charset="UTF-8">
<link rel="icon" href="img/it.svg" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css4/bootstrap.min.css">
<link rel="stylesheet" href="css/web-fonts-with-css/css/all.css">
<script src="js/jquery.min.js"></script>
<script src="js4/bootstrap.min.js"></script>
<style>
    body {
        font-family: "Varela Round", Nunito, Montserrat, sans-serif;
        font-weight: bold;
        font-size: 1.25em;
        color: black;
    }

    .navbar-nav {
        margin: auto;
    }

    .dropdown-menu {

        text-align: center;
        font-size: 1em;
        font-weight: bold;
    }

    .dropdown-menu::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        border-left: 1px solid rgba(0, 0, 0, .15);
        ;
        border-top: 1px solid rgba(0, 0, 0, .15);
        background-color: white;
        transform: rotate(45deg);
        top: -10px;
        left: 60px;
        z-index: -1;
    }

    .fas {
        transition: 1s;
    }

    .dropdown-toggle::after {
        transition: 1s;
    }

    .nav-item:hover .fas {
        color: red;
        transform: rotate(360deg);
    }

    .nav-item:hover .dropdown-toggle::after {
        color: red;
        transform: rotate(360deg);
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ol class="navbar-nav">
            <!-- متابعه القاعده -->
            <?php if ($_SESSION['link_count_wrong'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        متابعه القاعده
                        <i class="fas fa-database"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['counts'] == 1) { ?>
                            <li><a class="item dropdown-item" href="count/count.php">احصائيات</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['wrong'] == 1) { ?>
                            <li><a class="item dropdown-item" href="wrong/wrong.php">اخطاء</a></li>
                        <?php } ?>
                    </ol>
                </li>
            <?php } ?>
            <!--  شبكات -->
            <?php if ($_SESSION['link_network'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        شبكات
                        <i class="fas fa-broadcast-tower"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['sims'] == 1) { ?>
                            <li><a class="item dropdown-item" href="network/sims.php">الشرائح المتوفره</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['replace_sims'] == 1) { ?>
                            <li><a class="item dropdown-item" href="network/replace_sims.php">سجل تغيير شرائح</a></li>
                        <?php } ?>
                    </ol>
                </li>
            <?php } ?>
            <!-- المكاتب و المجموعات -->
            <?php if ($_SESSION['link_office_group'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        المكاتب و المجموعات
                        <i class="fas fa-building"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['edit_office'] == 1) { ?>
                            <li><a class="dropdown-item" href="office_group/update/edit_office.php"> تعديل مكتب / قسم</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['add_office'] == 1) { ?>
                            <li><a class="dropdown-item" href="office_group/add/add_office.php"> اضافه مكتب / قسم</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['office_group'] == 1) { ?>
                            <li><a class="dropdown-item" href="office_group/group/office_group.php">مجموعات بريديه</a></li>
                        <?php } ?>
                    </ol>
                </li> <?php } ?>
            <!-- السجلات -->
            <?php if ($_SESSION['link_record'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        السجلات
                        <i class="fas fa-book-open"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['Incoming'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/Incoming.php"> سجل الصيانه</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['move_dvices'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/move.php">سجل المنقول</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['deleted_dvices'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/deleted.php">سجل التكهين</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['all_misin'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/all_misin.php"> سجل التحركات</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['all_misin'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/vacation.php"> سجل الاجازات و الراحات</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['notice'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/notice.php"> سجل البلاغات</a></li>
                        <?php } ?>
                    </ol>
                </li>
            <?php } ?>
            <?php if ($_SESSION['link_dvice'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        الاجهزه
                        <i class="fas fa-laptop"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['all_dvices'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/all_dvices.php">اجهزه المكاتب</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['post'] == 1) { ?>
                            <li><a class="dropdown-item" href="post/post.php">اجهزه مكتب</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['in_it'] == 1) { ?>
                            <li><a class="dropdown-item" href="in_it/in_it.php">اجهزه بالدعم الفنى</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['in_tts'] == 1) { ?>
                            <li><a class="dropdown-item" href="in_tts/in_tts.php">اجهزه بقطاع الدعم الفنى</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['replace_dvices'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/replace_dvices.php">اجهزه تم تغيير مكوناتها
                                </a></li>
                        <?php } ?>
                    </ol>
                </li> <!-- الاجهزه -->
            <?php } ?>
            <?php if ($_SESSION['link_misin'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        الماموريات
                        <i class="fas fa-suitcase"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['my_misin'] == 1) { ?>
                            <li><a class="dropdown-item" href="misin/my_misin.php">مامورياتى</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['misins'] == 1) { ?>
                            <li><a class="dropdown-item" href="misin/missin.php">الماموريات</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['misins'] == 1) { ?>
                            <li><a class="dropdown-item" href="misin/misin_online.php">ماموريات تحت الانتظار</a></li>
                        <?php } ?>
                    </ol>
                </li> <!-- الماموريات -->
            <?php } ?>
            <?php if ($_SESSION['link_user'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        المستخدمين
                        <i class="fas fas fa-user-tie"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <!-- <?php if ($_SESSION['postal'] == 1) { ?>
                            <li><a class="dropdown-item" href="users/postal.php">مستخدمين بوستال</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['hewalat'] == 1) { ?>
                            <li><a class="dropdown-item" href="users/hewalat.php">مستخدمين حوالات</a></li>
                        <?php } ?> -->
                        <?php if ($_SESSION['users'] == 1) { ?>
                            <li><a class="dropdown-item" href="users/user_auth.php">صلاحيات المستخدمين</a></li>
                        <?php } ?>
                        <!-- <?php if ($_SESSION['users'] == 1) { ?>
                            <li><a class="dropdown-item" href="record/users_login.php">سجل الزائرين الحاليين</a></li>
                        <?php } ?> -->
                    </ol>
                </li> <!-- المستخدمين -->
            <?php } ?>
            <!-- المراسلات -->
            <?php if ($_SESSION['link_reg'] == 1) { ?>
                <li class="nav-item dropdown">
                    <a href="#0" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        المراسلات
                        <i class="fas fa-envelope"></i>
                    </a>
                    <ol class="dropdown-menu">
                        <?php if ($_SESSION['reg_to'] == 1) { ?>
                            <li><a class="dropdown-item" href="reg/to/to.php">تسجيل الصادر</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['to_filter'] == 1) { ?>
                            <li><a class="dropdown-item" href="reg/to/to_filter.php">استعلام الصادر</a></li>
                        <?php } ?>
                        <!-- <?php if ($_SESSION['reg_to_edit'] == 1) { ?>
                    <li><a class="dropdown-item" href="reg/to/to_edit.php">تعديل الصادر</a></li>
                    <?php } ?> -->
                        <?php if ($_SESSION['reg_in'] == 1) { ?>
                            <li><a class="dropdown-item" href="reg/in/in.php">تسجيل الوارد</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['in_filter'] == 1) { ?>
                            <li><a class="dropdown-item" href="reg/in/in_filter.php">استعلام الوارد</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['reg_parcel_to'] == 1) { ?>
                            <li><a class="dropdown-item" href="reg/parcel/parcel_to.php">تسجيل الطرود الصادره</a></li>
                        <?php } ?>
                        <?php if ($_SESSION['parcel_to_filter'] == 1) { ?>
                            <li><a class="dropdown-item" href="reg/parcel/parcel_to_filter.php">استعلام الطرود الصادره</a></li>
                        <?php } ?>
                        <!-- <?php if ($_SESSION['reg_parcel_to_edit'] == 1) { ?>
                    <li><a class="dropdown-item" href="reg/parcel/parcel_to_edit.php">تعديل الطرود الصادره</a></li>
                    <?php } ?> -->
                    </ol>
                </li> <!-- المستخدمين -->
            <?php } ?>
        </ol>
        <!-- <a href="#logout" data-toggle="modal">
           <button type="button" class="btn btn-info">
            تسجيل الخروج
           </button>
        </a> -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-outline-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $session_username //" ".$session_role; 
                ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#logout" data-toggle="modal">تسجيل الخروج</a>
                <a class="dropdown-item" href="#changepass" data-toggle="modal">تغيير كلمه المرور</a>
            </div>

        </div>
    </nav>
    <!--start change passord -->
    <?php include 'setup/pass/change_password_form.php'; ?>
    <!-- end change_pass -->
    <!--start Logout Modal -->
    <?php include 'setup/log/logout_form.php'; ?>
    <!-- end Logout Modal -->
</body>

</html>