
 <?php
 session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query_all_in_it = "
 SELECT * from notice WHERE
  notice_date LIKE '%$search%' OR
  notice_noti LIKE '%$search%' OR
  notice_from LIKE '%$search%' OR
  notice_receive LIKE '%$search%' OR
  notice_type LIKE '%$search%' OR
  notice_description LIKE '%$search%' OR
  notice_procedure LIKE '%$search%'
 ORDER  BY notice_date DESC
 ";
}
else
{
 $query_all_in_it = "
SELECT * from notice ORDER  BY notice_date DESC";
}

$result = mysqli_query($conn, $query_all_in_it);
if($result)
{
while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["notice_date"] ?></td>z
<td ><?php echo $row_pc["notice_noti"]?></td>
<td ><?php echo $row_pc["notice_from"] ?></td>
<td ><?php echo $row_pc["notice_receive"] ?></td>
<td ><?php echo $row_pc["notice_type"]?> </td>
<td ><?php echo $row_pc["notice_description"] ?></td>
<td ><?php echo $row_pc["notice_procedure"] ?></td>
<td><a class='btn btn-outline-secondary' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="تعديل البلاغ"
data-target='#pc_model' onclick='edit_notice()'>
<i class='fas fa-edit'></i>
</a></td>
<td style="display:none;"><?php echo $row_pc["notice_id"] ?></td>
</tr>
<?php }}
else
{
 echo 'لا توجد بيانات';
}

?> 
  