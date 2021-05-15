<?php
session_start();
include '../../it/setup/session/no_session.php';


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>شرائح روترات متوفره</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="../css/print.css" media="print">
<link rel="stylesheet" href="../css4/bootstrap.min.css">
<link rel="stylesheet" href="../css/post.css">
<!-- <link rel="stylesheet" href="../css/typeahead.css"> -->
<link rel="stylesheet" href="../css/header_nav.css">
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js4/bootstrap.min.js"></script>
<!-- [if lt IE 9]><script src="js/html5shiv.min.js"></script><![endif]-->
<!-- <script src="../js/edit.js"></script>
<script src="../js/move.js"></script>
<script src="../js/in_it.js"></script>
<script src="../js/resend.js"></script>

<script src="../js/typeahead.min.js"></script>
<script src="../js/get_details.js"></script> -->

<style>
#wait {
    position: relative;
    text-align: center;
    /* justify-content: center; */
    margin-top: 17%;
}
.vodafone {
    color :red;
}

.orange {
    color : orange;
}

.etisalat {
    color : green;
}
#add_sim {
    direction :ltr
}
</style>
</head> 
<body>
<div class="container">
<header>
<nav class="navbar  navbar-light bg-light  fixed-top">
<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
<?php if ( $_SESSION['add_dvice'] == "1"){ ?>
<button type='button' class='btn  btn-outline-secondary' data-toggle='modal' data-placement="right" data-target='#add_sim'><i class='fas fa-plus'></i></button><?php }?>
<div class="nav-item dropdown ">
<?php   include '../setup/user/user.php'; ?>
</div>
</nav>
</header>
<!-- start vodafone  -->
<div class="msg">

</div>

<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->
<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Add sim Modal -->
<?php include "modals/modal_add/add_sim.php"; ?>
<div class="clearfix"></div>
<!-- start footer -->
<script>
$(document).ready(function(){
 
    $(".msg").load("details_sims.php");
// var key ="sims";
// $.ajax({
// url:"details_sims.php",type:"POST",
// data :{"key":key},
// success:function(responseText){$(".msg").html(responseText);}
// });

})
</script>
<script>
$("#add").click(function(){
$.ajax({
url:"add/add_sim.php",
type:"POST",
data :$(".add_form").serialize(),
success:function(data){
$(".add_form")[0].reset();
$(".msg").load("details_sims.php");
}
});
})
</script>
</body>
</html>