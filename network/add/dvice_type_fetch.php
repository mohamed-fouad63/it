<?php
//fetch.php

if(isset($_POST["query1"]))
{
  include '../../connection.php';
  $query = "SELECT dvice_type FROM dvice_type WHERE dvice_name like '".$_POST["query1"]."'";
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result))
  {
      echo '<input type="text" class="form-control dvice_type" name = "dvice_type"  value="'.$row["dvice_type"].'" readonly >';
  }

}
?>
