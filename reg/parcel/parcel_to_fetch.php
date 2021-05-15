<?php
session_start();
include '../../setup/session/no_session.php';
include '../../connection.php';
if(isset($_POST["query"]))
{
$search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query_all_in_it = "
  SELECT
  * FROM parcel_send 
  WHERE
  date LIKE '%$search%' OR
  barcode LIKE '%$search%' OR
  send_to LIKE '%$search%' OR
  subject LIKE '%$search%'
 ORDER  BY date DESC
 ";
}
 

else
{
 $query_all_in_it = "
  SELECT * FROM parcel_send  ORDER  BY date DESC";
}
$result = mysqli_query($conn, $query_all_in_it);
if($result)
{ ?>
<table class="table table-bordered table-sm">
    <tr>
        <th>التاريخ</th>
        <th>رقم الطرد</th>
        <th>المرسل اليه</th>
        <th style="width:35%;">الموضوع</th>
    </tr>

<?php
while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["date"] ?></td>
<td ><?php echo $row_pc["barcode"]?> </td>
<td ><?php echo $row_pc["send_to"] ?></td>
<td ><?php echo $row_pc["subject"] ?></td> 
</tr>
    <?php } ?></table><?php }
else
{
 echo 'لا توجد بيانات';
}

?> 


