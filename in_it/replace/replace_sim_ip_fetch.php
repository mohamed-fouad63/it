<?php
session_start();
if(isset($_POST["action"]))
{
include '../../connection.php';
 $output = '';
 if($_POST["action"] == "change_sim_num")
   
     if($_POST["query"] == "none_sim_num"){
        echo '<label   class="form-control" readonly >اختر رقم الشريحه</label>';

     } else
 {
  $query = "SELECT sim_ip FROM sims WHERE sim_num = '".$_POST["query"]."' ";
  $result = mysqli_query($conn, $query);

  while($row = mysqli_fetch_array($result))
  {
  
   if ($row["sim_ip"] !== ''){
    echo '<input type = "text" class="form-control" name = "to_ip" value = "'.$row["sim_ip"].'" readonly >';
   }
   else {
       echo  '<input type = "text"  class="form-control" name = "to_ip" placeholder = "الشريحه IP  ادخل" >';
   }
  }
 }
 echo $output;
}
?>
