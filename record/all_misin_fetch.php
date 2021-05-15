<?php
session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
$search = mysqli_real_escape_string($conn, $_POST["query"]);
   

 $query_all_misin = "
 SELECT
  * FROM misin_it 
  WHERE
 

  it_name LIKE '%$search%' OR
  office_name LIKE '%$search%' OR
  misin_type LIKE '%$search%' OR
  misin_day LIKE '%$search%' OR
  misin_date LIKE '%$search%'
  
 ORDER  BY misin_date DESC

 ";
}
else
{
 $query_all_misin = "
  SELECT * FROM misin_it  ORDER  BY misin_date DESC";
}
$result = mysqli_query($conn, $query_all_misin);
if($result)
{
while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["it_name"] ?></td>
<td ><?php echo $row_pc["misin_day"]?> </td>
<td ><?php echo $row_pc["misin_date"] ?></td>
<td ><?php echo $row_pc["office_name"] ?></td>
<td ><?php echo $row_pc["misin_type"] ?></td>
<td ><?php echo $row_pc["start_time"] ?></td>
<td ><?php echo $row_pc["end_time"];?></td>
</tr>
<?php }}
else
{
 echo 'لا توجد بيانات';
}

?> 
