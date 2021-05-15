<?php
session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
$search = mysqli_real_escape_string($conn, $_POST["query"]);
   

 $query_all_misin = "
 SELECT
  * FROM move_to 
  WHERE
 

  dvice_name LIKE '%$search%' OR
  sn LIKE '%$search%' OR
  office_name_from LIKE '%$search%' OR
  office_name_to LIKE '%$search%' OR
  date LIKE '%$search%'
  
 ORDER  BY date DESC

 ";
}
else
{
 $query_all_misin = "
  SELECT * FROM move_to  ORDER  BY date DESC";
}
$result = mysqli_query($conn, $query_all_misin);
if($result)
{
while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["dvice_name"] ?></td>
<td ><?php echo $row_pc["sn"]?> </td>
<td ><?php echo $row_pc["office_name_from"] ?></td>
<td ><?php echo $row_pc["office_name_to"] ?></td>
<td ><?php echo $row_pc["date"] ?></td>
<td ><?php echo $row_pc["move_by"] ?></td>
<td ><?php echo $row_pc["move_like"];?></td>
<td ><?php echo $row_pc["move_note"] ?></td>
<!-- <td ><?php echo $row_pc["admin_move"];?></td> -->
</tr>
<?php }}
else
{
 echo 'لا توجد بيانات';
}

?> 
