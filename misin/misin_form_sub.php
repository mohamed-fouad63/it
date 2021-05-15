<?php
session_start();
include '../connection.php';
date_default_timezone_set('Africa/Cairo');
$id = $_POST['it_id'];
$it_name = $_POST['it_name'];
$office_name = $_POST['office_name'];
$misin_type = $_POST['misin_type'];
$misin_date = $_POST['misin_date'];
$end_time = $_POST['end_time'];
$start_time = $_POST['start_time'];
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
  $sql_insert_in_misin = "INSERT INTO misin_it (
misin_day,
misin_date,
id,
it_name,
office_name,
misin_type,
start_time,
end_time
)
VALUES (
'$nameOfDay',
'$misin_date',
'$id',
'$it_name',
'$office_name',
'$misin_type',
'$start_time',
'$end_time'
)";
  if ($conn->query($sql_insert_in_misin) === true) {
    
  }
}
