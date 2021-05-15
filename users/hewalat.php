<?php
session_start();
include '../setup/session/no_session.php';
$session_role = $_SESSION['role'];
$job = $_SESSION['job'];

$session_username = $_SESSION['user_name'];
date_default_timezone_set('Africa/Cairo');
$today = date("j - n - Y"); 
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<title>مستخدمين حوالات</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../css/hewalat.css">
<script src="../js/jquery.min.js"> </script>
<style></style>
</head>
<body>
   <header>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="nav_search">
<form class="navbar-form navbar-left" method="POST">
<div class="form-group">
<h2>نموذج مستخدمين حوالات</h2>    
<!-- <input type="text" class="form-control typeahead" id="typeahead" autofocus placeholder="بحث"> -->
</div>
</form>
</div>
    <span><a href="../index.php"><i class="fas fa-home"></i></a></span>
<div class="dropdown">
<button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown"><i class="fas fa-user"></i>
<?php echo $session_username//" ".$session_role; ?> <span class="caret"></span></button>
<div class="span8" id="maincont"></div>  
<ul class="dropdown-menu">
<li><i class="fas fa-sign-out-alt"></i><a href="#logout" data-toggle="modal">تسجيل الخروج </a></li>
<li><i class="fas fa-key"></i><a href="#changepass" data-toggle="modal"> تغييرر كلمه المرور</a></li>
</ul></div>  
</div><!-- /.container-fluid -->
</nav>
</header>
    <div class="container">
<!--search input  -->

<input style= text-align:center id="search" class="input-search" placeholder="ادخل رقم الملف" type="text" autofocus><label>بيانات المستخدم </label>
    <div class="user_details">
<!-- result search  -->
<div id="result"></div></div>
<input style= text-align:center id="search1" class="input-search" placeholder=" ادخل الكود المالى  " type="text"><label>بيانات المكتب</label>
    <div class="office_details">
<div id="result1"></div></div>
<!-- link to download excel  -->

<!-- make table  -->
<div style="">
<select id="prg" class="select_prg input-search" name="prg" >
<option selected>اختر الصلاحيه</option>
<option value="مدير">
    مدير  </option>
<option value="موظف">
   موظف </option>

</select>


</div>
<br>
<div><button class="button button_insert" id="insert" onClick="addHtmlTableRow();"><i class="fas fa-plus-circle"></i></button>
    <button class="button button_edit" id="edit" onClick="editHtmlTbleSelectedRow();"> <i class="fas fa-edit"></i> </button>
<button class="button button_remove" id="remove" onClick="removeSelectedRow();"><i class="fas fa-minus-circle"></i></button>
    <a href="#" id="test" onClick="javascript:fnExcelReport();"><i class="fas fa-arrow-circle-down"></i></a> </div>

<table id="table" border="1">
<tr><th colspan="7" >نموذج مستخدمين حوالات من   <?php echo $_SESSION['user_name']." ".$_SESSION['jop'];?></th></tr>
<tr><th style="background-color: #c3cfcf;"> اسم الموظف </th>
    <th style="background-color: #c3cfcf;"> رقم الملف </th>
    <th style="background-color: #c3cfcf;"> الرقم القومى </th>
    <th style="background-color: #c3cfcf;"> الصلاحيه </th>

    <th style="background-color: #c3cfcf;"> اسم المكتب </th>
<th style="background-color: #c3cfcf;"> الكود المالى </th>
    <th style="background-color: #c3cfcf;"> المطلوب تنفيذه </th></tr></table>

                    <!--start change passord -->
                    <?php   include '../setup/pass/change_password_form.php'; ?>
                    <!-- end change_pass -->
                    <!--start Logout Modal -->
                    <?php   include '../setup/log/logout_form.php'; ?>
                    <!-- end Logout Modal -->
   </div>
    <script src="../js/search_user_details_hewalat.js"></script>
<script src="../js/search_office_details_hewalat.js"></script>
<script src="../js/mk_table_hewalat.js"></script>
        <script>
            var chan11 = document.getElementById("navuser");
function fnExcelReport() {
var tab_text = '<html lang="ar" xmlns:x="urn:schemas-microsoft-com:office:excel">';
tab_text = tab_text + '<head><meta charset="UTF-8">';
tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';
tab_text = tab_text + '<x:Name><?php echo $today ; ?></x:Name>';
tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';
tab_text = tab_text + "<table>";
tab_text = tab_text + $('#table').html();  
tab_text = tab_text + '</table></body></html>';
var data_type = 'data:application/vnd.ms-excel';
var ua = window.navigator.userAgent;
var msie = ua.indexOf("MSIE ");
if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
if (window.navigator.msSaveBlob) {
var blob = new Blob([tab_text], {
type: "application/csv;charset=utf-8;"});
navigator.msSaveBlob(blob, 'Test file.xls');}} 
else {
$('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
$('#test').attr('download','<?php echo $session_username." ".$today ; ?>.xls');
}}
        </script>
</body>
</html>
