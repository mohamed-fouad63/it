
<?php
session_start();
include '../../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
include '../../connection.php';
$query_post_group = mysqli_query($conn, "SELECT post_group_name FROM post_group ");


?>
<!DOCTYPE html>
<html>
<title>مجموعات بريديه</title>
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
<script src="../../js/get_details_office_group.js"></script>
<style>

    body {
        color: black;
    }

    .msg{
        direction: rtl;
    }
    .container {
        width: 75%;
    }
        .msg{
    top: 65px;
    position: relative;
}
.details-text{
    height: auto;
}
   .col-md-6 {
    float: right;
}
       .rtl {
        direction: rtl;
    }
    .hg_it {
    position: fixed;
    top: 60px;
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
       <select class="custom-select post_group rtl" name="post_group">
          <?php  while($row_query_post_group=mysqli_fetch_assoc($query_post_group)){ ?>
            <option  value="<?php echo $row_query_post_group["post_group_name"];?>"
                ><?php echo $row_query_post_group["post_group_name"];?>
            </option>
           <?php } ?>
            </select>
      <button class="btn btn-outline-success my-2 my-sm-0 search" type="button">بحث</button>
               <button class="btn btn-outline-primary my-2 my-sm-0" href="#add_office_group" data-toggle="modal" type="button">اضافه</button>
    </form>
					</li>
				</ul>
				<div class="nav-item dropdown ">
					<?php   include '../../setup/user/user.php'; ?>
				</div>
			</nav>
		</header>
    <div class="container">
      <div class="msg"></div>
<!-- start add office group -->
    <form method="post">
<div id="add_office_group" class="modal fade" data-toggle="modal" role="dialog">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header rtl">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">اضافه مجموعه بريديه</h4>
</div>
<div class="modal-body">
<input type="text" name="office_group_name" class="form-control" >
</div>
<div class="modal-footer">

<button type="submit" class="btn btn-danger" name="add_office_group">اضافه </button>

<button type="button" class="btn btn-default" data-dismiss="modal">الغاء</button>
</div>
</div>
</div>
</div>
        </form>
    <?php if(isset($_POST['add_office_group'])){

      $office_group_name = $_POST['office_group_name'];
    $qyery_to_add = mysqli_query($conn, "SELECT post_group_name FROM post_group WHERE post_group_name LIKE '$office_group_name'");
if (mysqli_num_rows($qyery_to_add) >= 1){ echo "<script> alert ('مكرر')</script>"; }
    else {
        $add_office_group = "INSERT INTO post_group (post_group_name) VALUES ('$office_group_name')";
        if ($conn->query($add_office_group) === true){
     echo "<script> alert ('تم اضافه مجموعه جديده')</script>";
} else {  echo "<script> alert ('لم يتم اضافه مجموعه جديده / يوجد خطأ فى قاعده البيانات')</script>"; }
    }
}
    ?>
<!-- end add dvice -->
<!-- php start change_pass -->
<?php   include '../../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--start Logout Modal -->
<?php   include '../../setup/log/logout_form.php'; ?>
<!--end Logout Modal -->

</div>
</body>
</html>
