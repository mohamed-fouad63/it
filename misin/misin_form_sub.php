<?php
session_start();
include '../connection.php';
date_default_timezone_set('Africa/Cairo');
$manteqa = 'المنطقه';
$id = $_POST['it_id'];
$it_name = $_POST['it_name'];
// $office_name = (emptye($_POST['office_name'])) ? "" : $_POST['office_name'] ;
if(empty($_POST['office_name'])){
  $office_name = "";
} else {
  $office_name = $_POST['office_name'];
}
if(empty($_POST['misin_type'])){
  $misin_type = "";
} else {
  $misin_type = $_POST['misin_type'];
}
$misin_date = $_POST['misin_date'];
if(empty($_POST['start_time'])){
  $start_time = "";
} else {
  $start_time = $_POST['start_time'];
}
if(empty($_POST['end_time'])){
  $end_time = "";
} else {
  $end_time = $_POST['end_time'];
}
$badal_raha_date_date = $_POST['badal_raha_date'];
$misin_cairo = $_POST['misin_cairo'];

if(empty($_POST['ill_date'])){
  $ill_date = "";
} else {
  $ill_date = $_POST['ill_date'];
}

$date = $misin_date;
$nameOfDay = date('D', strtotime($date));

switch ($nameOfDay) {
  case "Fri":
    $nameOfDay = "الجمعه";
    break ;
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

echo $office_name;
$sql_insert_in_misin = "INSERT INTO
misin_it (misin_day,misin_date,id,it_name,office_name,misin_type,start_time,end_time)
VALUES ('$nameOfDay','$misin_date','$id','$it_name','$office_name','$misin_type $misin_cairo','$start_time','$end_time')";

$sql_insert_misin = "INSERT INTO misin_it (id,misin_day,misin_date,it_name,office_name)
VALUES ('$id','$nameOfDay','$misin_date','$it_name','$office_name'),
('$id','السبت','$badal_raha_date_date','$it_name','$manteqa')";

 if (empty($office_name)) {
  echo '<script>alert(" قم بتحديد مكتب المرور ");</script>';
}
else if ($nameOfDay == "الجمعه"){
  echo '<script>alert(" لا يوجد ماموريات يوم الجمعه ");</script>';
}
else if($office_name == 'بدل راحه'){
  $conn->query($sql_insert_misin);
}
else if($office_name == 'اجازه مرضيه'){
  $start_ill_date = strtotime( $misin_date );
$end_ill_date = strtotime(  $ill_date);

for ( $i = $start_ill_date; $i <= $end_ill_date; $i = $i + 86400 ) {
  $this_ill_Date = date( 'Y-m-d', $i );
  echo  $this_ill_Date;
  $name_this_ill_Date = date('D', strtotime($this_ill_Date));
  switch ($name_this_ill_Date) {
    case "Fri":
      $name_this_ill_Date = "الجمعه";
      continue 2;
    case "Sat":
      $name_this_ill_Date = "السبت";
      continue 2;
    case "Sun":
      $name_this_ill_Date = "الأحد";
      break;
    case "Mon":
      $name_this_ill_Date = "الأثنين";
      break;
    case "Tue":
      $name_this_ill_Date = "الثلاثاء";
      break;
    case "Wed":
      $name_this_ill_Date = "الأربعاء";
      break;
    case "Thu":
      $name_this_ill_Date = "الخميس";
      break;
  }
  echo  $name_this_ill_Date;
  $sql_insert_ill_in_misin = "INSERT INTO misin_it (id,misin_day,misin_date,it_name,office_name)
  VALUES ('$id','$name_this_ill_Date','$this_ill_Date','$it_name','$office_name')";
$conn->query($sql_insert_ill_in_misin);
}
}
else {
  $conn->query($sql_insert_in_misin) === true ;
}
