<?php
session_start();
include '../../it/setup/session/no_session.php';
date_default_timezone_set('Africa/Cairo');
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>اجهزه مكتب</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="../css/print.css" media="print">
<link rel="stylesheet" href="../css4/bootstrap.min.css">
<link rel="stylesheet" href="../css/post.css">
<link rel="stylesheet" href="../css/typeahead.css">
<link rel="stylesheet" href="../css/header_nav.css">
<!-- [if lt IE 9]><script src="js/html5shiv.min.js"></script><![endif]-->
<script src="../js/edit.js"></script>
<script src="../js/move.js"></script>
<script src="../js/in_it.js"></script>
<script src="../js/resend.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js4/bootstrap.min.js"></script>
<script src="../js/typeahead.min.js"></script>
<script src="../js/get_details.js"></script>
<style>
#wait {
    position: relative;
    text-align: center;
    /* justify-content: center; */
    margin-top: 17%;
}
        .add_new_dvice {
            position: fixed;
            top: 2%;
            z-index: 1030;
            left: 20%;
        }
</style>
</head> 
<body>
<div class="container">
<header>
<nav class="navbar  navbar-light bg-light  fixed-top">
<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
<ul class="navbar-nav">
<li class="nav-item ">
<form class="navbar-form  form-inline my-2 my-lg-0" method="post">
<input type="search" class="form-control typeahead" id="typeahead" placeholder="بحث" aria-label="Example text with button addon" aria-describedby="button-addon1" autofocus>
<button class="btn btn-outline-success my-2 my-sm-0 search" type="button">بحث</button>
</form>
</li>
</ul>
<div class="nav-item dropdown ">
<?php   include '../setup/user/user.php'; ?>
</div>
</nav>
</header>
<div class="msg" dir="rtl">
<h3 id="wait"></h3>
</div>
</div>
<script src="../js/search_live.js"></script>
<!-- start Modal edit  -->
<?php
if ( $_SESSION['edit'] == 1){ 
include "modals/modal_edit/pc_edit.php";
include "modals/modal_edit/monitor_edit.php";
include "modals/modal_edit/printer_edit.php";
include "modals/modal_edit/pos_edit.php";
include "modals/modal_edit/network_edit.php";
include "modals/modal_edit/postal_edit.php";
include "modals/modal_edit/other_edit.php";
}?>
<!-- end Modal edit  -->

<!-- start Modal move  -->
<?php
if ($_SESSION['move'] == 1){
include "modals/modal_move/pc_move.php";
include "modals/modal_move/monitor_move.php";
include "modals/modal_move/printer_move.php";
include "modals/modal_move/pos_move.php";
include "modals/modal_move/network_move.php";
include "modals/modal_move/postal_move.php";
include "modals/modal_move/other_move.php";
} ?>
<!-- end Modal move  -->

<!-- start Modal to_it  -->
<?php
if ( $_SESSION['to_it'] == 1){   
include "modals/modal_to_it/pc_to_it.php";
include "modals/modal_to_it/monitor_to_it.php";
include "modals/modal_to_it/printer_to_it.php";
include "modals/modal_to_it/pos_to_it.php";
include "modals/modal_to_it/network_to_it.php";
include "modals/modal_to_it/postal_to_it.php";
include "modals/modal_to_it/other_to_it.php";
} ?>
<!-- end Modal to_it  -->

<!-- start Modal own office  -->
<?php
if ( $_SESSION['resent'] == 1){
include "modals/modal_export/pc_export.php";
include "modals/modal_export/monitor_export.php";
include "modals/modal_export/printer_export.php";
include "modals/modal_export/pos_export.php";
include "modals/modal_export/network_export.php";
include "modals/modal_export/postal_export.php";
include "modals/modal_export/other_export.php";
} ?>
<!-- end send modal to own office -->
<!-- start add dvice -->
<?php include "modals/modal_add/add_dvice.php"; ?>
<!-- end add dvice -->
<!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->
<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
<script>
$('.dvice_name').change(function()
{
var query1 = $('.dvice_name').val();
$.ajax({
url:"add/dvice_type_fetch.php",
method:"POST",
data:{query1:query1},
success:function(data)
{
$('#dvice_type' ).html(data);
}
})

$.ajax({
url:"add/code_inventory_fetch.php",
method:"POST",
data:{query1:query1},
success:function(data)
{
$('#code_inventory' ).html(data);
}
})
});

$('.action_dvice_id').change(function()
{
var query = $(this).val();
$.ajax({
url:"add/dvice_name_fetch.php",
method:"POST",
data:{query:query},
success:function(data)
{
$('#dvice_name' ).html(data);
$('#dvice_type' ).html("");
$('#code_inventory' ).html("");
}
})
});

</script>
<script>
$(".add").click(function(){
$.ajax({
url:"add/add_dvice.php",
type:"POST",
data :$(".add_form").serialize(),
success:function(data){
$(".add_form")[0].reset();
var key = $(".typeahead").val();
$.ajax({
url:"details.php",type:"POST",
data :{"key":key},
success:function(responseText){$(".msg").html(responseText);}
});
}
});
});
</script>
<script>
function get_edit_id(e){
edit_id = e.getAttribute("id");
edit_id_form = edit_id + '_form';
$.ajax({
url:"edit/edit.php",
type:"POST",
data :$("."+edit_id_form ).serialize(),
success:function(data){
var key = $(".typeahead").val();
$.ajax({
url:"details.php",type:"POST",
data :{"key":key},
success:function(responseText){$(".msg").html(responseText);}
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
url:"move/move.php",
type:"POST",
data :$("."+move_id_form ).serialize(),
success:function(data){
$("."+move_id_form)[0].reset();
var key1 = $(".typeahead").val();
$.ajax({
url:"details.php",type:"POST",
data :{"key":key1},
success:function(responseText){$(".msg").html(responseText);},
});
}
});
}
</script>
<script>
function get_to_it_id(t){
to_it_id = t.getAttribute("id");
to_it_id_form = to_it_id + '_form';
/* alert(to_it_id);
alert(to_it_id_form);*/
$.ajax({
url:"to_it/to_it.php",
type:"POST",
data :$("."+to_it_id_form ).serialize(),
success:function(data){
/* alert(to_it_id_form);
alert(data);*/
$("."+to_it_id_form)[0].reset();
var key1 = $(".typeahead").val();
$.ajax({
url:"details.php",type:"POST",
data :{"key":key1},
success:function(responseText){$(".msg").html(responseText);},

});
}
});
}
</script>
<script>
function get_export_id(ex){
export_to_id = ex.getAttribute("id");
export_to_id_form = export_to_id + '_form';
$.ajax({
url:"resend/resend.php",
type:"POST",
data :$("."+ export_to_id_form ).serialize(),
success:function(data){
var key = $(".typeahead").val();
$.ajax({
url:"details.php",
type:"POST",
data :{"key":key},
success:function(data){$(".msg").html(data);}
});
}
});
}    
</script>
<script>
/*
$( "form" ).on( "submit", function( event ) {

console.log( $( this ).serialize() );
});
*/
</script>
</body>
</html>