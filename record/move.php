<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html>
<head>
<meta lang="ar" charset="utf-8"/>
<title>سجل المنقول</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
	<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
	<link rel="stylesheet" href="../css4/bootstrap.min.css">
	<link rel="stylesheet" href="../css/header_nav.css">
	<link rel="stylesheet" href="../css/incoming.css">
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js4/bootstrap.min.js"></script>
	<!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
	<style></style>
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
				<div class="nav-item dropdown ">
					<?php   include '../setup/user/user.php'; ?>
				</div>
			</nav>
		</header>
    <div class="tableview tableview-has-footer">
  <div class="tableview-holder" id="tableview-holder">
<table>
<thead>
<tr>
    <th caption="نوع الجهاز" class=""></th>
    <th caption="السريال" class="t"></th>
    <th caption="من" class="t"></th>
    <th caption="الى" class="t"></th>
    <th caption="تاريخ النقل" class=""></th>
    <th caption="عن طريق" class=""></th>
    <th caption="منقول كـ" class=""></th>
    <th caption="ملاحظات" ></th>
    <!-- <th style="display:none;" caption="بمعرفه"  ></th> -->
</tr>
    </thead>
    <tbody id="result"></tbody>
      </table>
        </div>
                <!-- <script>
        var heightclient = document.documentElement.clientHeight - 157;
            document.getElementById('tableview-holder').style.height = heightclient + 'px';
           // alert(heightclient);
        </script> -->
    </div>
    <!-- end add dvice -->
<!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
    </div>

    </body>
  <script>
$(document).ready(function(){
 load_data();
 function load_data(query)
 {
  $.ajax({
   url:"move_fetch.php",
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
