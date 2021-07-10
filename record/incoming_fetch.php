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
 office_name,date_in_it ,parcel_in_it,dvice_name,sn,damage,date_in_it,parcel_in_it,
 status,in_it_note,parcel_out_it,data_out_it,data_deleted,deleted_parcel,date_auth_repair
  FROM in_it 
  WHERE
  office_name LIKE '%$search%' OR
  id LIKE '%$search%' OR
  dvice_name LIKE '%$search%' OR
  sn LIKE '%$search%' OR
  damage LIKE '%$search%' OR
  date_in_it LIKE '%$search%' OR
  parcel_in_it LIKE '%$search%' OR
  status LIKE '%$search%' OR
  data_deleted LIKE '%$search%' OR
  deleted_parcel LIKE '%$search%'
 ORDER  BY date_in_it DESC
 ";
}
else
{
 $query_all_in_it = "
  SELECT
  office_name,date_in_it ,parcel_in_it,dvice_name,sn,damage,status,in_it_note,
  parcel_out_it,data_out_it,data_deleted,deleted_parcel,date_auth_repair
   FROM in_it  ORDER  BY date_in_it DESC";
}
$result = mysqli_query($conn, $query_all_in_it);
if($result)
{
while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["date_in_it"]; ?></td>
<td ><?php echo $row_pc["parcel_in_it"];?> </td>
<td ><?php echo $row_pc["office_name"]; ?></td>
<td ><?php echo $row_pc["dvice_name"]; ?></td>
<td ><?php echo $row_pc["sn"]; ?></td>
<td ><?php echo $row_pc["damage"]; ?></td>
<td ><?php echo $row_pc["in_it_note"]; ?></td>
<td ><?php echo $row_pc["parcel_out_it"]; echo $row_pc["deleted_parcel"];?> </td>
<td ><?php echo $row_pc["data_out_it"] ; echo $row_pc["data_deleted"];?> </td>
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
</tr>
<?php }}
else
{
 echo 'لا توجد بيانات';
}

?> 
