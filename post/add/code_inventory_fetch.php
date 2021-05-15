<?php
//fetch.php
session_start();
if(isset($_POST["query1"]))
{
  include '../../connection.php';
  $query = "SELECT code_inventory FROM dvice_type WHERE dvice_name like '".$_POST["query1"]."'";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
      echo '<input type="text" class="form-control code_inventory" name = "code_inventory"  value="'.$row["code_inventory"].'" readonly >';
  }

}
?>
