<?php
session_start();
include '../setup/session/no_session.php';
include '../connection.php';
// حساب عدد الاجهزه
$query_count_pc=mysqli_query($conn, "select * from dvice where  id like 'pc'");
$rowcount_count_pc=mysqli_num_rows($query_count_pc);
// حساب عدد الاجهزه بالمكاتب
$query_count_pc_in_office=mysqli_query($conn, "select * from dvice where id like 'pc' and note = ''");
$rowcount_count_pc_in_office=mysqli_num_rows($query_count_pc_in_office);
// حساب عدد الاجهزه بقسم الدعم الفنى
$query_count_pc_in_it=mysqli_query($conn, "select * from dvice where id like 'pc' and note like 'بقسم الدعم الفنى'");
$rowcount_count_pc_in_it=mysqli_num_rows($query_count_pc_in_it);
// حساب عدد الاجهزه بقطاع الدعم الفنى
$query_count_pc_in_tts=mysqli_query($conn, "select * from dvice where id like 'pc' and note like 'بقطاع الدعم الفنى بالقاهره'");
$rowcount_count_pc_in_tts=mysqli_num_rows($query_count_pc_in_tts);
// حساب عدد اجهزه المنطقه
$query_count_pc_in_manteqa=mysqli_query($conn, "select a.office_name,a.sn,a.id,b.office_type,b.office_name from dvice a inner join all1 b on a.office_name = b.office_name and b.office_type like 'قسم' and b.post_group = 'المنطقه' and a.id = 'pc'
");
$rowcount_count_pc_in_manteqa=mysqli_num_rows($query_count_pc_in_manteqa);
// حساب عدد اجهزه القطاع
$query_count_pc_in_ketaa=mysqli_query($conn, "select a.office_name,a.sn,a.id,b.office_type,b.office_name from dvice a inner join all1 b on a.office_name = b.office_name and b.office_type like 'قطاع شرق الدلتا' and a.id = 'pc'
");
$rowcount_count_pc_in_ketaa=mysqli_num_rows($query_count_pc_in_ketaa);
// حساب عدد اجهزه مراكز الخدمات
$query_count_pc_in_markaz_khdmat=mysqli_query($conn, "select a.office_name,a.sn,a.id,b.office_type,b.office_name from dvice a inner join all1 b on a.office_name = b.office_name and b.office_type like 'مركز خدمات' and a.id = 'pc'
");
$rowcount_count_pc_in_markaz_khdmat=mysqli_num_rows($query_count_pc_in_markaz_khdmat);
// حساب عدد اجهزه مكاتب البريد
$query_count_pc_in_maktab_bareed=mysqli_query($conn, "select a.office_name,a.sn,a.id,b.office_type,b.office_name from dvice a inner join all1 b on a.office_name = b.office_name and b.office_type like 'مكتب بريد' and a.id = 'pc'
");
$rowcount_count_pc_in_maktab_bareed=mysqli_num_rows($query_count_pc_in_maktab_bareed);
// حساب عدد اجهزه مركز حركه الزقازيق
$query_count_pc_in_markaz_harka=mysqli_query($conn, "select a.office_name,a.sn,a.id,b.office_type,b.office_name from dvice a inner join all1 b on a.office_name = b.office_name  and b.post_group = 'مركز حركه الزقازيق' and a.id = 'pc'
");
$rowcount_count_pc_in_markaz_harka=mysqli_num_rows($query_count_pc_in_markaz_harka);
// حساب عدد الشاشات
$query_count_monitor=mysqli_query($conn, "select * from dvice where  id like 'MONITOR'");
$rowcount_count_monitor=mysqli_num_rows($query_count_monitor);
// حساب عدد الشاشات بالمكاتب
$query_count_monitor_in_office=mysqli_query($conn, "select * from dvice where id like 'MONITOR' and note = ''");
$rowcount_count_monitor_in_office=mysqli_num_rows($query_count_monitor_in_office);
// حساب عدد الشاشات بقسم الدعم الفنى
$query_count_monitor_in_it=mysqli_query($conn, "select * from dvice where id like 'MONITOR' and note like 'بقسم الدعم الفنى'");
$rowcount_count_monitor_in_it=mysqli_num_rows($query_count_monitor_in_it);
// حساب عدد الشاشات بقطاع الدعم الفنى
$query_count_monitor_in_tts=mysqli_query($conn, "select * from dvice where id like 'MONITOR' and note like 'بقطاع الدعم الفنى بالقاهره'");
$rowcount_count_monitor_in_tts=mysqli_num_rows($query_count_monitor_in_tts);
// حساب عدد الطابعات
$query_count_printer=mysqli_query($conn, "select * from dvice where  id like 'PRINTER'");
$rowcount_count_printer=mysqli_num_rows($query_count_printer);
// حساب عدد الطابعات بالمكاتب
$query_count_printer_in_office=mysqli_query($conn, "select * from dvice where id like 'PRINTER' and note = ''");
$rowcount_count_printer_in_office=mysqli_num_rows($query_count_printer_in_office);
// حساب عدد الطابعات بقسم الدعم الفنى
$query_count_printer_in_it=mysqli_query($conn, "select * from dvice where id like 'PRINTER' and note like 'بقسم الدعم الفنى'");
$rowcount_count_printer_in_it=mysqli_num_rows($query_count_printer_in_it);
// حساب عدد الطابعات بقطاع الدعم الفنى
$query_count_printer_in_tts=mysqli_query($conn, "select * from dvice where id like 'PRINTER' and note like 'بقطاع الدعم الفنى بالقاهره'");
$rowcount_count_printer_in_tts=mysqli_num_rows($query_count_printer_in_tts);
// حساب طابعات اجهزه المنطقه
$query_count_printer_in_manteqa=mysqli_query($conn, "select b.office_name,b.sn,a.post_group FROM all1 a inner join dvice b on a.post_group = 'المنطقه' and b.id = 'printer' and a.office_name = b.office_name
");
$rowcount_count_printer_in_manteqa=mysqli_num_rows($query_count_printer_in_manteqa);
// حساب طابعات اجهزه القطاع
$query_count_printer_in_ketaa=mysqli_query($conn, "select b.office_name,b.sn,a.post_group FROM all1 a inner join dvice b on a.post_group = 'قطاع شرق الدلتا' and b.id = 'printer' and a.office_name = b.office_name
");
$rowcount_count_printer_in_ketaa=mysqli_num_rows($query_count_printer_in_ketaa);
// عدد ماكينات p576
$query_e_pos_675=mysqli_query($conn, "select * from dvice where dvice_name like 'VERIFONE VX 675'");
$rowcount_e_pos_675=mysqli_num_rows($query_e_pos_675);
// عدد 520
$query_e_pos_520=mysqli_query($conn, "select * from dvice where dvice_name like 'VERIFONE VX 520'");
$rowcount_e_pos_520=mysqli_num_rows($query_e_pos_520);
// عدد pos الهيئه
$query_post_pos=mysqli_query($conn, "select * from dvice where
dvice_name = 'VERIFONE VX 510'");
$rowcount_post_pos=mysqli_num_rows($query_post_pos);
// عدد pos bitel 3600
$query_3600_pos=mysqli_query($conn, "select * from dvice where
dvice_name = 'BITEL IC3600'");
$rowcount_3600_pos=mysqli_num_rows($query_3600_pos);
// عدد مكاتب البريد
$query_maktab_bareed=mysqli_query($conn, "select * from all1 where office_type= 'مكتب بريد'");
$rowcount_maktab_bareed=mysqli_num_rows($query_maktab_bareed);
// عدد  مراكز الخدمات
$query_markaz_khdmat=mysqli_query($conn, "select * from all1 where office_type= 'مركز خدمات'");
$rowcount_markaz_khdmat=mysqli_num_rows($query_markaz_khdmat);
// عدد  مناطق التوزيع
$query_manteka_tawzee=mysqli_query($conn, "select * from all1 where office_type= 'منطقه توزيع'");
$rowcount_manteka_tawzee=mysqli_num_rows($query_manteka_tawzee);
// عدد  منافذ معاشات
$query_manfaz_maashat=mysqli_query($conn, "select * from all1 where office_type= 'منفذ معاشات'");
$rowcount_manfaz_maashat=mysqli_num_rows($query_manfaz_maashat);
// عدد الاقسام
$query_قسم_منطقه=mysqli_query($conn, "select * from all1 where office_type= 'قسم' and post_group = 'المنطقه'");
$rowcount_قسم_منطقه=mysqli_num_rows($query_قسم_منطقه);
//بمركز حركه الزقازيق عدد الاقسام
$query_قسم_مركز_حركه=mysqli_query($conn, "select * from all1 where office_type= 'قسم' and post_group = 'مركز حركه الزقازيق'");
$rowcount_قسم_مركز_حركه=mysqli_num_rows($query_قسم_مركز_حركه);
// عدد  مكاتب  الحركه
$query_مكتب_حركه=mysqli_query($conn, "select * from all1 where office_type= 'مكتب حركه'");
$rowcount_مكتب_حركه=mysqli_num_rows($query_مكتب_حركه);
// عدد  مكاتب  السفريات
$query_مكتب_سفريات=mysqli_query($conn, "select * from all1 where office_type= 'مكتب سفريات'");
$rowcount_مكتب_سفريات=mysqli_num_rows($query_مكتب_سفريات);
// عدد الشبكات الاسلكيه
$query3g=mysqli_query($conn, "select * from dvice where  dvice_type = 'روتر هوائى'");
$rowcount_3g=mysqli_num_rows($query3g);
// عدد الشبكات الارضيه
$queryll=mysqli_query($conn, "select * from dvice where  dvice_type = 'روتر ارضى'");
$rowcount_ll=mysqli_num_rows($queryll);
// عدد المكاتب المربوطه
$queryll_3g=mysqli_query($conn, "select * from all1 where  LL != '' AND  3G != '' ");
$rowcount_ll_3g=mysqli_num_rows($queryll_3g);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>الصفحه الرئيسيه</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css4/bootstrap.min.css">
        <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
        <link rel="stylesheet" href="../css/count.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js4/bootstrap.min.js"></script>
        <style>
            body {
                overflow: auto;
            }
        .navbar {
            max-height: 60px;
        }
            .row {
            margin-bottom: 10px;
            }
        .accordion {
            width: 30%;
           float: right;

        }
            .btn {
                width: 100%;
            }
            .btn:hover {
                cursor: default;
            }
            .details {

                float: right;
                animation: anim 2s infinite;
            }
            @keyframes anim {
              0% ,100%  {color: #fed330;}
              50%  {color: #fd9644;}

            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h1>احصائيات</h1>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapsepc" aria-expanded="true" aria-controls="collapsepc">
                                    <i class="fas fa-mobile-alt"></i>
                                    <label>عدد الاجهزه</label>
                                    <span class="badge"><?php echo $rowcount_count_pc?></span>
                                    <a href="count_pc.php" class="details">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </button>
                            </div>
                            <div id="collapsepc" class="collapse1" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                   <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الاجهزه بالمكاتب</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_office ; ?></span>
                                        </a>
                                    </li>
                                   <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الاجهزه بقسم الدعم الفنى</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_it ; ?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الاجهزه بقطاع الدعم الفنى</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_tts ; ?></span>
                                        </a>
                                    </li>
                                    <!--<li class="item" id="profile">
                                        <a href=""  class="btn">

                                            <label>عدد اجهزه المنطقه</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_manteqa?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">

                                            <label>عدد اجهزه القطاع</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_ketaa?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">

                                            <label>عدد اجهزه مراكز الخدمات</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_markaz_khdmat?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">

                                            <label>عدد اجهزه مكاتب البريد</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_maktab_bareed?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">

                                            <label>عدد اجهزه مركز حركه الزقازيق</label>
                                            <span class="badge"><?php echo $rowcount_count_pc_in_markaz_harka?></span>
                                        </a>
                                    </li>-->
                                </div>
                            </div>
                        </div>
        </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">

                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapsepcmonitor" aria-expanded="true" aria-controls="collapsemonitor">
                                        <i class="fas fa-desktop"></i>
                                        <label>عدد الشاشات</label>
                                        <span class="badge"><?php echo $rowcount_count_monitor ;?></span>
                                        <a href="count_monitor.php" class="details">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                    </button>

                            </div>
                            <div id="collapsepcmonitor" class="collapse1" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                   <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الشاشات بالمكاتب</label>
                                            <span class="badge"><?php echo $rowcount_count_monitor_in_office ; ?></span>
                                        </a>
                                    </li>
                                   <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الشاشات بقسم الدعم الفنى</label>
                                            <span class="badge"><?php echo $rowcount_count_monitor_in_it ; ?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الشاشات بقطاع الدعم الفنى</label>
                                            <span class="badge"><?php echo $rowcount_count_monitor_in_tts ; ?></span>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
        </div>
                    <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseprinter" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-print"></i>
                                    <label>عدد الطابعات</label>
                                    <span class="badge"><?php echo $rowcount_count_printer?></span>
                                    <a href="count_printer.php" class="details">
                                        <i class="fas fa-clipboard-list"></i>
                                    </a>
                                </button>
                        </div>
                        <div id="collapseprinter" class="collapse1" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                               <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الطابعات بالمكاتب</label>
                                            <span class="badge"><?php echo $rowcount_count_printer_in_office ; ?></span>
                                        </a>
                                    </li>
                                   <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الطابعات بقسم الدعم الفنى</label>
                                            <span class="badge"><?php echo $rowcount_count_printer_in_it ; ?></span>
                                        </a>
                                    </li>
                                    <li class="item" id="profile">
                                        <a href=""  class="btn">
                                            <label>عدد الطابعات بقطاع الدعم الفنى</label>
                                            <span class="badge"><?php echo $rowcount_count_printer_in_tts ; ?></span>
                                        </a>
                                    </li>
                                <!--<li class="item" id="profile">
                                    <a href=""  class="btn">
                                        <i class="fas fa-print"></i>
                                        <label>عدد طابعات المنطقه</label>
                                        <span class="badge"><?php echo $rowcount_count_printer_in_manteqa?></span>
                                    </a>
                                </li>
                                <li class="item" id="profile">
                                    <a href=""  class="btn">
                                        <i class="fas fa-print"></i>
                                        <label>عدد طابعات القطاع</label>
                                        <span class="badge"><?php echo $rowcount_count_printer_in_ketaa?></span>
                                    </a>
                                </li>-->
                            </div>
                        </div>
                    </div>
        </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne11">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse_pos" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-money-bill-alt"></i>
                                    <label>عدد POS</label>
                                    <span class="badge"><?php echo "***"?></span>
                                </button>
                            </div>
                            <div id="collapse_pos" class="collapse1" aria-labelledby="headingOne11" data-parent="#accordionExample">
                                <div class="card-body">
                                    <li class="item" id="setting">
                                        <div class="btn">
                                            <i class="fas fa-money-bill-alt"></i>
                                            <label>عدد ماكينات p 675</label>
                                            <span class="badge"><?php echo $rowcount_e_pos_675?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">
                                            <i class="fas fa-money-bill-alt"></i>
                                            <label>عدد ماكينات p 520</label>
                                            <span class="badge"><?php echo $rowcount_e_pos_520?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <label>عدد ماكينات p 510</label>
                                            <span class="badge"><?php echo $rowcount_post_pos?></span>
                                            <a href="count_post_pos.php" class="details">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <label>عدد ماكينات BITEL IC3600</label>
                                            <span class="badge"><?php echo $rowcount_3600_pos?></span>
                                            <a href="count_3600_pos.php" class="details">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne11">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse_office" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="far fa-building"></i>
                                    <label>عدد المكاتب</label>
                                    <span class="badge"><?php echo "***"?></span>
                                </button>
                            </div>
                            <div id="collapse_office" class="collapse1" aria-labelledby="headingOne11" data-parent="#accordionExample">
                                <div class="card-body">
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد مكاتب البريد</label>
                                            <span class="badge"><?php echo $rowcount_maktab_bareed?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد مراكز الخدمات</label>
                                            <span class="badge"><?php echo $rowcount_markaz_khdmat?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد مناطق التوزيع</label>
                                            <span class="badge"><?php echo $rowcount_manteka_tawzee?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد منافذ معاشات </label>
                                            <span class="badge"><?php echo $rowcount_manfaz_maashat?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد اقسام المنطقه </label>
                                            <span class="badge"><?php echo $rowcount_قسم_منطقه ?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد اقسام مركز حركه الزقازيق </label>
                                            <span class="badge"><?php echo $rowcount_قسم_مركز_حركه ?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد مكاتب الحركه </label>
                                            <span class="badge"><?php echo $rowcount_مكتب_حركه ?></span>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">

                                            <label>عدد مكاتب السفريات </label>
                                            <span class="badge"><?php echo $rowcount_مكتب_سفريات ?></span>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne11">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapse_network" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-network-wired"></i>
                                    <label>شبكات المكاتب</label>
                                    <span class="badge"><?php echo "***"?></span>
                                </button>
                            </div>
                            <div id="collapse_network" class="collapse1" aria-labelledby="headingOne11" data-parent="#accordionExample">
                                <div class="card-body">
                                    <li class="item" id="setting">
                                    <div class="btn">
                                        <i class="fas fa-broadcast-tower"></i>
                                        <label>عدد مكاتب الشبكات الاسلكيه</label>
                                        <span class="badge"><?php echo $rowcount_3g?></span>
                                        <a href="count_3g.php" class="details">
                                            <i class="fas fa-clipboard-list"></i>
                                        </a>
                                    </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">
                                            <i class="fas fa-network-wired"></i>
                                            <label>عدد مكاتب الشبكات الارضيه</label>
                                            <span class="badge"><?php echo $rowcount_ll?></span>
                                            <a href="count_ll.php" class="details">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="item" id="setting">
                                        <div class="btn">
                                            <i class="fas fa-project-diagram"></i>
                                            <label>عدد مكاتب الشبكات المربوطه</label>
                                            <span class="badge"><?php echo $rowcount_ll_3g?></span>
                                            <a href="count_ll_3g.php" class="details">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a>
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </body>
</html>
