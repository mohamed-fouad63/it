<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
date_default_timezone_set('Africa/Cairo');
//if ( $session_role != "admin"){ header('location: not.php');}
include '../connection.php';
$query_user_auth = "
SELECT * from tbl_user
";
$result_user_auth = mysqli_query($conn, $query_user_auth);
while($row_user_auth = mysqli_fetch_assoc($result_user_auth)){
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>اجهزه بالدعم الفنى تحت الصيانه</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../css4/bootstrap.min.css">
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="../css/in_it.css">
<link rel="stylesheet" href="../css/header_nav.css">
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js4/bootstrap.min.js"></script>
<!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
<script src="../js/edit_in_it.js"></script>
<script src="../js/export_in_it.js"></script>
<script src="../js/to_tts.js"></script>
<script src="../js/print_ticket.js"></script>
<script src="../js/deleted.js"></script>
<script src="../js/replace.js"></script>
<script src="../js/move_in_it.js"></script>
<style>
html {
scroll-behavior: smooth;
}
.shortcut{
 direction:rtl;
border: 1px solid #ddd;
    padding: 5px 0;
}
.shortcut a {
  margin:0 22px;
}
h6 {
    text-align: center;
}
</style>
</head>
<body>
<div class="containe">
<header>
<nav class="navbar  navbar-light bg-light  fixed-top">
  
<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
<span class="shortcut">
<a href="#pc_fieldset"><i class="fas fa-mobile-alt"></i></a>
<a href="#monitor_fieldset"><i class="fas fa-desktop"></i></a>
<a href="#printer_fieldset"><i class="fas fa-print"></i></a>
<a href="#pos_fieldset"><i class="fas fa-money-bill-alt"></i></a>
<a href="#network_fieldset"><i class="fas fa-network-wired"></i></a>
<a href="#postal_fieldset"><i class="fas fa-envelope-open-text"></i></a>
<a href="#other_fieldset"><i class="fas fa-question-circle"></i></a>
</span>
<div class="nav-item dropdown ">
<?php   include '../setup/user/user.php'; ?>
</div>
</nav>
</header>
<!-- start pc -->
<div id="msg" class="msg"></div>
<!-- Modals edit -->
<?php if ($_SESSION['edit_in_it'] == 1){
include "modals/modal_edit/pc_edit.php";
include "modals/modal_edit/monitor_edit.php";
include "modals/modal_edit/printer_edit.php";
include "modals/modal_edit/pos_edit.php";
include "modals/modal_edit/network_edit.php";
include "modals/modal_edit/postal_edit.php";
include "modals/modal_edit/other_edit.php";
}?>
<!-- start export pc in it to -->
<?php if ($_SESSION['resent_in_it'] == 1){
include "modals/modal_export/pc_export.php";
include "modals/modal_export/monitor_export.php";
include "modals/modal_export/printer_export.php";
include "modals/modal_export/pos_export.php";
include "modals/modal_export/network_export.php";
include "modals/modal_export/postal_export.php";
include "modals/modal_export/other_export.php";
} ?>
<!-- end export other in it to -->
<!-- start to_tts pc -->
<?php if ($_SESSION['to_tts'] == 1){
include "modals/modal_to_tts/pc_to_tts.php";
include "modals/modal_print_ticket/pc_ticket.php";
include "modals/modal_to_tts/monitor_to_tts.php";
include "modals/modal_to_tts/printer_to_tts.php";
include "modals/modal_to_tts/pos_to_tts.php";
include "modals/modal_to_tts/network_to_tts.php";
include "modals/modal_to_tts/postal_to_tts.php";
include "modals/modal_to_tts/other_to_tts.php";
}?>
<!-- end in_tts other -->
<!-- start deleted   -->
<?php if ($_SESSION['delete_in_it'] == 1){
include "modals/modal_delete/pc_delete.php";
include "modals/modal_delete/monitor_delete.php";
include "modals/modal_delete/printer_delete.php";
include "modals/modal_delete/pos_delete.php";
include "modals/modal_delete/network_delete.php";
include "modals/modal_delete/postal_delete.php";
include "modals/modal_delete/other_delete.php";
} ?>
<!-- end deleted  -->
<!-- start move  to -->
<?php if ($_SESSION['move_in_it'] == 1){
include "modals/modal_move/pc_move.php";
include "modals/modal_move/monitor_move.php";
include "modals/modal_move/printer_move.php";
include "modals/modal_move/pos_move.php";
include "modals/modal_move/network_move.php";
include "modals/modal_move/postal_move.php";
include "modals/modal_move/other_move.php";
} ?>
<!-- end move  -->
<!-- start replace pices pc  -->
<?php if ($_SESSION['delete_in_it'] == 1){ 
include "modals/modal_replace/pc_replace.php";
include "modals/modal_replace/sim_replace.php";
} ?>
<!-- end replace pices pc  -->
<!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->
<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
<script>
$(document).ready(function(){
var key ="in_it";
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":key},
success:function(responseText){$(".msg").html(responseText);}
});})
</script>
<script>
$(document).ready(function(){
$('.action').change(function(){
if($(this).val() != '')
{
var action = $(this).attr("id");
var query = $(this).val();
var result = '';
if(action == "dvice_id")
{
result = 'dvice_name';
}
$.ajax({
url:"replace/replace_fetch.php",
method:"POST",
data:{action:action, query:query},
success:function(data){
$('#'+result).html(data);
}
})

}
else {
}
});
});
</script>
<script>
$(document).ready(function(){
$('.change_sim_type').change(function(){
if($(this).val() != '')
{
var action = $(this).attr("id");
var query = $(this).val();
var result = '';
if(action == "change_sim_type")
{
result = 'change_sim_num';
}
$.ajax({
url:"replace/replace_sim_num_fetch.php",
method:"POST",
data:{action:action, query:query},
success:function(data){
$('#'+result).html(data);
}
})
}
else {
}
});
});
</script>
<script>
$(document).ready(function(){
$('.change_sim_num').change(function(){
if($(this).val() != '')
{
var action = $(this).attr("id");
var query = $(this).val();
var result = '';
if(action == "change_sim_num")
{
result = 'sim_replace_ip';
}
$.ajax({
url:"replace/replace_sim_ip_fetch.php",
method:"POST",
data:{action:action, query:query},
success:function(data){
$('#'+result).html(data);
}
})
}
else {
}
});
});
</script>
<script>
function get_edit_id(e){
edit_id = e.getAttribute("id");
edit_id_form = edit_id + '_form';
$.ajax({
url:"edit/edit_in_it.php",
type:"POST",
data :$("."+edit_id_form ).serialize(),
success:function(data){
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(data){$(".msg").html(data);}
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
url:"export/export_in_it.php",
type:"POST",
data :$("."+ export_id_form ).serialize(),
success:function(data){
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(data){$(".msg").html(data);}
});
}
});
}
</script>
<script>
function get_to_tts_id(ts){
to_tts_id = ts.getAttribute("id");
to_tts_id_form = to_tts_id + '_form';
$.ajax({
url:"to_tts/to_tts.php",
type:"POST",
data :$("."+ to_tts_id_form ).serialize(),
success:function(data){
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(data){$(".msg").html(data);}
});
}
});
}
</script>
<script>
function get_deleted_id(de){
deleted_id = de.getAttribute("id");
deleted_id_form = deleted_id + '_form';
$.ajax({
url:"deleted/deleted_in_it.php",
type:"POST",
data :$("."+ deleted_id_form ).serialize(),
success:function(data){
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(data){$(".msg").html(data);}
});
}
});
}
</script>
<script>
function get_move_id(m){
move_id = m.getAttribute("id");
move_id_form = move_id + '_form';
$.ajax({
url:"move/move_in_it.php",
type:"POST",
data :$("."+ move_id_form ).serialize(),
success:function(data){
$("."+ move_id_form)[0].reset();
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(responseText){$(".msg").html(responseText);},
});
}
});
}
</script>
<script>
function get_replace_id(r){
replace_id = r.getAttribute("id");
replace_id_form = replace_id + '_form';
$.ajax({
url:"replace/replace_pices_pc.php",
type:"POST",
data :$("."+ replace_id_form ).serialize(),
success:function(data){
$("."+ replace_id_form)[0].reset();
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(responseText){$(".msg").html(responseText);},
});
}
});
}
</script>
<script>
function get_replace_sim_id(r){
replace_sim_id = r.getAttribute("id");
replace_id_form = replace_sim_id + '_form';
$.ajax({
url:"replace/replace_sim.php",
type:"POST",
data :$("."+ replace_id_form ).serialize(),
success:function(data){
$("."+ replace_id_form)[0].reset();
$.ajax({
url:"details_in_it.php",type:"POST",
data :{"key":"in_it"},
success:function(responseText){$(".msg").html(responseText);},
});
}
});
}
</script>
</div>
</body>
</html>
