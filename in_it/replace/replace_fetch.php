<?php
//fetch.php
session_start();
if(isset($_POST["action"]))
{
include '../../connection.php';
 $output = '';
 if($_POST["action"] == "dvice_id")
   
     if($_POST["query"] == " "){
         $output .= '<option value="">اولا أختر نوع الجزء التالف</option>';
     } else
 {
  $query = "SELECT dvice_name FROM replace_pices_type WHERE id = '".$_POST["query"]."' GROUP BY dvice_name HAVING COUNT(*) >= 1";
  $result = mysqli_query($conn, $query);
$output .= '<option></option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["dvice_name"].'">'.$row["dvice_name"].'</option>';
  }
 }
 echo $output;
}
?>
