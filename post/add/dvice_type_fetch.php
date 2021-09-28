<?php
//fetch.php
session_start();
if(isset($_POST["query1"]))
{
$conn1=mysqli_connect("localhost","root","12345678","post");
  $query = "SELECT dvice_type FROM dvice_type WHERE dvice_name_new like '".$_POST["query1"]."'";
  $result = mysqli_query($conn1, $query);
  while($row = mysqli_fetch_array($result))
  {
      echo '<input type="text" class="form-control dvice_type" name = "dvice_type"  value="'.$row["dvice_type"].'" readonly >';
  }

}
?>
