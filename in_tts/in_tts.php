<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
//if ( $session_role != "admin"){ header('location: not.php');}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>اجهزه بقطاع الدعم الفنى بالقاهره تحت الصيانه</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="../css4/bootstrap.min.css">
<link rel="stylesheet" href="../css/in_tts.css">
<link rel="stylesheet" href="../css/header_nav.css">
<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js4/bootstrap.min.js"></script>
<!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
<script src="../js/edit_in_tts.js"></script>
<script src="../js/export_in_tts.js"></script>
<style>
</style>
</head>
<body>
<div class="container">
<header>
    <nav class="navbar  navbar-light bg-light  fixed-top">
        <a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
        <div class="nav-item dropdown ">
            <?php include '../setup/user/user.php'; ?>
        </div>
    </nav>
</header>
<!-- start pc -->
    <div id="msg" class="msg"></div>
<!-- start edit pc_edit -->
<?php if ($_SESSION['edit_in_tts'] == 1){ ?>
<div class="modal fade" id="pc_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_pc_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات الجهاز</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pc_name"  name="_name" placeholder="اسم الجهاز" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="pc_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="pc_date_auth_repair"  name="_date_auth_repair" placeholder="pc_date_auth_repair" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pc_auth_repair" name="_auth_repair" placeholder="pc_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="pc_num" name="_num" placeholder="pc_num" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_pc" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>

</div>
</div>
</div>
</form>
</div>
<!-- php end pc_edit -->
<!-- start edit monitor edit -->
<div class="modal fade" id="monitor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_monitor_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات الشاشه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="monitor_name"  name="_name" placeholder="اسم الشاشه" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الشاشه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="monitor_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="monitor_date_auth_repair"  name="_date_auth_repair" placeholder="monitor_date_auth_repair" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="monitor_auth_repair" name="_auth_repair" placeholder="monitor_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="monitor_num" name="_num" placeholder="monitor_num" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_monitor" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>
<!-- php end monitor_edit-->
<!-- Modal printer -->
<div class="modal fade" id="printer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_printer_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات الطابعه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="printer_name"  name="_name" placeholder="اسم الطابعه" required readonly>
</div>
<label class="control-label col-sm-2" >نوع الطابعه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="printer_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="printer_date_auth_repair"  name="_date_auth_repair" placeholder="printer_date_auth_repair" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_auth_repair" name="_auth_repair" placeholder="printer_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="printer_num" name="_num" placeholder="printer_num" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_printer" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>
<!-- php start edit printer_edit-->
<!-- Modal pos -->
<div class="modal fade" id="pos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_pos_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات نقطه البيع</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pos_name"  name="_name" placeholder="اسم " required readonly>
</div>
<label class="control-label col-sm-2" >نوع نقطه البيع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="pos_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="pos_date_auth_repair"  name="_date_auth_repair" placeholder="pos_date_auth_repair" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pos_auth_repair" name="_auth_repair" placeholder="pos_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="pos_num" name="_num" placeholder="pos_num" required>
</div>
<label class="control-label col-sm-2" ></label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_pos" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>

</div>
</div>
</div>
</form>
</div>
<!-- php  pos_edit-->
<!-- Modal network -->
<div class="modal fade" id="network_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_network_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="network_name"  name="_name" placeholder="اسم " required readonly >
</div>
<label class="control-label col-sm-2" >نوع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="network_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="network_date_auth_repair"  name="_date_auth_repair" placeholder="network_date_auth_repair" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="network_auth_repair" name="_auth_repair" placeholder="network_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="network_num" name="_num" placeholder="network_num" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_network" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>

</div>
</div>
</div>
</form>
</div> 
<!-- php  network edit-->
<!-- Modal postal edit -->
<div class="modal fade" id="postal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_postal_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="postal_name" name="_name" placeholder="اسم " required readonly>
</div>
<label class="control-label col-sm-2" >نوع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="postal_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="postal_date_auth_repair" name="_date_auth_repair" placeholder="postal_date_auth_repair" required style="width: 100%;">
</div>
<label  class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="postal_auth_repair" name="_auth_repair" placeholder="postal_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="postal_num" name="_num" placeholder="postal_num" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_postal" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>  
<!-- php  postal_edit-->
<!-- Modal other edit-->
<div class="modal fade" id="other_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_in_tts_other_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"> تعديل بيانات بوستال</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="other_name"  name="_name" placeholder="other_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="other_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى:</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="other_date_auth_repair" name="_date_auth_repair" placeholder="other_date_auth_repair" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >تاريخ اذن الاصلاح</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="other_auth_repair" name="_auth_repair" placeholder="other_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم اذن الاصلاح</label>
</div>
<div class="input-group">
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="other_num" name="_num" placeholder="other_num" required>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_in_tts_other" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>   
<?php } ?>
<!-- end other edit -->
  <!-- start export pc in it tts -->
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="modal fade" id="export_pc_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_pc_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال جهاز حاسب</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="pc_export_num" placeholder="pc_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="pc_export_count_in_it" placeholder="pc_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="pc_export_name" name="_export_name" placeholder="pc_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="pc_export_sn" placeholder="pc_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="pc_export_date" value="<?php echo date('Y-m-d'); ?>" name="_export_date" placeholder="pc_export_date" required >
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pc_export_parcel" name="_export_parcel" placeholder="pc_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_pc" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
<!-- end export pc in it to -->
  
   <!-- start export monitor in it to -->
<div class="modal fade" id="export_monitor_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_monitor_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال شاشه جهاز حاسب</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="monitor_export_num" placeholder="monitor_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="monitor_export_count_in_it" placeholder="monitor_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="monitor_export_name"  name="_export_name" placeholder="monitor_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الشاشه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="monitor_export_sn" placeholder="monitor_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="monitor_export_date" name="_export_date" value="<?php echo date('Y-m-d') ; ?>" placeholder="monitor_export_date" required>
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="monitor_export_parcel" name="_export_parcel" placeholder="monitor_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_monitor" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
<!-- end export monitor in it to -->
      
       <!-- start export printer in it to -->
<div class="modal fade" id="export_printer_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_printer_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال طابعه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="printer_export_num" placeholder="printer_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="printer_export_count_in_it" placeholder="printer_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_export_name" name="_export_name" placeholder="printer_export_name" required readonly>
</div>
<label class="control-label col-sm-2" >نوع الطابعه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="printer_export_sn" placeholder="printer_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="printer_export_date" name="_export_date" placeholder="printer_export_date" required >
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_export_parcel" name="_export_parcel" placeholder="printer_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_printer" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
<!-- end export printer in it to -->
          
<!-- start export pos in it to -->
<div class="modal fade" id="export_pos_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_pos_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال pos</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="pos_export_num" placeholder="pos_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="pos_export_count_in_it" placeholder="pos_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="pos_export_name" name="_export_name" placeholder="pos_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع pos</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="pos_export_sn" placeholder="pos_export_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="pos_export_date" name="_export_date" placeholder="pos_export_date" required>
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pos_export_parcel" name="_export_parcel" placeholder="pos_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_pos" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
<!-- end export pos in it to -->
              
<!-- start export network in it to -->
<div class="modal fade" id="export_network_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_network_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال pos</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="network_export_num" placeholder="network_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="network_export_count_in_it" placeholder="network_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="network_export_name"  name="_export_name" placeholder="network_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع pos</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="network_export_sn" placeholder="network_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="network_export_date" name="_export_date" placeholder="network_export_date" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="network_export_parcel" name="_export_parcel" placeholder="network_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_network" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
<!-- end export network in it to -->

<!-- start export postal in it to -->
<div class="modal fade" id="export_postal_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_postal_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال pos</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="postal_export_num" placeholder="postal_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="postal_export_count_in_it" placeholder="postal_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="postal_export_name" name="_export_name" placeholder="postal_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع pos</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="postal_export_sn" placeholder="postal_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="postal_export_date" name="_export_date" placeholder="postal_export_date" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="postal_export_parcel" name="_export_parcel" placeholder="postal_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_postal" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
<!-- end export postal in it to -->

<!-- start export other in it to -->
<div class="modal fade" id="export_other_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_in_tts_other_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_export_num" id="other_export_num" placeholder="other_export_num"  >
    <input style="display:none" type="text" name="_export_count_in_it" id="other_export_count_in_it" placeholder="postal_export_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="other_export_name" name="_export_name" placeholder="other_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="other_export_sn" placeholder="other_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="other_export_date" name="_export_date" placeholder="other_export_date" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="other_export_parcel" name="_export_parcel" placeholder="other_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_in_tts_other" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 
   <?php } ?>
<!-- end export other in it to -->

<!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
    </div>
    <script>
$(document).ready(function(){
    var key ="in_tts";
$.ajax({
url:"details_in_tts.php",type:"POST",
data :{"key":key},
success:function(responseText){$(".msg").html(responseText);}
});})
    </script>
    <script>
function get_edit_id(e){
    edit_id = e.getAttribute("id");
    edit_id_form = edit_id + '_form';
    $.ajax({
url:"edit/edit_in_tts.php",
type:"POST",
data :$("."+edit_id_form ).serialize(),
success:function(data){
$.ajax({
url:"details_in_tts.php",type:"POST",
data :{"key":"in_tts"},
success:function(responseText){$(".msg").html(responseText);}
});
}
});
}    
</script>
<script>
function get_export_id(ex){
    export_id = ex.getAttribute("id");
    export_id_form = export_id + '_form';
    $.ajax({
url:"export/export_in_tts.php",
type:"POST",
data :$("."+ export_id_form ).serialize(),
success:function(data){
$.ajax({
url:"details_in_tts.php",type:"POST",
data :{"key":"in_tts"},
success:function(responseText){$(".msg").html(responseText);}
});
}
});
}    
</script>
    </body>
    </html>
