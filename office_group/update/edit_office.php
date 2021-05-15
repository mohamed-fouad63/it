<?php
session_start();
include '../../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
include '../../connection.php';
?>
<!DOCTYPE html>
<html>
<title>تعديل بيانات مكتب / قسم</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../../css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="../../css/print.css" media="print">
<link rel="stylesheet" href="../../css4/bootstrap.min.css">
<link rel="stylesheet" href="../../css/post.css">
<link rel="stylesheet" href="../../css/typeahead.css">
<link rel="stylesheet" href="../../css/header_nav.css">
<!-- [if lt IE 9]><script src="../../js/html5shiv.min.js"></script><![endif]-->
<script src="../../js/jquery-3.1.1.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js4/bootstrap.min.js"></script>
<script src="../../js/typeahead.min.js"></script>
<script src="../../js/get_details_office.js"></script>
<style>


    .container {
        width: 75%;
    }
        .msg{
			 direction: rtl;
    top: 50px;
    position: relative;
}
   .col-md-6 {
    float: right;
}
       .rtl {
        direction: rtl;
    }
    .hg_it {
    position: fixed;
    top: 54px;
    width: 72.5%;
}
</style>
<body>

   		<header>
			<nav class="navbar  navbar-light bg-light  fixed-top">
				<a class="navbar-brand brand_home" href="../../index.php">الصفحه الرئيسيه</a>
				<ul class="navbar-nav">
					<li class="nav-item ">
						<form class="navbar-form  form-inline my-2 my-lg-0" method="post">
						<input type="text" class="form-control typeahead" id="typeahead" placeholder="بحث" aria-label="Example text with button addon" aria-describedby="button-addon1" autofocus>
						<button class="btn btn-outline-success my-2 my-sm-0 search" type="button">بحث</button>
					</form>
					</li>
				</ul>
				<div class="nav-item dropdown ">
					<?php   include '../../setup/user/user.php'; ?>
				</div>
			</nav>
		</header>
    <div class="container" style="text-align:center;">
    <div class="msg"></div>
</div>
<script>
    $("#typeahead").focus();
$('input.typeahead').typeahead({
name: 'typeahead1',
remote:'../../search_live.php?key=%QUERY',
limit : 10
});
    </script>
<!-- end add dvice -->
<!-- php start change_pass -->
<?php   include '../../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
</body>
</html>
