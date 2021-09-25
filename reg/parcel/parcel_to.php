<?php
session_start();
include '../../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
date_default_timezone_set('Africa/Cairo');
include '../../connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الطرود الصادره</title>
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

        h3 {
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
            width: 178px;
            justify-content: center;
        }

        .mos:hover {
            background-color: beige;
        }

        .dis-grid {
            display: inline-grid;
            text-align: center;
            margin-right: 5px;
        }

        textarea {
            resize: none;
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
                <div class="dis-grid">
                    <span id="675" class="mos" onclick="getid(this)">ماكينه معاشات vx 675  </span>
                    <span id="520" class="mos" onclick="getid(this)">ماكينه معاشات vx 520  </span>
                    <span id="510" class="mos" onclick="getid(this)">ماكينه معاشات vx 510  </span>
                    <span id="adb" class="mos" onclick="getid(this)">شاحن ماكينه معاشات </span>
                </div>
                <div class="dis-grid ">
                    <span id="p556" class="mos" onclick="getid(this)">جهاز حاسب p556 </span>
                    <span id="p420" class="mos" onclick="getid(this)">جهاز حاسب p420 </span>
                    <span id="p400" class="mos" onclick="getid(this)">جهاز حاسب p400 </span>
                    <span id="p3500" class="mos" onclick="getid(this)">جهاز حاسب p3500 </span>
                </div>
                <div class="dis-grid ">
                    <span id="p556" class="mos" onclick="getid(this)">طابعه سامسونج </span>
                    <span id="p556" class="mos" onclick="getid(this)">ماكينه pos BITEL</span>
                    <span id="p400" class="mos" onclick="getid(this)">باور صبلاى يخص جهاز حاسب الى</span>
                    <span id="p3500" class="mos" onclick="getid(this)">مازر بورد يخص جهاز حاسب الى</span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <input type="submit" name="insert" value="ادخال" class="col-sm-2 form-control btn-primary" id="inputinser">
                <label class="col-sm-2 col-form-label"></label>
                <input type="submit" formaction="parcel_to_report.php" formmethod="post" formtarget="_blank" value='تقرير صادر اليوم' class="col-sm-2 form-control btn-warning" id="inputZip">
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <a href="parcel_to_edit.php" class="col-sm-2 form-control btn btn-danger" target="_blank">تعديل الطرود الوارده</a>
            </div>
        </form>
        <?php
if(isset($_POST["insert"]))
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
            INSERT INTO parcel_send 
            (date,barcode,send_to,subject,admin)
            VALUES ('$date','$barcode','$to','$subject','$session_username')
            ";
                if ($conn->query($insert_new) === true)
                {
                    
                } else
                    {
                    echo "<script> alert (' لم يتم اضافه الطرد - باركود مكرر')</script>";
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
                    subject.value = '' + di.textContent;
                    //document.getelementbyid('subject').select();
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
