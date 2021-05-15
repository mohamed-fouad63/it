<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
//if ( $session_role != "admin" ){ header('location: not.php');}
?>

<!DOCTYPE html>
<html>
<head>
<meta lang="ar" charset="utf-8"/>
<title>ماموريه pos </title>
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
		<link rel="stylesheet" href="../css4/bootstrap.min.css">
		<link rel="stylesheet" href="../css/incoming.css">
		<link rel="stylesheet" href="../css/header_nav.css">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../js/popper.min.js"></script>
		<script src="../js4/bootstrap.min.js"></script>
		<!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
<style>
    h2 {margin-top: 0;}
table tr{transition: all .25s ease-in-out;}
table tr:hover{background-color: #ddd;}
</style>
</head>
<body>
<div class="containe">
			<header>
				<nav class="navbar  navbar-light bg-light  fixed-top">
					<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
					<div class="nav-item dropdown ">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $session_username; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#logout" data-toggle="modal">تسجيل الخروج</a>
							<a class="dropdown-item" href="#changepass" data-toggle="modal">تغيير كلمه المرور</a>
						</div>
					</div>
				</nav>
			</header>
    <div class="tableview tableview-has-footer">
  <div class="tableview-holder" id="tableview-holder">
<table>
<thead>
<tr>
    <th caption="مكتب " class=""></th>
    <th caption="الكود المالى" class=""></th>
  <!--  <th caption="نوع الجهاز" class=""></th>-->
    <th caption="السريال" class=""></th>
    <th caption=" IP" class=""></th>
    <th caption="العطل" class=""></th>
</tr>
    </thead>
    <tbody id="result"></tbody>
      </table>
        </div>
    </div>
    </div>
<!--start change passord -->
                    <?php   include '../setup/pass/change_password_form.php'; ?>
                    <!-- end change_pass -->
                    <!--start Logout Modal -->
                    <?php   include '../setup/log/logout_form.php'; ?>
                    <!-- end Logout Modal -->

    </body>
  <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"misin_pos_fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
</html>
