<?php
session_start();
include 'setup/session/no_session.php';
include 'connection.php';

/* start counters sql*/

$query_all_dvice = 'SELECT id FROM dvice WHERE id = :id';

$pc_all_query = $pdo->prepare($query_all_dvice);
$pc_all_query->execute(['pc']);

$monitor_all_query = $pdo->prepare($query_all_dvice);
$monitor_all_query->execute(['monitor']);

$printer_all_query = $pdo->prepare($query_all_dvice);
$printer_all_query->execute(['printer']);

$pos_all_query = $pdo->prepare($query_all_dvice);
$pos_all_query->execute(['pos']);

$query_postal_dvice = 'SELECT id FROM dvice WHERE id = "postal" AND dvice_type = :dvice_type';

$scanner_postal_query = $pdo->prepare($query_postal_dvice);
$scanner_postal_query->execute(['قارىء باركود']);

$printer_postal_query = $pdo->prepare($query_postal_dvice);
$printer_postal_query->execute(['طابعه باركود']);

$weight_postal_query = $pdo->prepare($query_postal_dvice);
$weight_postal_query->execute(['ميزان الكتروني']);

$display_postal_query = $pdo->prepare($query_postal_dvice);
$display_postal_query->execute(['شاشه عرض عملاء']);

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
/* end counters sql */
/* start display types sql*/

$query_dvice = 'SELECT id,dvice_name,COUNT(dvice_name)  FROM dvice
WHERE id = :id GROUP BY dvice_name ORDER BY COUNT(dvice_name) DESC ';

$pc_query = $pdo->prepare($query_dvice);
$pc_query->execute(['pc']);

$monitor_query = $pdo->prepare($query_dvice);
$monitor_query->execute(['monitor']);

$printer_query = $pdo->prepare($query_dvice);
$printer_query->execute(['printer']);

$pos_query = $pdo->prepare($query_dvice);
$pos_query->execute(['pos']);

$query_dvice_postal = 'SELECT id,dvice_name,COUNT(dvice_name)  FROM dvice
WHERE id = "postal" AND dvice_type = :dvice_type GROUP BY dvice_name ORDER BY COUNT(dvice_name) DESC ';

$scanner_postal_dvice = $pdo->prepare($query_dvice_postal);
$scanner_postal_dvice->execute(['قارىء باركود']);

$printer_postal_dvice = $pdo->prepare($query_dvice_postal);
$printer_postal_dvice->execute(['طابعه باركود']);

$weight_postal_dvice = $pdo->prepare($query_dvice_postal);
$weight_postal_dvice->execute(['ميزان الكتروني']);

$display_postal_dvice = $pdo->prepare($query_dvice_postal);
$display_postal_dvice->execute(['شاشه عرض عملاء']);

/* start display types sql*/

/*$query_users = 'select id ,SUBSTRING_INDEX(first_name," ",4) as first_name,job from tbl_user where job= :job';

$it_users_query = $pdo->prepare($query_users);
$it_users_query->execute(['اخصائى تشغيل نظم']);

$hg_users_query = $pdo->prepare($query_users);
$hg_users_query->execute(['رئيس مجموعه']);
*/
$query_repeat_serials = 'SELECT a.sn,a.office_name,a.dvice_name FROM dvice a
JOIN ( SELECT sn, COUNT(sn) FROM dvice WHERE sn !="" GROUP BY sn HAVING count(sn) > 1
) b ON a.sn = b.sn ORDER BY a.sn';

$repeat_serials = $pdo->prepare($query_repeat_serials);
$repeat_serials->execute();

$query_none_dvice_type = 'SELECT id,dvice_name,office_name FROM dvice WHERE dvice_type = ""';
$none_dvice_type = $pdo->prepare($query_none_dvice_type);
$none_dvice_type->execute();

$query_none_office_type = 'select * from all1 where office_type = ""';
$none_office_type = $pdo->prepare($query_none_office_type);
$none_office_type->execute();

$query_check_monitor_name = 'SELECT dvice.dvice_name FROM dvice
INNER JOIN post.dvice_type ON
 post.dvice_type.id = dvice.id
 AND post.dvice_type.dvice_name_new <> dvice.dvice_name
 AND post.dvice_type.dvice_name = dvice.dvice_name
 AND dvice.id = "monitor" ';
$check_monitor_name = $pdo->prepare($query_check_monitor_name);
$check_monitor_name->execute();
?>


<!DOCTYPE html>
<html lang="en" dir="rtl" class='scroller'>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dash board</title>
<link rel="stylesheet" href="css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="css/scrollbar.css">
<style>
        :root {
            /* start light mode */
            --body-light-bg: #F2F2F7;
            --header-light-bg: #FFFFFF;
            --light_div: #FFFFFF;
            --input-light-bg: #F0F2F5;
            --hover-light-bg: #E4E6E9;
            --scroll-light-bg: #BCC0C4;
            --icon-light-bg: #e4e6eb;
            --icon-light-color: #050505;
            --icon-light-color2: #606266;
            --icon-light-hover: #D8DADF;
            --font-light-color: #050505;
            /* end light mode */
            --cancel: #DC143C;
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
            --aside_width:200px;
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


        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            height: var(--header_height);
            width: calc( 100% - var(--aside_width) );
            background-color: var(--body-light-bg);
            padding: 0 30px;
            user-select: none;
        }
        .user_login{
        background-color: var(--body-light-bg);
        width: 160px;
        line-height: 50px;
        text-align: center;
        border-bottom: 1px solid;
        cursor: pointer;
        position: absolute;
        z-index: 2;
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
            width: var(--aside_width);
            position: fixed;
            height: 100%;
            padding-right: 20px;
            top: 0;
        }

        ._user_profile{
            position: relative;
        }
        .minmized{
            text-align:center
        }
aside.min ,main.min,.header.min{
    --aside_width:43px;
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
            top: 80px;
        }

        ._drop {
            list-style: none;
            padding: 10px 5px;
            cursor: pointer;
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
            color: var(--font-light-color);
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        ._drop_link ._drop_text {
            margin-right: 0.5rem;
        }

        ._drop_list {
            position: absolute;
            min-width: max-content;
            display: none;
            top: -10px;
            right: 150px;
            background-color: var(--hover-light-bg);
}


        ._drop_list ._drop_item {
            display:flex;
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
            margin: var(--header_height) var(--aside_width) 0 0;
            padding: 1px 16px;
            height: 1000px;
        }

        /* start main css */
._light_div{
    background-color: var(--light_div);
} 
._flex_row {  /* To create one row */
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    text-align: center;
}

._flex_col { /* To create one columne */
    display: flex;
    flex-direction: column;
    text-align: center;
}
._flex_row_4{
    flex-basis: 24%;
}
._flex_row_5{
    flex-basis: 19%;
}

._p_y1{
    padding: 1rem 0;
}
._p_y_t1{
    padding: 1rem 0 0 0;
}
._p_y_b1{
    padding: 0 0 1rem 0;
}
._p_x1{
    padding: 0 1rem;
}
._p_x05{
    padding: 0 0.5rem;
}
._m_x05 {
    margin: 0 0.5rem;
}
._m_y1{
    margin: 1rem 0;
}
 ._m1{
     margin: 1rem;
 }
._m_y_b1{
    margin:  0 0 1rem 0;
}
._m_x1{
    margin: 0 1rem;
}
._count{
font-size: 2rem;
}
 /* end main css */

            
        .flex_3{
            display: flex;
            justify-content: space-between;
        }
        .flex_3>span {
            flex-basis: 30%;
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
            direction: ltr;
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
      fieldset:not(:first-of-type){
          margin-top:10px
    }
    .sync {
    color: red;
    font-size: 30px;
    margin-right: 10px;
    }
    .sync + ._table {
        content: "m";
        position: relative;
    }
    .sync + ._table:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
    }
    ._table {
            display: table;
            margin: auto;
            width :90%;
            border-collapse: unset;
            border-spacing: 0px 2px;
        }

        ._table div {
            display: table-row;
        }

        ._table div span {
            display: table-cell;
        }
.wrong_data{
    border-bottom: 2px solid var(--gray-color);
    text-align: right;
}
.wrong_data_count{
    background-color: var(--gray-color);
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
    color:var(--cancel);
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
           background-color: var(--body-dark-bg);
        }

        body.dark-mode ._light_div {
            background-color: var(--form-dark-bg);
        }            
        body.dark-mode ._drop_list:hover,
        body.dark-mode .user:hover {
            background-color: var(--hover-dark-bg);
        }
        body.dark-mode ._drop:hover {
            background-color: var(--hover-dark-bg);
        }


        body.dark-mode ._drop_list {
            background-color: var(--hover-dark-bg);
            border: none;
        }
        body.dark-mode ._drop_link {
            color: var(--font-dark-color);
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
        @media only screen and (max-width: 600px) {}

    </style>
</head>

<body id="theme">
    <div class="container">
    <div>
        <div class="header">
             <div></div>
                <div class="brand">
                <img src="img/it1.svg" alt="الصفحه الرئيسيه">
            </div>
           
        </div>
        <aside>
            <div class="_user_profile">
            <span class="user_login">
                <div>
                    <span class="user_name"><?php echo $_SESSION['user_name'] ;?></span>
                </div>
            </span>
                <span class="user_setting">
                <div class ="_flex_row">
                     <a class="modal-button" href="#exit_modal" id="exit"></a>
                    <a class="modal-button" href="#pass_modal" id="change_pass"></a>
                    <a id='mode' onclick="themeToggle()"></a>
                </div>
            </span>
            </div>
            
            <div class="_drop_group">
                <div class="minmized"  onclick="min()"><i id = "minmized" class="fas fa-chevron-right"></i></div>
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
        </aside>
        <main>
            <div>
<fieldset class="_p_x05">
    <legend>احصائيات</legend>
                <div class="_flex_row _m_y_b1">
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>الاجهزه</h3>
                        <span class="_count"><?php echo $pc_all_query->rowCount(); ?></span>
                        <div class="_table pc_type">
                            <!--  -->
                            <?php
                            while($pc = $pc_query->fetch()){
                            echo '<div>
                                <span class="pc_name">
                                <a href="count/count_dvice.php?dvice_name='.$pc['dvice_name'].'&dvice_type= الجهاز&ip=yes" target="_blank" rel="noopener noreferrer" class="details">'.$pc['dvice_name'].'</a>
                                </span>
                                <span class="pc_count">'.$pc['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>الشاشات</h3>
                        <span class="_count"><?php echo $monitor_all_query->rowCount(); ?></span>
                        <?php
                            if($check_monitor_name->rowCount() >= 1){
                                echo '
                                <a href="updater/update_monitor_name.php" class="sync">
                                    <i class="fas fa-sync"></i>
                                </a>
                                ';}
                        ?>
                        <div class="_table monitor_type">
                            <!--  -->
                            <?php
                            while($monitor = $monitor_query->fetch()){
                            echo '<div>
                                <span class="monitor_name">
                               <a href="count/count_dvice.php?dvice_name='.$monitor['dvice_name'].'&dvice_type= الشاشه&ip=no" target="_blank" rel="noopener noreferrer" class="details">'.$monitor['dvice_name'].'</a> 
                                </span>
                                <span class="monitor_count">'.$monitor['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>الطابعات</h3>
                        <span class="_count"><?php echo $printer_all_query->rowCount(); ?></span>
                        <div class="_table printer_type">
                            <!--  -->
                            <?php
                            while($printer = $printer_query->fetch()){
                            echo '<div>
                                <span class="printer_name">
                               <a href="count/count_dvice.php?dvice_name='.$printer['dvice_name'].'&dvice_type= الطابعه&ip=yes" target="_blank" rel="noopener noreferrer" class="details">'.$printer['dvice_name'].'</a> 
                                </span>
                                <span class="printer_count">'.$printer['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>نقاط البيع</h3>
                        <span class="_count"><?php echo $pos_all_query->rowCount(); ?></span>
                        <div class="_table pos_type">
                            <!--  -->
                            <?php
                            while($pos = $pos_query->fetch()){
                            echo '<div>
                                <span class="pos_name">
                                <a href="count/count_dvice.php?dvice_name='.$pos['dvice_name'].'&dvice_type= الماكينه&ip=yes" target="_blank" rel="noopener noreferrer" class="details">'.$pos['dvice_name'].'</a>
                                </span>
                                <span class="pos_count">'.$pos['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                </div>
                <div class="_flex_row _m_y_b1">
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>قارئ باركود</h3>
                        <span class="_count"><?php echo $scanner_postal_query->rowCount(); ?></span>
                        <div class="_table pc_type">
                            <!--  -->
                            <?php
                            while($scanner_postal = $scanner_postal_dvice->fetch()){
                            echo '<div>
                                <span class="pc_name">
                                <a href="count/count_dvice.php?dvice_name='.$scanner_postal['dvice_name'].'&dvice_type= قارئ باركود&ip=no" target="_blank" rel="noopener noreferrer" class="details">'.$scanner_postal['dvice_name'].'</a>
                                </span>
                                <span class="pc_count">'.$scanner_postal['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>طابعه باركود</h3>
                        <span class="_count"><?php echo $printer_postal_query->rowCount(); ?></span>
                        <div class="_table monitor_type">
                            <!--  -->
                            <?php
                            while($printer_postal = $printer_postal_dvice->fetch()){
                            echo '<div>
                                <span class="monitor_name">
                               <a href="count/count_dvice.php?dvice_name='.$printer_postal['dvice_name'].'&dvice_type= طابعه الباركود&ip=no" target="_blank" rel="noopener noreferrer" class="details">'.$printer_postal['dvice_name'].'</a> 
                                </span>
                                <span class="monitor_count">'.$printer_postal['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>ميزان اليكترونى</h3>
                        <span class="_count"><?php echo $weight_postal_query->rowCount(); ?></span>
                        <div class="_table printer_type">
                            <!--  -->
                            <?php
                            while($weight_postal = $weight_postal_dvice->fetch()){
                            echo '<div>
                                <span class="printer_name">
                               <a href="count/count_dvice.php?dvice_name='.$weight_postal['dvice_name'].'&dvice_type= الميزان الاليكترونى&ip=no" target="_blank" rel="noopener noreferrer" class="details">'.$weight_postal['dvice_name'].'</a> 
                                </span>
                                <span class="printer_count">'.$weight_postal['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                    <div class="_flex_row_4 _light_div _p_y1">
                        <h3>شاشه عميل</h3>
                        <span class="_count"><?php echo $display_postal_query->rowCount(); ?></span>
                        <div class="_table pos_type">
                            <!--  -->
                            <?php
                            while($display_postal = $display_postal_dvice->fetch()){
                            echo '<div>
                                <span class="pos_name">
                                <a href="count/count_dvice.php?dvice_name='.$display_postal['dvice_name'].'&dvice_type= شاشه العميل&ip=no" target="_blank" rel="noopener noreferrer" class="details">'.$display_postal['dvice_name'].'</a>
                                </span>
                                <span class="pos_count">'.$display_postal['COUNT(dvice_name)'].'</span>
                            </div>';
                            }
                            ?>
                            <!--  -->
                        </div>
                    </div>
                </div>
                <div class="_flex_row _m_y_b1">
                    <div class="_flex_row_5 _light_div _p_y1">
                        <h3>مكاتب بريد</h3>
                        <span class="_count"><?php echo $post_office_query->rowCount(); ?></span>
                    </div>
                    <div class="_flex_row_5 _light_div _p_y1">
                        <h3>مراكز خدمات</h3>
                         <span class="_count"><?php echo $center_serv_query->rowCount(); ?></span>
                    </div>
                    <div class="_flex_row_5 _light_div _p_y1">
                        <h3>مناطق توزيع</h3>
                       <span class="_count"><?php echo $delivery_query->rowCount(); ?></span>
                    </div>
                    <div class="_flex_row_5 _light_div _p_y1">
                        <h3>خزينه</h3>
                        <span class="_count"><?php echo $money_safe_query->rowCount(); ?></span>
                    </div>
                    <div class="_flex_row_5 _light_div _p_y1">
                        <h3>اقسام المنطقه</h3>
                        <span class="_count"><?php echo $section_query->rowCount(); ?></span>
                    </div>
                </div>
   </fieldset>
   <fieldset class="_p_x05">
       <legend>متابعه القاعده</legend>
<div class="_flex_col _m_y_b1">
                    <div class="_light_div">
                        <div class="_table _p_y1">
                            <!--  -->
                            <div>
                                <span class="wrong_data">
                                    <a href="wrong/repeat_sn_office.php" target="_blank" rel="noopener noreferrer" class="details">رقم سريال مكرر</a>
                                </span>
                                <span class="wrong_data_count"><?php echo $repeat_serials->rowCount() ; ?></span>
                        </div>
                                <div>
                                    <span class="wrong_data">
                                         <a href="wrong/none_type_office.php" target="_blank" rel="noopener noreferrer" class="details">بدون نوع مكتب</a>
                                    </span>
                                    <span class="wrong_data_count"><?php echo $none_office_type->rowCount() ; ?></span>
                                </div>
                                <div>
                                    <span class="wrong_data">
                                    <a href="wrong/none_id.php" target="_blank" rel="noopener noreferrer" class="details">بدون نوع جهاز</a>
                                    </span>
                                    <span class="wrong_data_count"><?php echo $none_dvice_type->rowCount(); ?></span>
                                </div>
                                <div>
                                    <span class="wrong_data">
                                    <a href="wrong/pc_monitor.php" target="_blank" rel="noopener noreferrer" class="details">وجود جهاز بدون شاشه او العكس</a>
                                    </span>
                                    <span class="wrong_data_count"><?php  ?></span>
                                </div>
                        </div>
                    </span>
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
        function min() {
            var r = document.querySelector(':root');
            var rs = getComputedStyle(r);

             if(rs.getPropertyValue('--aside_width') === '200px'){
                  r.style.setProperty('--aside_width', '50px');
 
                var minmized = document.getElementById("minmized");
                minmized.classList.remove("fa-chevron-right");
                minmized.classList.add("fa-chevron-left");

                 let _drop_list =  document.getElementsByClassName('_drop_list');
                for(i = 0; i < _drop_list.length; i++) {
                    _drop_list[i].style.right = '25px';
                }
                 let _drop_text =  document.getElementsByClassName('_drop_text');
                for(i = 0; i < _drop_text.length; i++) {
                    _drop_text[i].style.display = 'none';
                }

             } else if (rs.getPropertyValue('--aside_width') === '50px'){

                var minmized = document.getElementById("minmized");
                minmized.classList.remove("fa-chevron-left");
                minmized.classList.add("fa-chevron-right");
                 r.style.setProperty('--aside_width', '200px');
                let _drop_list =  document.getElementsByClassName('_drop_list');
                for(i = 0; i < _drop_list.length; i++) {
                    _drop_list[i].style.right = '150px';
                }
                 let _drop_text =  document.getElementsByClassName('_drop_text');
                for(i = 0; i < _drop_text.length; i++) {
                    _drop_text[i].style.display = 'inherit';
                }
             }                          
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
<script>
var toggler = document.getElementsByClassName("box");
var i;

for (i = 0; i < toggler.length; i++) {
  toggler[i].addEventListener("click", function() {
    
    this.classList.toggle("check-box");
      
    this.parentElement.querySelector(".nested").classList.toggle("active");
  });
}
</script>

</body>

</html>