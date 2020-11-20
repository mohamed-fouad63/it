<?php
session_start();
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];
$session_id = $_SESSION['id'];
include '../../it/setup/session/no_session.php';
if ($job == "hg"){ header('location: not.php');}
include '../connection.php';
$query_post_group = mysqli_query($conn, "SELECT office_name FROM dvice GROUP BY office_name HAVING COUNT(*) >= 1");
date_default_timezone_set('Africa/Cairo');
?>
<html>
<head>
        <link rel="stylesheet" href="../css4/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/typeahead.css">
    <link rel="stylesheet" href="../css/header_nav.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js4/bootstrap.min.js"></script>
    <script src="../js/typeahead.min.js"></script>
<style>
.w13 {
width: 13.5%;
position: relative;
/* min-height: 1px; */
/* padding-right: 15px; */
padding-left: 15px;
float: right;
text-align: center;
}
input[type="checkbox"]{
display: none;
}
.card-heading {
min-height: 65px;
text-align: center;
}
.checkmark {
position: absolute;
top: 60%;
left: 40%;
height: 25px;
width: 25px;
background-color: #eee;
border: 1px solid #ED3;
}
.checkmark:after {
content: "";
position: absolute;
display: inline-block;
}
input:checked ~ .checkmark {
background-color: #2196F3;
}
input:checked ~ .checkmark:after {
display: block;
left: 9px;
top: 5px;
width: 5px;
height: 10px;
border: solid white;
border-width: 0 3px 3px 0;
-webkit-transform: rotate(45deg);
-ms-transform: rotate(45deg);
transform: rotate(45deg);
}
.list {
direction: rtl;
font-weight: bold;
font-size: 18px;
border: 1px solid green;

text-align: center;
}
.trans {
-webkit-transition: display 2s; /* For Safari 3.1 to 6.0 */
transition: display 22s;
}
    textarea {
        font-weight: bold;
        padding: 4px 12px;
        font-size: 18px;
    }
	fieldset{display:none;}
    @media (min-width: 576px){
.col-sm-2 {
    
    min-width: 16.666667%;}}
</style>
</head>
<body dir="rtl" style="text-align: center;">
<div class="" id="add_misin">
<form method="POST" class="form-horizontal"  action="misin_report.php" target="_top">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
    <a href="notice.php">
       <button type="button" class="close" data-dismiss="modal">&times;</button></a>
<h4 class="modal-title">اضافه بلاغ جديد</h4>
</div>
<div class="modal-body">
<!--<input style="display:none" type="text" name="pc_move_num" id="pc_move_num" placeholder="pc_move_num">-->
<!-- start first --> 

   
    <span class="badge">بيانات المكتب</span>
<div class="input-group">

<label class="control-label col-sm-2" >اخصائى تشغيل نظم</label>
<div class="col-sm-4">
<input type="text" class="form-control list" name="it_name"  id="it_name" value="<?php echo $_SESSION['user_name']?>"  placeholder="it_name" required >
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="date" class="form-control list"  id="misin_date" value="<?php echo date('Y-m-d'); ?>"  name="misin_date" placeholder="تاريخ الماموريه" required> 
</div>
</div>
<!-- end first -->
<!-- start sec -->
<div class="input-group">

<label class="col-lg-2" >مكتب المرور</label>
<div class="col-sm-4">
<select class="custom-select post_group rtl" name="office_name">
          <?php  while($row_query_post_group=mysqli_fetch_assoc($query_post_group)){ ?>
            <option  value="<?php echo $row_query_post_group["office_name"];?>"
                ><?php echo $row_query_post_group["office_name"];?>
            </option>
           <?php } ?>
            </select>
</div>
<label class="col-sm-2" id="misin_type_label" > نوع البلاغ</label>
<div class="col-sm-4">
<select class="form-control list" name="misin_type" id="notice_type">
<option value="">
</option>
<option value="network">
شبكة
</option>
<option value="services">
خدمة
</option>
<option value="pc">
جهاز /طابعه
</option>
<option value="users">
أسماء مستخدمين
</option>
<option value="tools">
مستلزمات تشغيل
</option>
</select>

</div> 
</div>
<!-- end sec -->
<!-- start thr -->

   
    
    <div class="trans">
    
    <fieldset id="network">
    <hr>
    <legend>
       <span class="badge">بيانات الشبكه</span></legend>
        <div class="input-group">

        </div>
    <div class="input-group">
    <label class="control-label col-sm-2" > حاله الشبكه</label>

<div class="col-sm-4">
<select class="form-control list" name="Network_Status" id="" >
<option value="جيده">جيده</option>
<option value="متوسطه">متوسطه</option>
<option value="ضعيفه">ضعيفه</option>
</select>
</div>

 <label class="control-label col-sm-2" >المكتب يحتاج لنقاط شبكه</label>   
<div class="col-sm-4">
<select class="form-control list" name="Network_points" id="" >
<option value="لا">لا</option>
<option value="نعم">نعم</option>
</select>
</div>
    
    </div>
</fieldset>
   
    <fieldset id="pc">
       <hr>
       <legend><span class="badge">حاله الاجهزه </span></legend>
        <div class="col-sm-4" style="float:right;">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title">هل تم تنزيل برامج الخدمات و البرامج المساعده و مكافح الفيروسات </label>
</div>
<div class="card-body">
<select  class="form-control list" name="pc_program" id="" >
<option value="نعم">نعم</option>
<option value="لا">لا</option>
</select>
</div>
</div>
</div>
    
<div class="col-sm-4" style="float:right;">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title">هل يوجد اعطال بالاجهزه </label>
</div>
<div class="card-body">
<select  class="form-control list" name="pc_damage" id="" >
<option value="لا">لا</option>
<option value="نعم">نعم</option>
</select>
</div>
</div>
</div>
    
<div class="col-sm-4" style="float:right;">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title">هل نظام التشغيل النسخه المعتمده من قطاع الدم الفنى </label>
</div>
<div class="card-body">
<select  class="form-control list" name="pc_os" id="" required>
<option value="نعم">نعم</option>
<option value="لا">لا</option>
</select>
</div>
</div>
</div>    
    </fieldset>
   
    <fieldset id="domain">
           <hr>
          <legend><span class="badge"> الدومين </span></legend>
           <div class="col-sm-3" style="float:right;">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title">هل الاجهزه مربوطه بالدومين </label>
</div>
<div class="card-body">
<select  class="form-control list" name="pc_domain" id="pc_domain" >
<option value="نعم">نعم</option>
<option value="لا">لا</option>
</select>
</div>
</div>
</div>
    
<div class="col-sm-3" style="float:right;">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title">عدد الاجهزه المربوطه بالدومين </label>
</div>
<div class="card-body">
<input type="number" min="0" max="99" class="form-control list" name="num_pc_domain" id="num_pc_domain"  >

</div>
</div>
</div>
    
<div class="col-sm-6" style="float:right;">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title">عدد الاجهزه خارج الدومين و السبب </label>
</div>
<div class="card-body">
<input type="text" class="form-control list" maxlength="50" name="note_not_domain" id="" >
</div>
</div>
</div>
    </fieldset>
    
    <fieldset id="services">
          <hr>
          <legend><span class="badge"> الخدمات </span></legend>
           <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="shm">الشباك الموحد </label>
</div>
    <label for="shm">
<div class="card-body">
<input type="checkbox" name="shm" id="shm" value="الشباك الموحد">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
<div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="mn">مراقبه النقديه</label>
</div>
    <label for="mn">
<div class="card-body">
<input type="checkbox" name="mn" id="mn" value="مراقبه النقديه">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
<div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="hf">الحوالات الفوريه </label>
</div>
    <label for="hf">
<div class="card-body">
<input type="checkbox" name="hf" id="hf" value="الحوالات الفوريه">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="th">التحصيل و الاخطار</label>
</div>
    <label for="th">
<div class="card-body">
<input type="checkbox" name="th" id="th" value="التحصيل و الاخطار">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="et"> المصريه للاتصالات</label>
</div>
    <label for="et">
<div class="card-body">
<input type="checkbox" name="et" id="et" value="المصريه للاتصالات">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="tw">منظومه الطوابع</label>
</div>
     <label for="tw">
<div class="card-body">
<input type="checkbox" name="tw" id="tw" value="منظومه الطوابع">
  <span class="checkmark"></span>
         </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="e-mail">البريد الالكترونى </label>
</div>
     <label for="e-mail">
<div class="card-body">
<input type="checkbox" name="email" id="e-mail" value="البريد الالكترونى">
  <span class="checkmark"></span>
         </div></label>
</div>
</div>
        
   <div class="w13"> 
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="bo">باك اوفيس </label>
</div>
    <label for="bo">
<div class="card-body">
<input type="checkbox" name="bo" id="bo" value="باك اوفيس">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="fo">فرونت اوفيس </label>
</div>
    <label for="fo">
<div class="card-body">
<input type="checkbox" name="fo" id="fo" value="فرونت اوفيس">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="khh"> الخدمات الحكوميه </label>
</div>
    <label for="khh">
<div class="card-body">
<input type="checkbox" name="khh" id="khh" value="الخدمات الحكوميه">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="am"> الاحوال المدنيه </label>
</div>
    <label for="am">
<div class="card-body">
<input type="checkbox" name="am" id="am" value="الاحوال المدنيه ">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="mnsh"> موقع المنشورات </label>
</div>
    <label for="mnsh">
<div class="card-body">
<input type="checkbox" name="mnsh" id="mnsh" value=" موقع المنشورات">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="hkh"> الحوالات الخارجيه </label>
</div>
    <label for="hkh">
<div class="card-body">
<input type="checkbox" name="hkh" id="hkh" value="الحوالات الخارجيه">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    
   <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading">
<label class="card-title" for="des"> ادفتر الاستثمار</label>
</div>
    <label for="des">
<div class="card-body">
<input type="checkbox" name="des" id="des" value="ادفتر الاستثمار">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>
    </fieldset>
    
    <fieldset id="tools">
                <hr>
                <legend><span class="badge"> مستلزمات التشغيل </span></legend>
                 <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="toner"> حباره </label>
</div>
    <label for="toner">
<div class="card-body">
<input type="checkbox" name="toner" id="toner" value="toner">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>  
        
              <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="dram">درام </label>
</div>
    <label for="dram">
<div class="card-body">
<input type="checkbox" name="dram" id="dram" value="dram">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>     
        
           <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="keyboard">لوحه مفاتيح</label>
</div>
    <label for="keyboard">
<div class="card-body">
<input type="checkbox" name="keyboard" id="keyboard" value="keyboard">
  <span class="checkmark"></span>
        </div></label>
</div>
</div>      
        
<div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="mouse">فأره</label>
</div>
<label for="mouse">
<div class="card-body">
<input type="checkbox" name="mouse" id="mouse" value="mouse">
<span class="checkmark"></span>
</div></label>
</div>
</div>

<div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="barscan">قارئ باركود</label>
</div>
<label for="barscan">
<div class="card-body">
<input type="checkbox" name="barscan" id="barscan" value="barscan">
<span class="checkmark"></span>
</div></label>
</div>
</div> 
        
 <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="pc">جهاز حاسب</label>
</div>
<label for="pc">
<div class="card-body">
<input type="checkbox" name="pc" id="pc" value="pc">
<span class="checkmark"></span>
</div></label>
</div>
</div> 
        
 <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="monitor">شاشه حاسب</label>
</div>
<label for="monitor">
<div class="card-body">
<input type="checkbox" name="monitor" id="monitor" value="monitor">
<span class="checkmark"></span>
</div></label>
</div>
</div>

 <div class="w13">
<div class="card card-default dvice_mode">
<div class="card-heading card-height">
<label class="card-title" for="printer">طابعه ليزر</label>
</div>
<label for="printer">
<div class="card-body">
<input type="checkbox" name="printer" id="printer" value="printer">
<span class="checkmark"></span>
</div></label>
</div>
</div>
    </fieldset>
    
    <fieldset id="does">
       <hr>
       <legend ><span class="badge"> ما تم عمله </span></legend>
        <div class="input-group"  >
          
    <div class="col-sm-12">
        
        <textarea rows="7" cols="70" name="does"></textarea>
            </div></div>
    </fieldset>
        </div>
</div><!-- end body form -->
<div class="modal-footer">
<button type="submit" class="btn btn-primary" name="first_form" id="first_form"><i class="fas fa-check"></i>تم</button>
<button style="display:none;" type="submit" class="btn btn-primary" name="" id="second_form" formaction="misin_form_sub.php"><i class="fas fa-check"></i>اضافه الاجاز/ بدل راحه</button>
    <a href="my_misin.php">
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button></a>
</div>
</div>
</div>
</form>  
</div>
           
<script>
$(function() {
  $('#notice_type').change(function(){
    $('fieldset').hide();
    $('#' + $(this).val()).show();
  });
});
	</script>
    <script>
$("#typeahead").focus();
$('input.typeahead').typeahead({
name: 'typeahead1',
remote:'../search_live.php?key=%QUERY',
limit : 10
});
</script>
</body></html>