<?php
session_start();
include 'setup/session/no_session.php';
include 'connection.php';
$query_all_dvice = 'SELECT id FROM dvice WHERE id = :id';

$pc_all_query = $pdo->prepare($query_all_dvice);
$pc_all_query->execute(['pc']);

$monitor_all_query = $pdo->prepare($query_all_dvice);
$monitor_all_query->execute(['monitor']);

$printer_all_query = $pdo->prepare($query_all_dvice);
$printer_all_query->execute(['printer']);

$pos_all_query = $pdo->prepare($query_all_dvice);
$pos_all_query->execute(['pos']);

$query_dvice = 'SELECT id,dvice_name,COUNT(dvice_name)  FROM dvice
WHERE id = :id GROUP BY dvice_name ORDER BY COUNT(dvice_name) DESC LIMIT 10 ';

$pc_query = $pdo->prepare($query_dvice);
$pc_query->execute(['pc']);

$monitor_query = $pdo->prepare($query_dvice);
$monitor_query->execute(['monitor']);

$printer_query = $pdo->prepare($query_dvice);
$printer_query->execute(['printer']);

$pos_query = $pdo->prepare($query_dvice);
$pos_query->execute(['pos']);

$query_office = 'select office_name from all1 where office_type= :office_type';

$post_office_query = $pdo->prepare($query_office);
$post_office_query->execute(['مكتب بريد']);

$center_serv_query = $pdo->prepare($query_office);
$center_serv_query->execute(['مركز خدمات']);

$delivery_query = $pdo->prepare($query_office);
$delivery_query->execute(['منطقه توزيع']);

$money_safe_query = $pdo->prepare($query_office);
$money_safe_query->execute(['خزينه']);

$section_query = $pdo->prepare($query_office);
$section_query->execute(['قسم']);

$query_users = 'select id ,SUBSTRING_INDEX(first_name," ",4) as first_name,job from tbl_user where job= :job';

$it_users_query = $pdo->prepare($query_users);
$it_users_query->execute(['اخصائى تشغيل نظم']);

$hg_users_query = $pdo->prepare($query_users);
$hg_users_query->execute(['رئيس مجموعه']);
?>


<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dash board</title>
<link rel="stylesheet" href="css/web-fonts-with-css/css/all.css">
<style>
        :root {
            /* start light mode */
            --body-light-bg: #F2F2F7;
            --header-light-bg: #FFFFFF;
            --form-light-bg: #FFFFFF;
            --input-light-bg: #F0F2F5;
            --hover-light-bg: #E4E6E9;
            --scroll-light-bg: #BCC0C4;
            --icon-light-bg: #e4e6eb;
            --icon-light-color: #050505;
            --icon-light-color2: #606266;
            --icon-light-hover: #D8DADF;
            --font-light-color: #050505;
            /* end light mode */
            --danger: #DC143C;
            --ok: blue;
            /* start dark mode */
            --body-dark-bg: #18191A;
            --header-dark-bg: #242526;
            --form-dark-bg: #242526;
            --input-dark-bg: #3A3B3C;
            --hover-dark-bg: #303031;
            --scroll-dark-bg: #656767;
            --icon-dark-bg: #4E4F50;
            --icon-dark-color: #E7E9ED;
            --icon-dark-color2: #B8BBBF;
            --icon-dark-hover: #3A3B3C;
            --font-dark-color: #E4E6EB;
            /* end dark mode */

            --header_height: 60px;
            --menu_nav: 12%;
            --green-color: #1e9258;
            --gray-color: #8a8a8a;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            margin: 0;
            padding: 0;
            font-weight: bold;
            background-color: var(--body-light-bg);
            color: var(--font-light-color);
        }
        .container{
           
        }
        #mode::before {
            font-family: "Font Awesome 5 Free";
            content: "\f186";
        }
        #exit,#mode,#change_pass{
            font-size: 1em;
            cursor: pointer;
            transition: all 1s;
            text-decoration: none;
            color: var(--body-dark-bg);
            margin: 0 4px;
        }
        #exit::before {
            font-family: "Font Awesome 5 Free";
            content: "\f2f5";
 
        }
        #exit:hover,
        #mode:hover,
        #change_pass:hover{
        transform: translateY(5px);
        }
        #change_pass::before {
            font-family: "Font Awesome 5 Free";
            content: "\f084";
        }
        .grid_header_aside_main {
            display: grid;
            gap: 10px;
            grid-template-columns:15% auto;
            grid-template-rows: var(--header_height) auto;
        }

        .header {
            height: var(--header_height);
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 1;
            grid-row-end: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
             user-select: none;
        }
        .user_login{
        z-index: 1;
        background-color: var(--body-light-bg);
        width: 160px;
        line-height: 50px;
        text-align: center;
        border-bottom: 1px solid;
        cursor: pointer;
        }

        .user_login:hover + .user_setting {
        top: 50px;
        }
        .user_setting {
        transition: top 1s;
        border: 1px solid;
        padding: 5px;
        border-radius: 0px 0px 5px 5px;
        border-bottom: 5px solid;
        position: absolute;
        width: 160px;
        top: 10px;
        background-color: var(--body-light-bg);;
        }
                .user_setting span {
            margin: 0 5px;
        }
        .user_setting:hover {
           top: 50px;
        }
        .brand{
            height: 50px;
            width: 50px;
            display: inherit;
        }
        aside {
            grid-column-start: 1;
            grid-column-end: 2;
            grid-row-start: 1;
            grid-row-end: 3;
            height: calc(98vh - var(--header_height));
            padding-right: 20px;
        }
aside:before{
    /* content: "\f053";
    font-family: 'FONT AWESOME 5 FREE';
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border: 1px solid red;
    height: 30px;
    width: 30px; */
}

 input {
     padding:5px;
     
 }
legend {
    margin: 0 30px;
    padding: 10px 10px;
    border: 1px solid;

}

                a {
            text-decoration: none;
        }

        ._drop_group {
            position: relative;
            top: 35px;
        }

        ._drop {
            list-style: none;
            padding: 10px 5px;
            cursor: pointer;
            width: 156px;
            height: 40px;
            display: block;
        }

        ._drop:hover {
            background-color: var(--hover-light-bg);
        }

        ._drop_up,
        ._drop_end,
        ._drop_down,
        ._drop_start {
            position: relative;
        }

        ._drop_end {
            right: 0px;
            transition: right 1s;
        }


        ._drop_link {
            text-decoration: none;
            color: var(--font-color);
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        ._drop_link ._drop_icon {}

        ._drop_link ._drop_text {
            margin-right: 0.5rem;
        }

        ._drop_list {
            position: absolute;
            min-width: max-content;
            z-index: 1000;
            display: none;
            font-size: 1rem;
            color: #212529;
            text-align: right;
            background-clip: padding-box;
            border-radius: 0.25rem;
            border: none;
            top: -10px;
            right: 150px;
            background-color: var(--hover-light-bg);
        }

        ._drop_list ._drop_item {
            display: flex;
            align-items:center;
            padding: 0.25rem 1rem;
            color: var(--font-light-color);
            position: relative;
            right: 0px;
            transition: right 1s;
            height: 40px;
        }

        ._drop_list ._drop_item:hover {
            position: relative;
            right: 5px;
        }

        ._drop:hover ._drop_list {
            display: block;
        }




        *,
        *::before,
        *::after {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        main {
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 2;
            grid-row-end: 3;
        }

        .grid_dash {
            display: grid;
            grid-template-columns: 95%;
            grid-template-rows: max-content;
            justify-content: center;
        }

        .flex_4,
        .flex_5 {
            display: flex;
            text-align: center;
            margin-bottom: 10px;
            justify-content: space-around;
        }

        .flex_4>div {
            flex-basis: 24%;
            padding: 13px 0;
            border-radius: 10px;
            flex-shrink: 0;
            background-color: var(--form-light-bg);
        }

        .flex_5>div {
            flex-basis: 19%;
            padding: 13px 0;
            border-radius: 10px;
            flex-shrink: 0;
            background-color: var(--form-light-bg);
        }

        .flex_4>div>h3 {
            margin-top: 0;
            height: 25px;
            height: 25px;
        }

        .flex_4>div>span {
            font-size: 35px;

        }
                .flex_2 {
        display: flex;
        align-items: center;
            }
            
        .flex_3{
            display: flex;
            justify-content: space-between;
        }
        .flex_3>span {
            flex-basis: 30%;
        }
        .users_group {
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 1;
            grid-row-end: 6;
            height: max-content;
            /* border: 1px solid red; */
            padding: 5px 5px;
        }

        .users_group:hover{ 
        }
        .user {
            border: 1px solid #b2b2b2;
            border-radius: 0 50px 50px 0;
            cursor: pointer;
        }

        .user_it>ul,
        .user_hg>ul {
            border-right: 2px solid var(--font-light-color);
            padding: 0 5px 0 0;
        }
        .user_it h3,
        .user_hg h3 {
            margin-bottom: 5px;
        }

        .hg_users {
            grid-column-start: 2;
            grid-column-end: 3;
            grid-row-start: 2;
            grid-row-end: auto;
            background-color: var(--bg_white);
            height: max-content;

        }

        ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin: 0;
            padding: 0;

        }

        ._drop_list:hover,
        .user:hover {
            background-color: var(--hover-light-bg);
        }

        .user img {
            float: right;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            margin-left: 5px;
        }

        .pc_type,
        .monitor_type,
        .printer_type,
        .pos_type {
            margin: auto;
            direction: ltr;
            width: 90%;
            border-collapse: collapse;

        }

        .pc_name,
        .monitor_name,
        .printer_name,
        .pos_name {
            border-bottom: 2px solid var(--gray-color);
            text-align: left;
        }

        table tbody tr td {
            padding-bottom: 1px;
        }

        .pc_count,
        .monitor_count,
        .printer_count,
        .pos_count {
            background-color: var(--gray-color);
            padding: 2px;
        }
.details{
        color: var(--font-light-color);
}
        ._table {
            display: table;
            border-collapse: unset;
            border-spacing: 0px 2px;
        }

        ._table div {
            display: table-row;
        }

        ._table div span {
            display: table-cell;
        }

        ._border_dark {
            border-radius: 8px;
            box-shadow: 0 3px 8px var(--newtab-inner-box-shadow-color-nte), 0 0 2px var(--newtab-tile-shadow-secondary);
            background-color: var(--newtab-topsites-background-color);
            justify-content: center;
            margin: 0 auto;
            height: 80px;
            width: 80px;
        }

        .ellipsis {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* start modal */
                .modal {
            position: fixed;
            top: 0;
            right: 0;
            z-index: 1050;
            display: none;
            width: 100%;
            height: 100%;
            overflow: hidden;
            outline: 0;
        }
.modal-dialog{

}
        /* Modal Content */
.modal-content {
    position: absolute;
    top: 8px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    right: 25%;
    padding: 10px;
    width: max-content;
    background: var(--body-light-bg);
}
.modal-footer{
    margin-top: 10px;
}
.fa-times:before{
    color:var(--danger);
}
.fa-check {
    color :var(--ok)
}
.flex-center {
    display: flex;
    align-content: center;
    justify-content: center;
}
.btn {
    padding: 0.375rem 0.75rem;
    cursor: pointer;
    margin: 0 10px;
}

        /* end modal */
        /*start dark mode css */

        body.dark-mode ,
        body.dark-mode .user_login ,
        body.dark-mode .user_setting
         {
            background-color: var(--body-dark-bg);
            color: var(--font-dark-color)
        }

        body.dark-mode .header {
           
        }

        body.dark-mode ._drop_list:hover,
        body.dark-mode .user:hover {
            background-color: var(--hover-dark-bg);
        }
        body.dark-mode ._drop:hover {
            background-color: var(--hover-dark-bg);
        }

        body.dark-mode .flex_4>div,
        body.dark-mode .flex_5>div {
            background-color: var(--form-dark-bg);
        }

        body.dark-mode ._drop_list {
            background-color: var(--hover-dark-bg);
            border: none;
        }

        body.dark-mode ._drop_list ._drop_item,body.dark-mode .details
         {
            color: var(--font-dark-color);
        }
        body.dark-mode #mode::before {
            font-family: "Font Awesome 5 Free";
            content: "\f185";
            cursor: pointer;
        }
body.dark-mode #exit,body.dark-mode #mode,body.dark-mode #change_pass{
    color: var(--font-dark-color);
}
        body.dark-mode .user {
            border: 1px solid #3e3e3e;
        }

        body.dark-mode .user_it>ul,
        body.dark-mode .user_hg>ul {
            border-right: 2px solid var(--font-dark-color);
        }
 body.dark-mode .modal .modal-content{
        color: var(--font-light-color);
} 
        /*end dark mode css */
        @media only screen and (max-width: 600px) {
  body {
    background-color: red;
  }
          .grid_header_aside_main {
            display: grid;
            gap: 10px;
            grid-template-columns:auto;
            grid-template-rows: var(--header_height) auto;
        }
        .flex_4, .flex_5 {
    flex-wrap: wrap;
}
aside{
    display: none;
}
main {
    grid-column-start: -2;}
.flex_4>div {
    flex-basis: 50%;
    padding: 13px 0;
    border-radius: 10px;
    flex-shrink: 0;
    background-color: var(--form-light-bg);
}

}
    </style>
</head>

<body id="theme">
    <div class="container">
    <div class="grid_header_aside_main">
        <div class="header">
             <div></div>
                <div class="brand">
                <img src="img/it1.svg" alt="الصفحه الرئيسيه">
            </div>
           
        </div>
        <aside class="sidbar_right">
            <div class="flex_2">
            <span class="user_login ellipsis">
                <div>
                    <span class="user_name"><?php echo $_SESSION['user_name'] ;?></span>
                </div>
            </span>
                <span class="user_setting">
                <div class ="flex_3">
                     <a class="modal-button" href="#exit_modal" id="exit"></a>
                    <a class="modal-button" href="#pass_modal" id="change_pass"></a>
                    <a id='mode' onclick="themeToggle()"></a>
                </div>
            </span>
            </div>
            <div class="_drop_group">
            <?php if ($_SESSION['link_dvice'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                             <span class="_drop_icon"><i class="fas fa-laptop"></i></span>
                             <span class="_drop_text">الاجهزه</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['all_dvices'] == 1) { ?>
                            <li><a class="_drop_item" href="record/all_dvices.php">اجهزه المكاتب</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['post'] == 1) { ?>
                            <li><a class="_drop_item" href="post/post.php">اجهزه مكتب</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['in_it'] == 1) { ?>
                            <li><a class="_drop_item" href="in_it/in_it.php">اجهزه بالدعم الفنى</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['in_tts'] == 1) { ?>
                            <li><a class="_drop_item" href="in_tts/in_tts.php">اجهزه بقطاع الدعم الفنى</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['replace_dvices'] == 1) { ?>
                            <li><a class="_drop_item" href="record/replace_dvices.php">اجهزه تم تغيير مكوناتها</a>
                            </li><?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_misin'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span class="_drop_icon"><i class="fas fa-suitcase"></i></span>
                            <span class="_drop_text">الماموريات</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['my_misin'] == 1) { ?>
                            <li><a class="_drop_item" href="misin/my_misin.php">مامورياتى</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['misins'] == 1) { ?>
                            <li><a class="_drop_item" href="misin/missin.php">الماموريات</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['misins'] == 1) { ?>
                            <li><a class="_drop_item" href="misin/misin_online.php">ماموريات تحت الانتظار</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_reg'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span><i class="fas fa-envelope"></i></span>
                            <span class="_drop_text">المراسلات</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['reg_to'] == 1) { ?>
                            <li><a class="_drop_item" href="reg/to/to.php">تسجيل الصادر</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['to_filter'] == 1) { ?>
                            <li><a class="_drop_item" href="reg/to/to_filter.php">استعلام الصادر</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['reg_in'] == 1) { ?>
                            <li><a class="_drop_item" href="reg/in/in.php">تسجيل الوارد</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['in_filter'] == 1) { ?>
                            <li><a class="_drop_item" href="reg/in/in_filter.php">استعلام الوارد</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['reg_parcel_to'] == 1) { ?>
                            <li><a class="_drop_item" href="reg/parcel/parcel_to.php">تسجيل الطرود الصادره</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['parcel_to_filter'] == 1) { ?>
                            <li><a class="_drop_item" href="reg/parcel/parcel_to_filter.php">استعلام الطرود الصادره</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_record'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span class="_drop_icon"><i class="fas fa-book-open"></i></span>
                            <span class="_drop_text">السجلات</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['Incoming'] == 1) { ?>
                            <li><a class="_drop_item" href="record/Incoming.php"> سجل الصيانه</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['move_dvices'] == 1) { ?>
                            <li><a class="_drop_item" href="record/move.php">سجل المنقول</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['deleted_dvices'] == 1) { ?>
                            <li><a class="_drop_item" href="record/deleted.php">سجل التكهين</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['all_misin'] == 1) { ?>
                            <li><a class="_drop_item" href="record/all_misin.php"> سجل التحركات</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['all_misin'] == 1) { ?>
                            <li><a class="_drop_item" href="record/vacation.php"> سجل الاجازات و الراحات</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['notice'] == 1) { ?>
                            <li><a class="_drop_item" href="record/notice.php"> سجل البلاغات</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_user'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span><i class="fas fas fa-user-tie"></i></span>
                            <span class="_drop_text">المستخدمين</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['users'] == 1) { ?>
                            <li><a class="_drop_item" href="users/user_auth.php">صلاحيات المستخدمين</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_office_group'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span class="_drop_icon"><i class="fas fa-broadcast-tower"></i></span>
                            <span class= "_drop_text">المكاتب</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['edit_office'] == 1) { ?>
                            <li><a class="_drop_item" href="office_group/update/edit_office.php"> تعديل مكتب / قسم</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['add_office'] == 1) { ?>
                            <li><a class="_drop_item" href="office_group/add/add_office.php"> اضافه مكتب / قسم</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['office_group'] == 1) { ?>
                            <li><a class="_drop_item" href="office_group/group/office_group.php">مجموعات بريديه</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_network'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span class="_drop_icon"><i class="fas fa-building"></i></span>
                            <span class="_drop_text">شبكات</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['sims'] == 1) { ?>
                            <li><a class="_drop_item" href="network/sims.php">الشرائح المتوفره</a></li>
                            <?php } ?>
                            <?php if ($_SESSION['replace_sims'] == 1) { ?>
                            <li><a class="_drop_item" href="network/replace_sims.php">سجل تغيير شرائح</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>
            <?php if ($_SESSION['link_count_wrong'] == 1) { ?>
                <ul class="_drop">
                    <li class="_drop_end">
                        <a href="#0" class="_drop_link">
                            <span class="_drop_icon"><i class="fas fa-database"></i></span>
                            <span class="_drop_text">متابعه القاعده</span>
                        </a>
                        <ul class="_drop_list">
                            <?php if ($_SESSION['wrong'] == 1) { ?>
                            <li><a class="_drop_item" href="wrong/wrong.php">اخطاء</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php } ?>
        </aside>
        <main>
            <div class="grid_dash">
<fieldset>
    <legend>احصائيات</legend>
                <div class="flex_4 count_dvice">
                    <div class="pc">
                        <h3>الاجهزه</h3>
                        <span><?php echo $pc_all_query->rowCount(); ?></span>
                        <div class="_table pc_type">
                            <!--  -->
                            <?php
                            while($pc = $pc_query->fetch()){
                            echo '<div>
                                <span class="pc_name">'.$pc['dvice_name'].'</span>
                                <span class="pc_count">'.$pc['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="monitor">
                        <h3>الشاشات</h3>
                        <span><?php echo $monitor_all_query->rowCount(); ?></span>
                        <div class="_table monitor_type">
                            <!--  -->
                            <?php
                            while($monitor = $monitor_query->fetch()){
                            echo '<div>
                                <span class="monitor_name">'.$monitor['dvice_name'].'</span>
                                <span class="monitor_count">'.$monitor['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="printer">
                        <h3>الطابعات</h3>
                        <span><?php echo $printer_all_query->rowCount(); ?></span>
                        <div class="_table printer_type">
                            <!--  -->
                            <?php
                            while($printer = $printer_query->fetch()){
                            echo '<div>
                                <span class="printer_name">'.$printer['dvice_name'].'</span>
                                <span class="printer_count">'.$printer['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="pos">
                        <h3>نقاط البيع</h3>
                        <span><?php echo $pos_all_query->rowCount(); ?></span>
                        <div class="_table pos_type">
                            <!--  -->
                            <?php
                            while($pos = $pos_query->fetch()){
                            echo '<div>
                                <span class="pos_name">
                                <a href="count/count_pos.php?pos='.$pos['dvice_name'].'" target="_blank" rel="noopener noreferrer" class="details">'.$pos['dvice_name'].'</a>
                                </span>
                                <span class="pos_count">'.$pos['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                </div>
                <div class="flex_5 count_office">
                    <div class="pos_office">
                        <h3>مكاتب بريد</h3>
                        <span><?php echo $post_office_query->rowCount(); ?></span>
                    </div>
                    <div class="services_center">
                        <h3>مراكز خدمات</h3>
                         <span><?php echo $center_serv_query->rowCount(); ?></span>
                    </div>
                    <div class="provider">
                        <h3>مناطق توزيع</h3>
                       <span><?php echo $delivery_query->rowCount(); ?></span>
                    </div>
                    <div class="money_office">
                        <h3>خزينه</h3>
                        <span><?php echo $money_safe_query->rowCount(); ?></span>
                    </div>
                    <div class="money_office">
                        <h3>اقسام المنطقه</h3>
                        <span><?php echo $section_query->rowCount(); ?></span>
                    </div>
                </div>
   </fieldset>
            </div>
        </main>
    </div>
</div>
    <div id="exit_modal" class="modal">

        <div class="modal-dialog">
            <div class="modal-content py-3 px-3">
                <h4  class="modal-title">هل تريد تسجيل الخروج ؟</h4>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <div class="flex-center">
                <a href="../../../it/setup/log/logout.php" class="btn">
                    <i class="fas fa-check"></i></a>
                <a class="btn close">
                    <i class="fas fa-times"></i></a>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div id="pass_modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">تغيير كلمه المرور</h4>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <label class="form-label col-sm-2" for="name">الحاليه</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control my-1" name="current_password" required="" placeholder="كلمه المرور الحاليه" autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="form-label col-sm-2" for="name">الجديده</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control my-1" name="new_password" required="" placeholder="كلمه المرور الجديده" autocomplete="off" aria-autocomplete="list">
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="form-label col-sm-2" for="name">تأكيد</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control my-1" name="repeat_password" required="" placeholder="تأكيد" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="flex-center">
                        <button class="btn" type="submit" name="change_pass"> <i class="fas fa-check"></i></button>
                        <button class="btn close" type="button"> <i class="fas fa-times"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
 <?php if(isset($_POST['change_pass'])){ include 'setup/pass/change_password_pdo.php';}?>
    <script>
        function mode() {
            var element = document.body;
            element.classList.toggle("dark-mode");
        }
    </script>

    <script>
            // Get the button that opens the modal
var btn = document.querySelectorAll("a.modal-button");

// All page modals
var modals = document.querySelectorAll('.modal');

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
    }
 }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
     }
    }
}
        </script>
        <script>
 var element = document.body;
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
      let theme_mode = getCookie("theme_mode");
  if (theme_mode == "dark-mode") {
        
    element.classList.add('dark-mode');
  } 
}
window.onload = checkCookie();

function themeToggle(){
     element.classList.toggle("dark-mode");
theme = document.getElementById('theme').classList.value; // get classname
setCookie('theme_mode', theme, '365');
}
        </script>
</body>

</html>