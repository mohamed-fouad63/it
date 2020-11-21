<?php
session_start();
include '../connection.php';
$id = $_SESSION['id'];
$it_name = $_SESSION['user_name'];
$job = $_SESSION['job'];
include '../../it/setup/session/no_session.php';
if ($job == "hg"){ header('location: not.php');}
$office_name = $_POST['office_name'];
$num_view= $_POST['num_view'];

$sql_view_misin =mysqli_query($conn, "select * FROM misin_it WHERE counter = $num_view ");
while($row_view_misin=mysqli_fetch_assoc($sql_view_misin)){
$misin_date = $row_view_misin["misin_date"];
$office_name = $row_view_misin["office_name"];
    $money_code = $row_view_misin["money_code"];
    $post_group = $row_view_misin["post_group"];
    $tel = $row_view_misin["tel"];
  $misin_type = $row_view_misin["misin_type"];
    $start_time = $row_view_misin["start_time"];
      $end_time = $row_view_misin["end_time"];
    $Network_Status = $row_view_misin["Network_Status"];
    $Network_points = $row_view_misin["Network_points"];
    $g3 = $row_view_misin["3G"];
    $ll = $row_view_misin["LL"];
    $rowcount1 = $row_view_misin["num_pc"];
    $rowcount2 = $row_view_misin["num_monitor"];
    $rowcount3 = $row_view_misin["num_printer"];
    $rowcount4 = $row_view_misin["num_pos_post"];
    $rowcount5 = $row_view_misin["num_pos_efinance"];
    $rowcount6 = $row_view_misin["num_scale"];
    $rowcount7 = $row_view_misin["num_printer_parcode"];
    $rowcount8 = $row_view_misin["num_parcode_scanner"];
    $pc_damage = $row_view_misin["pc_damage"];
    $pc_program = $row_view_misin["pc_prog"];
    $pc_os = $row_view_misin["pc_os"];
    $pc_domain = $row_view_misin["pc_domain"];
    $num_pc_domain = $row_view_misin["num_pc_domain"];
    $domain_name = $row_view_misin["domain_name"];
    $note_not_domain = $row_view_misin["note_not_domain"];
    $shm = $row_view_misin["shm"];
    $mn = $row_view_misin["mn"];
    $hf = $row_view_misin["hf"];
    $th = $row_view_misin["th"];
    $et = $row_view_misin["et"];
    $tw = $row_view_misin["tw"];
    $email = $row_view_misin["mail"];
    $bo = $row_view_misin["bo"];
    $fo = $row_view_misin["fo"];
    $khh = $row_view_misin["khh"];
    $am = $row_view_misin["am"];
    $mnsh = $row_view_misin["mnsh"];
    $hkh = $row_view_misin["hkh"];
    $des = $row_view_misin["des"];
    $toner = $row_view_misin["toner"];
    $dram = $row_view_misin["dram"];
    $keyboard = $row_view_misin["keyboard"];
    $mouse = $row_view_misin["mouse"];
    $barscan = $row_view_misin["barscan"];
    $pc = $row_view_misin["pc"];
    $monitor = $row_view_misin["monitor"];
    $printer = $row_view_misin["printer"];
    $does = $row_view_misin["does"];
    
    
}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/print_test.css">
    </head>
    <body dir="rtl">
    
    <div class="container page">
        <form method="post">
        <label style="
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 0;
    margin-top: 0;">القائم بالمرور / <?php echo $_SESSION['user_name'];  ?></label>
        <fieldset>
    <legend><span class="badge">بيانات المكتب</span></legend>
        <table class="">
    <tr>
    <th>المجموعه</th><th>اسم المكتب</th><th>الرقم المالى</th><th>التليفون</th><th>التاريخ</th><th>خطه \ بلاغ</th><th> الحضور</th><th> الانصراف</th>
    </tr>
    <tr>
     
    <td ><?php echo $post_group; ?></td><td><?php echo $office_name; ?></td><td><?php echo $money_code; ?></td><td><?php echo $tel; ?></td><td class="td100"><?php echo $misin_date ; ?></td><td><?php echo $misin_type ; ?></td><td><?php echo $start_time ; ?></td>
    <td><?php echo $end_time ; ?></td>
       
    </tr>
            </table></fieldset>
        <fieldset id="network">
    <legend><span class="badge">بيانات الشبكه</span></legend>
        <table>  
    <tr>
        <th>حاله الشبكه</th><th>هل المكتب يحتاج لنقاط شبكه</th><th>LEASD LINE</th><th>3G</th></tr>
            <tr>
        <td><?php echo $Network_Status ; ?></td><td><?php echo $Network_points ; ?></td><td><?php echo $row["LL"]; ?></td><td><?php echo $g3; ?></td>
            </tr>
            </table></fieldset>
         <fieldset id="dvice"><legend><span class="badge">حاله الاجهزه </span></legend>
        <table>
        <tr>
        <th>عدد الاجهزه</th><th>عدد الشاشات</th><th>عدد الطابعات</th><th>عدد pos البريد</th><th>عدد pos efiniance</th><th>ميزان</th><th>طابعه باركود</th><th>قارئ باركود</th></tr>
        <tr>
            <td><?php echo $rowcount1 ; ?></td><td><?php echo $rowcount2 ; ?></td><td><?php echo $rowcount3 ; ?></td><td><?php echo $rowcount4 ; ?></td><td><?php echo $rowcount5 ; ?></td><td><?php echo $rowcount6 ; ?></td><td><?php echo $rowcount7; ?></td><td><?php echo $rowcount8; ?></td>
            </tr>
             </table>
        
        <table>
            <tr>
                <th colspan="3">هل يوجد اعطال بالاجهزه</th><th colspan="3">هل تم تنزيل برامج الخدمات و البرامج المساعده و مكافح الفيروسات</th><th colspan="2">هل نظام التشغيل النسخه المعتمده من قطاع الدعم الفنى</th>
            </tr>
            <tr>
                <td colspan="3"><?php echo $pc_damage ; ?></td><td colspan="3"><?php echo $pc_program ; ?></td><td colspan="2"><?php echo $pc_os; ?></td>
            </tr>
             </table></fieldset>
        <fieldset id="domain"><legend><span class="badge"> الدومين </span></legend>
        <table>
            <tr>
            <th> الاجهزه مربوطه بالدومين ؟</th><th>عدد الاجهزه</th><th>اسم الدومين</th><th colspan="5">عدد الاجهزه خارج الدومين و السبب</th>
            </tr>
            <tr>
            <td><?php echo $pc_domain ; ?></td><td><?php echo $num_pc_domain ; ?></td><td><?php echo $domain_name; ?></td><td colspan="5"><?php echo $note_not_domain ; ?></td>
            </tr>
            </table></fieldset>
         <fieldset id="service"><legend><span class="badge"> الخدمات </span></legend>
        <table>
            
            <tr>
                <th>الشباك الموحد</th><th>مراقبه النقديه</th><th>الحوالات الفوريه</th><th>التحصيل و الاخطار</th><th>المصريه لاتصالات</th><th>منظومه الطوابع</th><th>البريد الالكترونى</th><th>باك اوفيس</th>
            </tr>
            <tr>
            <td><?php if  ($shm !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";}  ?></td><td><?php if  ($mn !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($hf!=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($th !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($et!=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($tw !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($email !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($bo !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td>
            </tr>
            <tr>
                <th>فرونت اوفيس</th><th>الخدمات الحكوميه</th><th>الاحوال المدنيه</th><th>موقع المنشورات</th><th>الحوالات الخارجيه</th><th>دفتر الاستثمار</th>
            </tr>
            <tr>
                <td><?php if  ($fo !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($khh !=''){echo "<i class='fas fa-check'></i>";}  else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($am !=''){echo "<i class='fas fa-check'></i>";}  else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($mnsh !=''){echo "<i class='fas fa-check'></i>";}  else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($hkh !=''){echo "<i class='fas fa-check'></i>";}  else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($des !=''){echo "<i class='fas fa-check'></i>";}  else {echo "<i class='fas fa-times'></i>";} ?></td>
            </tr>
             </table></fieldset>
        <fieldset id="tools"><legend><span class="badge"> مستلزمات التشغيل </span></legend>
        <table>
            <tr><th>حباره</th><th>درام</th><th>لوحه مفاتيح</th><th>ماوس</th><th>قارئ باركود</th><th>جهاز حاسب</th><th>شاشه حاسب</th><th>طابعه ليزر</th></tr>
            <tr>
                <td><?php if  ($toner !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($dram !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($keyboard !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($mouse !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($barscan !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($pc !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ; ?></td><td><?php if  ($monitor !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td><td><?php if  ($printer !=''){echo "<i class='fas fa-check'></i>";} else {echo "<i class='fas fa-times'></i>";} ?></td></tr>
            </table></fieldset>
        <table>
            <tr>
                <th colspan="">ما تم عمله</th></tr>
            <tr>
                <td colspan=""><?php echo $does ; ?></td>
            </tr></table>
            <div>
            <label style="float:right;">وكيل المكتب</label>
            <label style="">ختم المكتب</label>
            <label style="float:left;">اخصائى تشغيل نظم</label>
            </div>
             
        <div class="modal-footer">
<button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه الماموريه </button>
<button type="button" class="btn btn-warning" onclick="window.location.href='my_misin.php'" data-dismiss="modal">تم</button>
</div>
        </form>
        </div>
    </body>
</html>
