<?php
session_start();
if(isset($_POST["action"]))
{
include '../../connection.php';
 $output = '';
 if($_POST["action"] == "change_sim_type")
   
     if($_POST["query"] == "none_sim_type"){
         $output .= '<option value="none_sim_num">اولا أختر نوع الشريحه</option>';
     } else
 {
  $query = "SELECT sim_num FROM sims WHERE sim_type = '".$_POST["query"]."' ";
  $result = mysqli_query($conn, $query);
$output .= '<option value = "none_sim_num"></option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["sim_num"].'">'.$row["sim_num"].'</option>';
  }
 }
 echo $output;
}
?>