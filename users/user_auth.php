<?php
session_start();
$session_id = $_SESSION['id'];
$session_username = $_SESSION['user_name'];
$db = $_SESSION['db'];
include '../../it/setup/session/no_session.php';
//if ( $job == "hg"){ header('location: not.php');}
include '../connection.php';
$query_all_in_it1 = "
SELECT * from tbl_user";
$result = mysqli_query($conn, $query_all_in_it1);
?>
<!DOCTYPE html>
<html>

<head>
    <meta lang="ar" charset="utf-8" />
    <title>صلاحيات المستخدمين </title>
    <link rel="icon" href="../img/it.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header_nav.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js4/bootstrap.min.js"></script>
    <!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->

    <style>
        h2 {
            margin-top: 0;
        }

        table tr {
            transition: all .25s ease-in-out;
        }

        table tr:hover {
            background-color: #ddd;
        }

        ul {
            display: flex;
            list-style: none;
        }

        .show1 {
            position: static;

            z-index: 1000;

            float: none;
            text-align: center
        }

        .no {
            color: #d3d3d3;
        }

        .yes {
            color: black;
        }

        input[type="checkbox"] {
            display: none
        }

        input[type="checkbox"]:checked+label {
            color: black;
        }

        input[type="checkbox"]:not(:checked)+label {
            color: red;
        }

        .icon_auth {
            display: flex;
            list-style: none;
            padding: unset;
        }

        .icon_auth_sub {
            margin: 0 auto;
        }
.center_content {
    margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
    </style>
</head>

<body>
    <div>
        <header>
            <nav class="navbar  navbar-light bg-light  fixed-top">
                <a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
                <button type='button' class='btn  btn-outline-secondary' data-toggle='modal' data-placement="right" title="اضافه  مستخدم" data-target='#add_user'><i class='fas fa-plus'></i></button>
                <div class="nav-item dropdown ">
                    <?php   include '../setup/user/user.php'; ?>
                </div>
            </nav>
        </header>
        <div class="">
            <div style="direction:rtl;position:relative;top:50px;" class="" id="">
                <table class="table" id="tbl_user">


                    <?php				
if( $result ){
while($row_pc=mysqli_fetch_assoc($result)){
	$user_id = $row_pc["id"];
 ?>
                    <tr>
                        <td id="user_id"><?php echo $row_pc["id"] ; ?></td>
                        <td class="id_card" contenteditable="true"></td>
                        <td class="first_name"><?php echo $row_pc["first_name"]; ?></td>
                        <td><?php echo $row_pc["job"]; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <ul class="">
                                
                                <form style="display: inline-flex;" method="post" action="user_auth_sub.php">
                                    <li class=" dropdown">
                                    <!--  شبكات -->
                                        <a href="#" <?php if ($row_pc['link_network'] == 1){ echo "class='yes'";}else{ echo "class='no'";} ?>>
                                            <input type="checkbox" <?php if($row_pc['link_network'] == 1){echo "checked";} ?> id="nt<?php echo $row_pc["id"]; ?>" name="link_network" value='1'>
                                            <label for="nt<?php echo $row_pc["id"]; ?>">شبكات</label>
                                            <i class="fas fa-broadcast-tower"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">
                                            <li>
                                                <a href="#" <?php if($row_pc['sims'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['sims'] == 1){echo "checked";} ?> id="nt1<?php echo $row_pc["id"]; ?>" name="sims" value='1'>
                                                    <label for="nt1<?php echo $row_pc["id"]; ?>">الشرائح المتوفره</label>
                                                </a>
                                            </li>
                                            <li><a href="#" <?php if($row_pc['replace_sims'] == 1){echo "yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['replace_sims'] == 1){echo "checked";} ?> id="nt2<?php echo $row_pc["id"]; ?>" name="replace_sims" value='1'>
                                                    <label for="nt2<?php echo $row_pc["id"]; ?>">سجل تغيير الشرائح</label>
                                                </a>
                                            </li>
                                        </ol>
                                        <!-- متابعه القاعده 
                                        <a href="#" <?php if ($row_pc['link_count_wrong'] == 1){ echo "class='yes'";}else{ echo "class='no'";} ?>>
                                            <input type="checkbox" <?php if($row_pc['link_count_wrong'] == 1){echo "checked";} ?> id="mk<?php echo $row_pc["id"]; ?>" name="link_count_wrong" value='1'>
                                            <label for="mk<?php echo $row_pc["id"]; ?>">متابعه القاعده</label>
                                            <i class="fas fa-database"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">
                                            <li>
                                                <a href="#" <?php if($row_pc['counts'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['counts'] == 1){echo "checked";} ?> id="mk1<?php echo $row_pc["id"]; ?>" name="counts" value='1'>
                                                    <label for="mk1<?php echo $row_pc["id"]; ?>">احصائيات</label>
                                                </a>
                                            </li>
                                            <li><a href="#" <?php if($row_pc['wrong'] == 1){echo "yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['wrong'] == 1){echo "checked";} ?> id="mk2<?php echo $row_pc["id"]; ?>" name="wrong" value='1'>
                                                    <label for="mk2<?php echo $row_pc["id"]; ?>">اخطاء</label>
                                                </a>
                                            </li>
                                        </ol> -->
                                    </li>

                                    <!-- المكاتب و المجموعات -->

                                    <li class=" dropdown">
                                        <a href="#" <?php if($row_pc['link_office_group']== 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                            <input type="checkbox" <?php if($row_pc['link_office_group'] == 1){echo "checked";} ?> id="mm<?php echo $row_pc["id"]; ?>" name="link_office_group" value='1'>
                                            <label for="mm<?php echo $row_pc["id"]; ?>">المكاتب و المجموعات</label>
                                            <i class="fas fa-building"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">

                                            <li><a href="#" <?php if($row_pc['edit_office'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['edit_office'] == 1){echo "checked";} ?> id="mm1<?php echo $row_pc["id"]; ?>" name="edit_office" value='1'>
                                                    <label for="mm1<?php echo $row_pc["id"]; ?>">تعديل مكتب / قسم</label>
                                                </a>
                                            </li>

                                            <li><a href="#" <?php if($row_pc['add_office'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['add_office'] == 1){echo "checked";} ?> id="mm2<?php echo $row_pc["id"]; ?>" name="add_office" value='1'>
                                                    <label for="mm2<?php echo $row_pc["id"]; ?>">اضافه مكتب / قسم</label>
                                                </a>
                                            </li>
                                            <li><a href="#" <?php if($row_pc['office_group'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['office_group'] == 1){echo "checked";} ?> id="mm3<?php echo $row_pc["id"]; ?>" name="office_group" value='1'>
                                                    <label for="mm3<?php echo $row_pc["id"]; ?>">مجموعات بريديه</label>

                                                </a>
                                            </li>

                                        </ol>
                                    </li>
                                    <!-- السجلات -->

                                    <li class=" dropdown">
                                        <a href="#" <?php if($row_pc['link_record']== 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                            <input type="checkbox" <?php if($row_pc['link_record'] == 1){echo "checked";} ?> id="sg<?php echo $row_pc["id"]; ?>" name="link_record" value='1'>
                                            <label for="sg<?php echo $row_pc["id"]; ?>">السجلات</label>
                                            <i class="fas fa-book-open"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">

                                            <li><a href="#" <?php if($row_pc['Incoming'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['Incoming'] == 1){echo "checked";} ?> id="sg1<?php echo $row_pc["id"]; ?>" name="Incoming" value='1'>
                                                    <label for="sg1<?php echo $row_pc["id"]; ?>">سجل الصيانه</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['move_dvices'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['move_dvices'] == 1){echo "checked";} ?> id="sg2<?php echo $row_pc["id"]; ?>" name="move_dvices" value='1'>
                                                    <label for="sg2<?php echo $row_pc["id"]; ?>">سجل المنقول</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['deleted_dvices'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['deleted_dvices'] == 1){echo "checked";} ?> id="sg3<?php echo $row_pc["id"]; ?>" name="deleted_dvices" value='1'>
                                                    <label for="sg3<?php echo $row_pc["id"]; ?>">سجل التكهين</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['all_misin'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['all_misin'] == 1){echo "checked";} ?> id="sg4<?php echo $row_pc["id"]; ?>" name="all_misin" value='1'>
                                                    <label for="sg4<?php echo $row_pc["id"]; ?>">سجل التحركات</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['notice'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['notice'] == 1){echo "checked";} ?> id="sg5<?php echo $row_pc["id"]; ?>" name="notice" value='1'>
                                                    <label for="sg5<?php echo $row_pc["id"]; ?>">سجل البلاغات</label>
                                                </a></li>
                                        </ol>
                                    </li>


                                    <li class=" dropdown">
                                        <a href="#0" <?php if($row_pc['link_dvice']== 1){echo "class='yes'";} else { echo "class='no'";} ?>>
                                            <input type="checkbox" <?php if($row_pc['link_dvice'] == 1){echo "checked";} ?> id="dv<?php echo $row_pc["id"]; ?>" name="link_dvice" value='1'>
                                            <label for="dv<?php echo $row_pc["id"]; ?>">الاجهزه</label>

                                            <i class="fas fa-laptop"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">

                                            <li><a href="#" <?php if($row_pc['all_dvices'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['all_dvices'] == 1){echo "checked";} ?> id="dv1<?php echo $row_pc["id"]; ?>" name="all_dvices" value='1'>
                                                    <label for="dv1<?php echo $row_pc["id"]; ?>">اجهزه المكاتب</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['post'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['post'] == 1){echo "checked";} ?> id="dv2<?php echo $row_pc["id"]; ?>" name="post" value='1'>
                                                    <label for="dv2<?php echo $row_pc["id"]; ?>">اجهزه مكتب</label>
                                                </a>
                                                <!-- زر التعديل و النقل الخ -->
                                                <ol class="icon_auth">
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['edit'] == 1){echo "checked";} ?> id="dv21<?php echo $row_pc["id"]; ?>" name="edit" value='1'>
                                                        <label for="dv21<?php echo $row_pc["id"]; ?>"><i class='fas fa-edit'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['resent'] == 1){echo "checked";} ?> id="dv22<?php echo $row_pc["id"]; ?>" name="resent" value='1'>
                                                        <label for="dv22<?php echo $row_pc["id"]; ?>"><i class='fas fa-reply'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['move'] == 1){echo "checked";} ?> id="dv23<?php echo $row_pc["id"]; ?>" name="move" value='1'>
                                                        <label for="dv23<?php echo $row_pc["id"]; ?>"><i class='fas fa-people-carry'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['to_it'] == 1){echo "checked";} ?> id="dv24<?php echo $row_pc["id"]; ?>" name="to_it" value='1'>
                                                        <label for="dv24<?php echo $row_pc["id"]; ?>"><i class='fas fa-toolbox'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['add_dvice'] == 1){echo "checked";} ?> id="dv25<?php echo $row_pc["id"]; ?>" name="add_dvice" value='1'>
                                                        <label for="dv25<?php echo $row_pc["id"]; ?>"><i class='fas fa-plus'></i></label>
                                                    </li>
                                                </ol>
                                            </li>

                                            <li><a href="#" <?php if($row_pc['in_it'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['in_it'] == 1){echo "checked";} ?> id="dv3<?php echo $row_pc["id"]; ?>" name="in_it" value='1'>
                                                    <label for="dv3<?php echo $row_pc["id"]; ?>">اجهزه بالدعم الفنى</label>
                                                </a>
                                                <!-- زر التعديل و النقل الخ -->
                                                <ol class="icon_auth">
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['edit_in_it'] == 1){echo "checked";} ?> id="dv31<?php echo $row_pc["id"]; ?>" name="edit_in_it" value='1'>
                                                        <label for="dv31<?php echo $row_pc["id"]; ?>"><i class='fas fa-edit'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['resent_in_it'] == 1){echo "checked";} ?> id="dv32<?php echo $row_pc["id"]; ?>" name="resent_in_it" value='1'>
                                                        <label for="dv32<?php echo $row_pc["id"]; ?>"><i class='fas fa-reply'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['move_in_it'] == 1){echo "checked";} ?> id="dv33<?php echo $row_pc["id"]; ?>" name="move_in_it" value='1'>
                                                        <label for="dv33<?php echo $row_pc["id"]; ?>"><i class='fas fa-people-carry'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['to_tts'] == 1){echo "checked";} ?> id="dv34<?php echo $row_pc["id"]; ?>" name="to_tts" value='1'>
                                                        <label for="dv34<?php echo $row_pc["id"]; ?>"><i class="fas fa-ambulance"></i></label>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['delete_in_it'] == 1){echo "checked";} ?> id="dv35<?php echo $row_pc["id"]; ?>" name="delete_in_it" value='1'>
                                                        <label for="dv35<?php echo $row_pc["id"]; ?>"><i class='fas fa-trash-alt'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['retweet'] == 1){echo "checked";} ?> id="dv36<?php echo $row_pc["id"]; ?>" name="retweet" value='1'>
                                                        <label for="dv36<?php echo $row_pc["id"]; ?>"><i class="fas fa-retweet"></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['replace_sims_in_it'] == 1){echo "checked";} ?> id="dv37<?php echo $row_pc["id"]; ?>" name="replace_sims_in_it" value='1'>
                                                        <label for="dv37<?php echo $row_pc["id"]; ?>"><i class="fas fa-retweet"></i></label>
                                                    </li>
                                                </ol>
                                            </li>

                                            <li><a href="#" <?php if($row_pc['in_tts'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['in_tts'] == 1){echo "checked";} ?> id="dv4<?php echo $row_pc["id"]; ?>" name="in_tts" value='1'>
                                                    <label for="dv4<?php echo $row_pc["id"]; ?>">اجهزه بقطاع الدعم الفنى</label>
                                                </a>
                                                <!-- زر التعديل و النقل الخ -->
                                                <ol class="icon_auth">
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['edit_in_tts'] == 1){echo "checked";} ?> id="dv41<?php echo $row_pc["id"]; ?>" name="edit_in_tts" value='1'>
                                                        <label for="dv41<?php echo $row_pc["id"]; ?>"><i class='fas fa-edit'></i></label>
                                                    </li>
                                                    <li class="icon_auth_sub">
                                                        <input type="checkbox" <?php if($row_pc['resent_in_tts'] == 1){echo "checked";} ?> id="dv42<?php echo $row_pc["id"]; ?>" name="resent_in_tts" value='1'>
                                                        <label for="dv42<?php echo $row_pc["id"]; ?>"><i class='fas fa-reply'></i></label>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li><a href="#" <?php if($row_pc['replace_dvices'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['replace_dvices'] == 1){echo "checked";} ?> id="dv5<?php echo $row_pc["id"]; ?>" name="replace_dvices" value='1'>
                                                    <label for="dv5<?php echo $row_pc["id"]; ?>">اجهزه تم تغيير مكوناتها</label>
                                                </a></li>
                                        </ol>
                                    </li> <!-- الاجهزه -->


                                    <li class=" dropdown">
                                        <a href="#0" <?php if($row_pc['link_misin'] == 1){echo "class='dropdown-toggle yes'";}else{ echo "class='dropdown-toggle no'";} ?> href="#">
                                            <input type="checkbox" <?php if($row_pc['link_misin'] == 1){echo "checked";} ?> id="mi<?php echo $row_pc["id"]; ?>" name="link_misin" value='1'>
                                            <label for="mi<?php echo $row_pc["id"]; ?>">الماموريات</label>

                                            <i class="fas fa-suitcase"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">

                                            <li><a href="#" <?php if($row_pc['my_misin'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['my_misin'] == 1){echo "checked";} ?> id="mi1<?php echo $row_pc["id"]; ?>" name="my_misin" value='1'>
                                                    <label for="mi1<?php echo $row_pc["id"]; ?>">مامورياتى</label>
                                                </a></li>

                                                <li><a href="#" <?php if($row_pc['misins'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['misins'] == 1){echo "checked";} ?> id="mi2<?php echo $row_pc["id"]; ?>" name="misins" value='1'>
                                                    <label for="mi2<?php echo $row_pc["id"]; ?>">الماموريات</label>
                                                </a></li>

                                            <!-- <li><a href="#" <?php if($row_pc['edit_misin'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['edit_misin'] == 1){echo "checked";} ?> id="mi3<?php echo $row_pc["id"]; ?>" name="edit_misin" value='1'>
                                                    <label for="mi3<?php echo $row_pc["id"]; ?>">تعديل الماموريات</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['misin_pos'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['misin_pos'] == 1){echo "checked";} ?> id="mi4<?php echo $row_pc["id"]; ?>" name="misin_pos" value='1'>
                                                    <label for="mi4<?php echo $row_pc["id"]; ?>">ماموريه pos الهيئه</label>
                                                </a></li> -->

                                        </ol>
                                    </li> <!-- الماموريات -->


                                    <li class=" dropdown">
                                        <a <?php if($row_pc['link_user'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?> href="#">
                                            <input type="checkbox" <?php if($row_pc['link_user'] == 1){echo "checked";} ?> id="us<?php echo $row_pc["id"] ;?>" name="link_user" value='1'>
                                            <label for="us<?php echo $row_pc["id"]; ?>">المستخدمين</label>
                                            <i class="fas fas fa-user-tie"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">

                                            <!-- <li><a href="#" <?php if($row_pc['postal'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['postal'] == 1){echo "checked";} ?> id="us1<?php echo $row_pc["id"] ;?>" name="postal" value='1'>
                                                    <label for="us1<?php echo $row_pc["id"]; ?>">مستخدمين بوستال</label>
                                                </a></li>

                                            <li><a href="#" <?php if($row_pc['hewalat'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['hewalat'] == 1){echo "checked";} ?> id="us2<?php echo $row_pc["id"]; ?>" name="hewalat" value='1'>
                                                    <label for="us2<?php echo $row_pc["id"]; ?>">مستخدمين حوالات</label>
                                                </a></li> -->

                                            <li><a href="#" <?php if($row_pc['users'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['users'] == 1){echo "checked";} ?> id="us3<?php echo $row_pc["id"]; ?>" name="users" value='1'>
                                                    <label for="us3<?php echo $row_pc["id"]; ?>">صلاحيات المستخدمين</label>
                                                </a></li>

                                        </ol>
                                    </li> <!-- المستخدمين -->

                                    <!-- المراسلات -->

                                    <li class="dropdown">
                                        <a <?php if($row_pc['link_reg'] == 1){echo "class='dropdown-toggle yes'";}else{ echo "class='dropdown-toggle no'";} ?> href="#">
                                            <input type="checkbox" <?php if($row_pc['link_reg'] == 1){echo "checked";} ?> id="rg<?php echo $row_pc["id"]; ?>" name="link_reg" value='1'>
                                            <label for="rg<?php echo $row_pc["id"]; ?>">المراسلات</label>

                                            <i class="fas fa-envelope"></i>
                                        </a>
                                        <ol class="dropdown-menu show show1">
                                            <li><a href="#" <?php if($row_pc['reg_to'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['reg_to'] == 1){echo "checked";} ?> id="rg1<?php echo $row_pc["id"]; ?>" name="reg_to" value='1'>
                                                    <label for="rg1<?php echo $row_pc["id"]; ?>">تسجيل الصادر</label>
                                                </a>
                                            </li>

                                            <li><a href="#" <?php if($row_pc['to_filter'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['to_filter'] == 1){echo "checked";} ?> id="rg2<?php echo $row_pc["id"]; ?>" name="to_filter" value='1'>
                                                    <label for="rg2<?php echo $row_pc["id"]; ?>">استعلام الصادر</label>
                                                </a>
                                            </li>

                                            <!-- <li><a href="#" <?php if($row_pc['reg_to_edit'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['reg_to_edit'] == 1){echo "checked";} ?> id="rg3<?php echo $row_pc["id"]; ?>" name="reg_to_edit" value='1'>
                                                    <label for="rg3<?php echo $row_pc["id"]; ?>">تعديل الصادر</label>
                                                </a>
                                            </li> -->

                                            <li><a href="#" <?php if($row_pc['reg_in'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['reg_in'] == 1){echo "checked";} ?> id="rg4<?php echo $row_pc["id"]; ?>" name="reg_in" value='1'>
                                                    <label for="rg4<?php echo $row_pc["id"]; ?>">تسجيل الوارد</label>
                                                </a>
                                            </li>

                                            <li><a href="#" <?php if($row_pc['in_filter'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['in_filter'] == 1){echo "checked";} ?> id="rg5<?php echo $row_pc["id"]; ?>" name="in_filter" value='1'>
                                                    <label for="rg5<?php echo $row_pc["id"]; ?>">استعلام الوارد</label>
                                                </a>
                                            </li>
                                            <li><a href="#" <?php if($row_pc['reg_parcel_to'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['reg_parcel_to'] == 1){echo "checked";} ?> id="rg6<?php echo $row_pc["id"]; ?>" name="reg_parcel_to" value='1'>
                                                    <label for="rg6<?php echo $row_pc["id"]; ?>">تسجيل الطرود الصادره</label>
                                                </a>
                                            </li>

                                            <li><a href="#" <?php if($row_pc['parcel_to_filter'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['parcel_to_filter'] == 1){echo "checked";} ?> id="rg7<?php echo $row_pc["id"]; ?>" name="parcel_to_filter" value='1'>
                                                    <label for="rg7<?php echo $row_pc["id"]; ?>">استعلام الطرود الصادره</label>
                                                </a>
                                            </li>

                                            <!-- <li><a href="#" <?php if($row_pc['reg_parcel_to_edit'] == 1){echo "class='yes'";}else{ echo "class='no'";} ?>>
                                                    <input type="checkbox" <?php if($row_pc['reg_parcel_to_edit'] == 1){echo "checked";} ?> id="rg8<?php echo $row_pc["id"]; ?>" name="reg_parcel_to_edit" value='1'>
                                                    <label for="rg8<?php echo $row_pc["id"]; ?>">تعديل الطرود الصادره</label>
                                                </a>
                                            </li> -->
                                        </ol>
                                    </li> <!-- المستخدمين -->
                                    <input type="hidden" name="user_id" value="<?php echo $row_pc["id"] ; ?>">
                        <td>
                        <button type="submit" class=" btn btn-outline-secondary btn-edit" name="updat_auth">
                                <i class=""></i>تحديث</button>
                        <button type="submit" formaction="delete_user.php" formmethod="post" class=" btn btn-outline-danger btn-edit" name="delete_auth">
                                <i class=""></i>حذف</button>
                        </td>
                        </form>
                        </ul>
                        </td>
                    </tr>
                    <?php } } ?>

                </table>
            </div>
        </div>

    </div>
    <!-- start add dvice -->
    <div  class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" class="form-horizontal" action="add_user.php">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title"> اضافه مستخدم </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>

                    <div style="direction:rtl;" class="modal-body">
                        <div class="input-group">
                            <label class="control-label col-sm-2" style="text-align:center;">اسم المستخدم</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="اسم المستخدم">
                            </div>
                            <label class="control-label col-sm-2" style="text-align:center;"> رقم الملف</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="user_id" name="user_id" placeholder="رقم ملف المستخدم">
                            </div>
                            
                        </div>
                        <div class="input-group">
                            <!-- <label class="control-label col-sm-2" style="text-align:center;">الرقم القومى</label>
                            <div class="col-sm-4">
                            <input type="number" class="form-control" id="id_card" name="id_card" placeholder="id_card">
                            </div> -->
                            <label class="control-label col-sm-2" style="text-align:center;">الوظيفه</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="job" name="job">
                                    <option value=""></option>
                                    <option value="اخصائى تشغيل نظم">اخصائى تشغيل نظم</option>
                                    <option value="رئيس مجموعه">رئيس مجموعه</option>
                                </select>
                            </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name=""><i class="fas fa-check"></i>اضافه</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php   include '../setup/pass/change_password_form.php'; ?>
    <!-- end change_pass -->
    <!--start Logout Modal -->
    <?php   include '../setup/log/logout_form.php'; ?>
    <!-- end Logout Modal -->

</body>





<script>
    function edit_data(id, text, column_name) {
        $.ajax({
            url: "edit.php",
            method: "POST",
            data: {
                id: id,
                text: text,
                column_name: column_name
            },
            dataType: "text",
            success: function(data) {
                //alert(data);
                //$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }
        });
    } // end ajax  

    function delete_user(id) {
        $.ajax({
            url: "delet_user.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "text",
            success: function(data) {
                //alert(data);
                //$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }
        });
    } // end ajax  
</script>
</html>
