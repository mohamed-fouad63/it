<?php
//fetch.php
session_start();
if(isset($_POST["query1"]))
{
$conn1=mysqli_connect("localhost","root","12345678","post");
  $query = "SELECT code_inventory FROM dvice_type WHERE dvice_name like '".$_POST["query1"]."'";
  $result = mysqli_query($conn1, $query);
  while($row = mysqli_fetch_array($result))
  {
      echo '<input type="text" class="form-control code_inventory" name = "code_inventory"  value="'.$row["code_inventory"].'" readonly >';
  }

}
?>
