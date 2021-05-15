<?php
session_start();
include '../../setup/session/no_session.php';
include '../../connection.php';
date_default_timezone_set('Africa/Cairo');
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تسجيل المسجلات الصادره</title>
    <link rel="icon" href="../../img/it.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../../css4/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/typeahead.css">
    <link rel="stylesheet" href="../../css/header_nav.css">
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js4/bootstrap.min.js"></script>
    <script src="../../js/typeahead.min.js"></script>
    <style>
        .form-group {
            direction: rtl;
        }

        input {
            text-align: right;
        }

        input[type="submit"] {
            text-align: center;
        }

        h3 , a {
            text-align: center;
        }

        form {
            margin-top: 90px;
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
            width: 170px;
            justify-content: center;
        }

        .mos1 {
            border: 0.1px solid darkgrey;
            height: min-content;
            padding: inherit;
            cursor: pointer;
            display: flex;
            height: auto;
            width: 170px;
            justify-content: center;
        }

        .mos:hover {
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
            <a class="navbar-brand brand_home" href="../../index.php">الصفحه الرئيسيه</a>
            <div class="nav-item dropdown ">
                <?php   include '../../setup/user/user.php'; ?>
            </div>
        </nav>
    </header>
    <div class="container">
        <form method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inputAddress2">التاريخ</label>
                <input type="date" class="col-sm-2 form-control" name='_date' id="inputAddress2" value="<?php echo date('Y-m-d'); ?>" readonly>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inputparcode">رقم الباركود</label>
                <input type="tetx" class="col-sm-2 form-control masked" name="barcode" id="czc" placeholder="RR123456789EG" onkeyup="m(this)" data-charset="__XXXXXXXXX__" autocomplete="off" autofocus>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inputto">المرسل اليه</label>
                <input type="text" class="col-sm-2 form-control typeahead" name="to" id="typeahead" autocomplete="off" placeholder="المرسل اليه">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="inputAddress">الموضوع</label>
                <textarea class="col-sm-4 form-control" rows="5" name="subject" id="subject" autocomplete="off" placeholder="الموضوع"></textarea>
                <div class="dis-grid col-sm-2">
                    <span id="t4510" class="mos" onclick="getid(this)">حباره 4510 </span>
                    <span id="d4510" class="mos" onclick="getid(this)">درام 4510 </span>
                    <span id="t4020" class="mos" onclick="getid(this)">حباره 4020 </span>
                    <span id="t3750" class="mos" onclick="getid(this)">حباره 3750 </span>
                </div>
                <div class="dis-grid col-sm-2">
                    <span id="hp506" class="mos" onclick="getid(this)">حباره hp 605 </span>
                    <span id="hp506" class="mos" onclick="getid(this)">حباره hp 506 </span>
                    <span id="hp506" class="mos" onclick="getid(this)">ماوس </span>
                    <span id="hp506" class="mos" onclick="getid(this)">كيبورد </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <input type="submit" name="insert_to" value="ادخال" class="col-sm-2 form-control btn-primary" id="inputinser">
            
            
                <label class="col-sm-2 col-form-label"></label>
                <input type="submit" formaction="to_report.php" formmethod="post" formtarget="_blank" value='تقرير صادر اليوم' class="col-sm-2 form-control btn-warning" id="inputZip">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <a href="to_edit.php" class="col-sm-2 form-control btn btn-danger" target="_blank">تعديل الصادر</a>
            </div>
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
if(isset($_POST["insert_to"]))
{
/* echo $_POST['barcode'].$_POST['to'].$_POST['subject'].$_POST['_date'];*/
$date = $_POST["_date"];
$barcode = $_POST["barcode"];
$to = $_POST["to"];
$subject = $_POST["subject"];
if(strlen($barcode) == 13){
if($to == "" or $subject == "")
{ ?>
        <script>
            alert('الحقول فارغه')

        </script>
        <?php }
else
{
$insert_new = "
INSERT INTO send 
(date,barcode,send_to,subject,admin)
VALUES ('$date','$barcode','$to','$subject','$session_username')
";
if (!$conn->query($insert_new) === true)
{
    echo "<script> alert (' لم يتم اضافه المسجل - باركود مكرر')</script>";
}
else
{

}
}
}
else {
echo "<script> alert ('الباركود غير صحيح')</script>";
}
}
?>
        <script>
            $("#typeahead").focus();
            $('input.typeahead').typeahead({
                name: 'typeahead1',
                remote: '../../search_live.php?key=%QUERY',
                limit: 10
            });

        </script>
        <script src="../../js/masking-input.js" data-autoinit="true"></script>
        <script>
            function m(id) {
                $c = id.value.toUpperCase();
                document.getElementById('czc').value = $c;
            }

        </script>
        <script>
            function getid(di) {
                if (subject.value == '') {
                    subject.value = 'طلب ' + di.textContent;
                    document.getElementById("subject").focus();

                }
                else
                {
                    subject.value = subject.value + " + " + di.textContent;
                    document.getElementById("subject").focus();

                }
            }

        </script>
        <script>
            function getid1(di) {
                if (subject.value == '') {
                    subject.value = di.textContent;
                    document.getElementById("subject").focus();

                } else {
                    subject.value = subject.value + " + " + di.textContent;
                    document.getElementById("subject").focus();

                }
            }

        </script>
    </div>
    <!-- php start change_pass -->
    <?php   include '../../setup/pass/change_password_form.php'; ?>
    <!-- php end change_pass -->
    <!--Logout Modal -->
    <?php   include '../../setup/log/logout_form.php'; ?>
    <!--Logout Modal -->
</body>

</html>
