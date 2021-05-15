<?php
session_start();
include '../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
date_default_timezone_set('Africa/Cairo');
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تسجيل  البلاغات</title>
    <link rel="stylesheet" href="../css4/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/typeahead.css">
    <link rel="stylesheet" href="../css/header_nav.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js4/bootstrap.min.js"></script>
    <script src="../js/typeahead.min.js"></script>
    <style>
        .form-group{
            direction: rtl;
        }
        input {
            text-align: right;
        }
        input[type="submit"] {
            text-align: center;
        }
        h3 {
            text-align: center;
        }


    form {
        margin-top:90px;
    }
        
        #czcMask {
            display: none;
        }
        .col-sm-2 {
    max-width: unset;
}
  .mos {
    border: 0.1px solid darkgrey;
    height: min-content;
    padding: inherit;
    cursor: pointer;
    display: flex;
    height: 30px;
    width: 178px;
    justify-content: center;
}
        .mos:hover{
            background-color: beige;
        }
        .dis-grid {
            display: inline-grid;
            text-align: center;
        }
    </style>
</head>

<body>
		<header>
		<nav class="navbar  navbar-light bg-light  fixed-top">
		<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
			<div class="nav-item dropdown ">
				<?php   include '../setup/user/user.php'; ?>
			</div>
		</nav>
		</header>
   <div class="container">
    <form method="post">
   <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="inputAddress2">التاريخ</label>
    <input type="date" class="col-sm-3 form-control" name='notice_date' id="inputAddress2" value="<?php echo date('Y-m-d'); ?>">
     <label class="col-sm-2 col-form-label">القائم بالبلاغ</label>
      <input type="text" class="col-sm-2 form-control" name="notice_noti" required>
  </div> 

    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="inputto">الجهه</label>
      <input type="text" class="form-control typeahead" name="notice_from" required autocomplete="off" placeholder="الجهه المبلغ عنها">
       <label class="col-sm-2 col-form-label" for="inputto">نوع البلاغ</label>
      <select class="custom-select col-sm-2" name="notice_type" required>
  <option selected></option>
  <option value="شبكه">شبكه</option>
  <option value="جهاز /طابعه">جهاز /طابعه</option>
  <option value="خدمه">خدمه</option>
  <option value="مستلزمات تشغيل">مستلزمات تشغيل</option>
  <option value="أسماء مستخدمين">أسماء مستخدمين</option>
</select>
    </div>

<div class="form-group row">
     
    </div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="inputAddress">تفاصيل البلاغ</label>
    <textarea class="col-sm-3 form-control" rows="5" name="notice_description" required placeholder="تفاصيل البلاغ"></textarea>
        <label class="col-sm-2 col-form-label" for="inputAddress">الاجراء</label>
    <textarea class="col-sm-3 form-control" rows="5" name="notice_procedure" required autocomplete="off" placeholder="الاجراء"></textarea>
  </div>
<div class="form-group row">

  </div> 
    <div class="form-group row">
     <label class="col-sm-2 col-form-label"></label>
      <input type="submit" name="insert_notice" value="ادخال" class="col-sm-2 form-control btn-primary" id="inputinser">
    </div>
 <!--   <div class="form-group row">
     <label class="col-sm-2 col-form-label"></label>
      <input type="submit" formaction="to_report.php" formmethod="post" formtarget="_blank" value= 'تقرير صادر اليوم' class="col-sm-2 form-control btn-warning" id="inputZip">
    </div> -->

  <!--<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        تقرير فتره
      </label>
    </div> 
      </div>-->
 
</form>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    /* echo $_POST['barcode'].$_POST['to'].$_POST['subject'].$_POST['_date'];*/
    
    $notice_date = $_POST["notice_date"];
    $notice_noti = $_POST["notice_noti"];
    $notice_from = $_POST["notice_from"];
    $notice_type = $_POST["notice_type"];
    $notice_description = $_POST["notice_description"];
    $notice_procedure = $_POST["notice_procedure"];
    
    $insert_new = "
            INSERT INTO notice 
            (notice_date,notice_noti,notice_from,notice_receive,notice_type,notice_description,notice_procedure)
    VALUES ('$notice_date','$notice_noti','$notice_from','$session_username','$notice_type','$notice_description','$notice_procedure')
            ";
                if ($conn->query($insert_new) === true)
                {
                    
                } else
                    {
                    echo "<script> alert (' لم يتم اضافه المسجل - باركود مكرر')</script>";
                    }
}
?>
    

   <script>
       $("#typeahead").focus();
$('input.typeahead').typeahead({
name: 'typeahead1',
remote:'../search_live.php?key=%QUERY',
limit : 10
});
       </script>


    </div>
                   <!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
</body>
</html>


