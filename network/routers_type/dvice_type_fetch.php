<?php
//fetch.php
session_start();
$dvice_type = $_POST["query1"];
$classification = $_POST["query2"];
$connection = $_POST["query3"];
if(isset($_POST["query1"]))
{
  echo '<option value=""></option>';
$conn1=mysqli_connect("localhost","root","12345678","post");
  $query = "SELECT classification FROM network_type WHERE dvice_type = '$dvice_type'";
  $result = mysqli_query($conn1, $query);
  while($row = mysqli_fetch_array($result))
  {
    $classification1 = $row["classification"]; 
  ?>
  <option
  <?php if( $classification1 == $classification){ echo 'selected' ;} ?>
  value="<?php echo $classification1 ; ?>">
<?php echo $classification1 ; ?>
</option>
 <?php }
}
?>
