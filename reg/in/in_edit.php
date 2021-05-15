<?php
session_start();
date_default_timezone_set('Africa/Cairo');
include '../../setup/session/no_session.php';
include '../../connection.php';
$query = "
SELECT * FROM inbox
WHERE date BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."'

";
$result = mysqli_query($conn, $query);
$rowcount1=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<title>تعديل المسجلات الوارده</title>
<link rel="stylesheet" href="../../css4/bootstrap.min.css">
<script src="../../js/jquery.min.js"></script>
<script src="../../js4/bootstrap.min.js"></script>
<script src="../../js/typeahead.min.js"></script>
<style>
@font-face {
font-family: myFirstFont;
src: url(C39SLOW.TTF);
}

body {
font-weight: bold;
text-align: center;
}

.table td, .table th {
padding:0;
vertical-align: middle;

}
.container {
width: auto;
margin:auto;
}
.rtl , .modal-body {
direction: rtl;
}
.typeahead, .tt-query, .tt-hint {
font-size: 24px;
height: auto;
line-height: 30px;
outline: medium none;
}
.typeahead {
width: 355px;
background-color: #FFFFFF;
text-align: right;
box-sizing: border-box;
height: 42px
}
.typeahead:focus {
border: 2px solid #0097CF;
}
.tt-query {
box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
}
.tt-hint {
display: none;
}
.tt-dropdown-menu {
background-color: #FFFFFF;
border: 1px solid rgba(0, 0, 0, 0.2);
border-radius: 8px;
box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
margin-top: 12px;
padding: 1px 0;
width: 355px;
overflow: hidden;
}
.tt-suggestion {
font-size: 24px;
padding: 0 5px;
}
.tt-suggestion.tt-is-under-cursor {
background-color: #9D9E9E;
color: #FFFFFF;
}
.tt-suggestion p {
text-align: right;
margin: 0;
}
.twitter-typeahead{
direction: rtl;
}
#czcMask {
display: none;
}
.col-sm-2 {
max-width: unset;
}
.mos {

border: 0.1px solid darkgrey;
height: max-content;
padding: 2px 7px;
cursor: pointer;
}
.mos:hover{
background-color: beige;
}
.dis-grid {
display: inline-grid;
text-align: center;
}

.modal-dialog {
max-width:95%;

}
@media print  {


#print {
display: none;
}

}

</style>
</head>
<body>
<br/><br /><br />
<header>
<nav class="navbar  navbar-light bg-light  fixed-top">
<a class="navbar-brand brand_home" href="../../index.php">الصفحه الرئيسيه</a>
<div class="nav-item dropdown ">
<?php   include '../../setup/user/user.php'; ?>
</div>
</nav>
</header>
<div class="container">
<h4>تعديل المسجلات الوارده بتاريخ  <?php echo date('Y-m-d'); ?></h4>
<div id="order_table">
<table class="table table-bordered rtl" id="table_edit_to">
<tr>

<th>رقم المسجل</th>
<th>الى</th>
<th>الموضوع</th>
<td>الاجراء</td>
</tr>
<?php
while($row = mysqli_fetch_array($result))
{
?>
<tr>
<td style="display:none;"><?php echo $row["id"]; ?></td>
<td class="barcode"><?php echo $row["barcode"]; ?></td>
<td><?php echo $row["send_to"]; ?></td>
<td><?php echo $row["subject"]; ?></td>
<td>

<!-- Button trigger modal -->
<button class="btn btn-outline-primary" href="#edit_reg" data-toggle="modal" type="button" onclick="edit_reg();">تعديل</button>
<button class="btn btn-outline-danger" href="#delete_reg" data-toggle="modal" type="button" onclick="del_reg();">حذف</button>
</td>
</tr>
<?php
}
?>
</table>
</div>
<p>   مسجل <?php echo $rowcount1; ?>  </p>
<!-- start edit modal -->
<div id="edit_reg" class="modal fade" data-toggle="modal" role="dialog">
<form method="post" action="in_edit_form.php">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">تعديل مسجل</h4>
</div>
<div class="modal-body">

<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputAddress2">التاريخ</label>
<input type="date" class="col-sm-2 form-control" name='_date' id="to_date" value="<?php echo date('Y-m-d'); ?>" readonly>
<input type="hidden" name="num" id="num" class="form-control" readonly required >
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputparcode">رقم الباركود</label>
<input type="tetx" class="col-sm-2 form-control masked" name="barcode" id="czc" placeholder="RR123456789EG" onkeyup="m(this)"
data-charset="__XXXXXXXXX__" autocomplete="off" autofocus>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputto">المرسل اليه</label>
<input type="text" class="col-sm-2 form-control typeahead" name="send_to" id="typeahead" autocomplete="off" placeholder="المرسل اليه" required>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputAddress">الموضوع</label>
<textarea  class="col-sm-4 form-control" rows="5" name="subject" id="subject" autocomplete="off" placeholder="الموضوع" required></textarea>
<div class="dis-grid col-sm-2">
<span id ="t4510" class="mos" onclick="getid(this)">حباره 4510 </span>
<span id ="d4510" class="mos" onclick="getid(this)">درام 4510 </span>
<span id ="t4020" class="mos" onclick="getid(this)">حباره 4020 </span>
<span id ="t3750" class="mos" onclick="getid(this)">حباره 3750 </span>
</div>
<div class="dis-grid col-sm-2">
<span id ="hp506" class="mos" onclick="getid(this)">حباره hp 605 </span>
<span id ="hp506" class="mos" onclick="getid(this)">حباره hp 506 </span>
<span id ="hp506" class="mos" onclick="getid(this)">ماوس </span>
<span id ="hp506" class="mos" onclick="getid(this)">كيبورد </span>
</div>
</div>
</div>
<div class="modal-footer">
<div class="form-group">
<label class="col-sm-2 col-form-label"></label>
<input type="button" name="insert" value="الغاء" class="col-sm-2 form-control btn-primary" data-dismiss="modal">
</div>
<div class="form-group">
<label class="col-sm-2 col-form-label"></label>
<input type="submit" name="to_edit" value= 'تعديل' class="col-sm-2 form-control btn-warning">
</div>
</div>
</div></div>
</form>
</div>
<!-- end edit modal -->

<!-- strat delete modal -->
<div id="delete_reg" class="modal fade" data-toggle="modal" role="dialog">
<form method="post" action="in_delete_form.php">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">حذف مسجل</h4>
</div>
<div class="modal-body">

<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputAddress2">التاريخ</label>
<input type="date" class="col-sm-2 form-control" name='del_date' id="del_date" value="<?php echo date('Y-m-d'); ?>" readonly>
<input type="hidden" name="del_num" id="del_num" class="form-control" readonly>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputparcode">رقم الباركود</label>
<input type="tetx" class="col-sm-2 form-control" name="del_barcode" id="del_barcode" readonly>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputto">المرسل اليه</label>
<input type="text" class="col-sm-2 form-control" name="del_send_to" id="del_send_to" readonly>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label" for="inputAddress">الموضوع</label>
<textarea  class="col-sm-4 form-control" rows="5" name="del_subject" id="del_subject" readonly></textarea>
</div>
</div>
<div class="modal-footer">
<div class="form-group">
<label class="col-sm-2 col-form-label"></label>
<input type="button" name="insert" value="الغاء" class="col-sm-2 form-control btn-primary" data-dismiss="modal">
</div>
<div class="form-group">
<label class="col-sm-2 col-form-label"></label>
<input type="submit" name="to_edit" value= 'حذف' class="col-sm-2 form-control btn-danger">
</div>
</div>
</div></div>
</form>
</div>
<!-- end delete modal -->
<!-- php start change_pass -->
<?php   include '../../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
</div>
<script>
$("#typeahead").focus();
$('input.typeahead').typeahead({
name: 'typeahead1',
remote:'../../search_live.php?key=%QUERY',
limit : 10
});
</script>
<script src="../../js/masking-input.js" data-autoinit="true"></script>
<script src="../../js/edit_to.js"></script>
<script src="../../js/delete_to.js"></script>
<script>
function m(id){$c = id.value.toUpperCase(); document.getElementById('czc').value = $c ;}

function getid(di){
if ( subject.value == ''){
subject.value = 'طلب '+ di.textContent;
}
else {
subject.value = subject.value +" + "+ di.textContent;
}

}


</script>


</body>
</html>
