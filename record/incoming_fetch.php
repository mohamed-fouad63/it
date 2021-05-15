<?php
session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
        switch ($search) {
    case "تم تكهينها":
        $search = "deleted";
        break;
    case "بقطاع الدعم الفنى":
        $search = "in_tts";
        break;
    case "بالمكتب":
        $search = "in_office";
        break;
    default:
     $search = mysqli_real_escape_string($conn, $_POST["query"]);   
}
 $query_all_in_it = "
  SELECT
  * FROM in_it 
  WHERE
  office_name LIKE '%$search%' OR
  id LIKE '%$search%' OR
  dvice_name LIKE '%$search%' OR
  sn LIKE '%$search%' OR
  damage LIKE '%$search%' OR
  date_in_it LIKE '%$search%' OR
  parcel_in_it LIKE '%$search%' OR
  parcel_in_it LIKE '%$search%' OR
  status LIKE '%$search%'
 ORDER  BY date_in_it DESC
 ";
}
else
{
 $query_all_in_it = "
  SELECT * FROM in_it  ORDER  BY date_in_it DESC";
}
$result = mysqli_query($conn, $query_all_in_it);
if($result)
{
while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["date_in_it"] ?></td>
<td ><?php echo $row_pc["parcel_in_it"]?> </td>
<td ><?php echo $row_pc["office_name"] ?></td>
<td ><?php echo $row_pc["dvice_name"] ?></td>
<td ><?php echo $row_pc["sn"] ?></td>
<td ><?php echo $row_pc["damage"] ?></td>
<td ><?php echo $row_pc["in_it_note"] ?></td>
<td ><?php echo $row_pc["parcel_out_it"]?> </td>
<td ><?php echo $row_pc["data_out_it"]?> </td>
<td ><?php
 //    if($row_pc["status"] == "in_office"){ echo "بالمكتب";} else {echo "بالدعم";}
    switch ($row_pc["status"]) {
    case "in_tts":
        echo "بقطاع الدعم الفتى بتاريخ ".$row_pc["date_auth_repair"];
        break;
    case "in_office":
        echo "بالمكتب";
        break;
    case "deleted":
        echo "تم تكهينها";
        break;
    default:
        echo " ";
}
    ?> </td>
<td style="display:none"><?php echo $row_pc["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_pc["num"] ?></td>
<td>
</td>  
</tr>
<?php }}
else
{
 echo 'لا توجد بيانات';
}

?> 
