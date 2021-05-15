<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>
<head>
<meta lang="en-US" charset="utf-8"/>
<title>سجل البلاغات</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header_nav.css">
    <link rel="stylesheet" href="../css/incoming.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js4/bootstrap.min.js"></script>
    <!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
    <script src="../js/notice_edit.js"></script>

<style>
    h2 {margin-top: 0;}
table tr{transition: all .25s ease-in-out;}
table tr:hover{background-color: #ddd;}
textarea {
  resize: none;
}
</style>
</head>
<body>
<div class="containe">
		<header>
			<nav class="navbar  navbar-light bg-light  fixed-top">
				<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
				<ul class="navbar-nav">
					<li class="nav-item ">
						<form class="navbar-form  form-inline my-2 my-lg-0" method="post">
							<input type="search" class="form-control" name="search_text" id="search_text"  autofocus placeholder=" بحث فورى"/>
						</form>
					</li>
				</ul>
				<a class='nav-item btn btn-outline-secondary' href="notice_form3.php"><i class='fas fa-plus'></i></a>
				<div class="nav-item dropdown ">
					<?php   include '../setup/user/user.php'; ?>
				</div>
			</nav>
		</header>
    <div class="tableview tableview-has-footer">
  <div class="tableview-holder" id="tableview-holder">
<table id="table_edit_notice">
<thead>
<tr>
    <th caption=" التاريخ" class="th_date_in  "></th>
    <th caption="القائم بالبلاغ" class="th_by  "></th>
    <th caption="الجهة" class="th_office"></th>
    <th caption="متلقي البلاغ" class="th_dvice  "></th>
    <th caption="نوع البلاغ" class="th_sn  "></th>
    <th caption="تفاصيل البلاغ" class="th_damage  "></th>
    <th caption="الاجراء" class="th_note  "></th>
    
</tr>
    </thead>
    <tbody id="result"></tbody>
      </table>
        </div>
                <script>
        var heightclient = document.documentElement.clientHeight - 157;
            document.getElementById('tableview-holder').style.height = heightclient + 'px';
            //alert(heightclient);
        </script>
    </div>
    </div>
<!-- end add notice -->
<!-- start edit notice -->
    <div class="modal fade" id="pc_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" name="myForm" class="form-horizontal">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل البلاغ</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden" name="notice_id" id="notice_id">
<div class="input-group">
<div class="col-sm-4">
<select class="custom-select" name="notice_type" id="notice_type" required>
  <option selected></option>
  <option value="شبكه">شبكه</option>
  <option value="جهاز /طابعه">جهاز /طابعه</option>
  <option value="خدمه">خدمه</option>
  <option value="مستلزمات تشغيل">مستلزمات تشغيل</option>
  <option value="أسماء مستخدمين">أسماء مستخدمين</option>
</select>
</div>
<label class="control-label col-sm-2" >نوع البلاغ</label>
<div class="col-sm-4">
<input  class="form-control" id="notice_from"  name="notice_from" placeholder="notice_from" required readonly >
</div>
<label class="control-label col-sm-2" >الجهه</label>
</div>
<div class="input-group">
<div class="col-sm-4">
 <textarea class="form-control"  rows="5" name="notice_procedure" id="notice_procedure" required autocomplete="off" placeholder="الاجراء"></textarea>
</div>
<label class="control-label col-sm-2" >الاجراء</label>
<div class="col-sm-4">
<textarea class="form-control" rows="5" name="notice_description" id="notice_description" required placeholder="تفاصيل البلاغ"></textarea>
</div>
<label class="control-label col-sm-2" >التفاصيل</label>
</div>
<div style="display:none" class="input-group">
<label class="control-label col-sm-2" ></label>
<div class="col-sm-4">
<input type="hidden" class="form-control" id="pc_office" name="pc_office" placeholder="اسم المكتب" required readonly>
</div>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="pc_num" name="pc_num" placeholder="pc_num" required readonly>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary edit_notice_submit"  name="notice_edit"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>

</div>
</div>
</div>
</form>  
</div>
<!-- end edit notice -->
<?php
 if(isset($_POST['notice_edit'])){ include 'notice_form_sub.php'; }
?>
<!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->

    </body>
  <script>
$(document).ready(function(){
 load_data();
     function load_data(query){
      $.ajax({
       url:"notice_fetch.php",
       method:"POST",
       data:{query:query},
       success:function(data){$('#result').html(data);}
      });
     }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else {load_data();}
 });
});
</script>
</html>
