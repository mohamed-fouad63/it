<?php
session_start();
include '../connection.php';
date_default_timezone_set('Africa/Cairo');
$it_name = $_POST['it_name'];
$id = $_SESSION['id'];
$office_name = $_POST['office_name'];
$manteqa = 'المنطقه';
$misin_date = $_POST['misin_date'];
$badal_raha_date_date = $_POST['badal_raha_date'];
$date = $misin_date;
$nameOfDay = date('D', strtotime($date));

switch ($nameOfDay) {
  case "Fri":
    $nameOfDay = "الجمعه";
    break;
  case "Sat":
    $nameOfDay = "السبت";
    break;
  case "Sun":
    $nameOfDay = "الأحد";
    break;
  case "Mon":
    $nameOfDay = "الأثنين";
    break;
  case "Tue":
    $nameOfDay = "الثلاثاء";
    break;
  case "Wed":
    $nameOfDay = "الأربعاء";
    break;
  case "Thu":
    $nameOfDay = "الخميس";
    break;
}

if ($nameOfDay == "الجمعه") {
  echo '<script>alert("لا توجد ماموريات يوم الجمعه");</script>';
} else if (empty($office_name)) {
  echo '<script>alert(" قم بتحديد مكتب المرور ");</script>';
} else {
  $sql_insert_in_misin = "INSERT INTO misin_it_online (
    id,
misin_day,
misin_date,
it_name,
office_name
)
VALUES (
  '$id',
'$nameOfDay',
'$misin_date',
'$it_name',
'$office_name'

),
(
  '$id',
'السبت',
'$badal_raha_date_date',
'$it_name',
'$manteqa'

)

";
  if ($conn->query($sql_insert_in_misin) === true) { ?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <style>
    p {
      font-size: 39px;
      text-align: justify;
      
    }

    .page {
      text-align: center;
      width: 230mm;
      min-height: 297mm;
      padding: 20mm;
      margin: 10mm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      font-weight: bold !important;
    }
    h1,h2,h3{
      font-weight: bold;
    }
.date_misin{

}
@font-face {
    font-family: ArabicTwo_Bold;
    src: url( ArabicTwo_Bold.eot);
}

@font-face {
    font-family: ArabicTwo_Bold;
    src: url( ArabicTwo_Bold.ttf);
}
    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      html,
      body {
        width: 210mm;
        height: 297mm;

      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
        font-weight: bold;
      }

      .btn {
        display: none;
      }
      .date_misin{
        direction: ltr;
      }
    }
  </style>
    <script type="text/javascript">
    var replaceDigits = function () {
      var map = ["&#x0660;", "&#x0661;", "&#x0662", "&#x0663", "&#x0664;", "&#x0665", "&#x0666", "&#x0667", "&#x0668", "&#x0669"]
      document.body.innerHTML = document.body.innerHTML.replace(/\d(?=[^<>]*(<|$))/g, function ($0) { return map[$0] });
    }
    window.onload = replaceDigits;
  </script>
</head>

<body>
  <div class="page">
    <div class="btn">
      <button type="button" class="btn btn-primary" name="misin_form_sub2" onclick="window.print();"> طباعه </button>
      <button type="button" class="btn btn-warning" onclick="window.location.href='my_misin.php'"
        data-dismiss="modal">تم</button>
    </div>
    <div>
      <h1>
        السيد الاستاذ / مدير عام منطقه بريد
      </h1>
    </div>
    <div>
      <h3>
        بعد التحيه
      </h3>
    </div>
    <div>
      <p>
        الرجاء من سيادتكم الموافقه على اعطائى
         <?php echo $office_name ; ?>
          يوم
           <?php echo $nameOfDay ; ?> 
          الموافق
          <span class="date_misin">
           <?php echo $badal_raha_date_date ; ?>
           </span>
            و ذلك عن يوم السبت الموافق
            
            <?php echo  $misin_date;?>
      </p>
    </div>
    <div>
      <h2>
        و لسيادتكم جزيل الشكر
      </h2>
    </div>
    <div style="text-align: left;">
  <h2>
    مقدمه لسيادتكم /
  </h2>
  </div>
  </div>

</body>

</html>
<?php
}
}
?>