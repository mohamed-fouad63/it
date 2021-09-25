<?php
//fetch.php
session_start();
if(isset($_POST["query"]))
{
    echo '<option value=""></option>';
$conn1=mysqli_connect("localhost","root","12345678","post");

  $query = " SELECT dvice_name_new FROM dvice_type WHERE id = '".$_POST["query"]."' GROUP BY dvice_name ASC ";
  $result = mysqli_query($conn1, $query);
  while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row["dvice_name_new"]."'>".$row["dvice_name_new"]."</option>";
  }

}
?>
