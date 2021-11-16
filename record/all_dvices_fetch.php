<?php
session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);    
 $query_all_in_it = "
  SELECT
  * FROM dvice 
  WHERE
  office_name LIKE '%$search%' OR
  dvice_name LIKE '%$search%' OR
  sn LIKE '%$search%' OR
  ip LIKE '%$search%' OR 
  note LIKE '%$search%'

 
 ";
}
else
{
 $query_all_in_it = "
  SELECT * FROM dvice ";
}
$result = mysqli_query($conn, $query_all_in_it);
if($result)
{

while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["office_name"] ?></td>
<td ><?php echo $row_pc["dvice_name"] ?></td>
<td ><?php echo $row_pc["sn"]?> </td>
<td ><?php echo $row_pc["ip"] ?></td>
<td ><?php echo $row_pc["pc_doman_name"] ?></td>
<td ><?php echo $row_pc["note"] ?></td>  
</tr>
<?php }

}
else
{
 echo 'لا توجد بيانات';
}

?> 