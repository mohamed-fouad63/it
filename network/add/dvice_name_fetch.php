<?php
//fetch.php
if(isset($_POST["query"]))
{
    echo '<option value=""></option>';
 $connect = mysqli_connect("localhost", "root", "12345678", "post");

  $query = "SELECT dvice_name FROM dvice_type WHERE id = '".$_POST["query"]."' GROUP BY dvice_name HAVING COUNT(*) >= 1";
  $result = mysqli_query($connect, $query);
  while($row = mysqli_fetch_array($result))
  {
echo "<option value='".$row["dvice_name"]."'>".$row["dvice_name"]."</option>";
  }

}
?>
