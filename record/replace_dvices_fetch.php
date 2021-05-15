<?php
session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);    
 $query_all_in_it = "
 SELECT * 
   FROM replace_pices_dvice 
   WHERE 
   id	 LIKE '%$search%' 
   OR
   office_name LIKE '%$search%'
   OR
   replace_type LIKE '%$search%'
   OR
   dvice_name LIKE '%$search%'
   OR
   sn LIKE '%$search%'
   ORDER  BY date DESC
 ";
}
else
{
 $query_all_in_it = "
  SELECT * FROM replace_pices_dvice  ORDER  BY date DESC ";
}
$result = mysqli_query($conn, $query_all_in_it);
if($result)
{

while($row_pc=mysqli_fetch_assoc($result)){
 ?>
<tr>
<td ><?php echo $row_pc["date"] ?></td>
<td ><?php echo $row_pc["office_name"] ?></td>
<td ><?php echo $row_pc["dvice_name"]?> </td>
<td ><?php echo $row_pc["sn"] ?></td>
<td ><?php echo $row_pc["replace_type"] ?></td>

<!--<td ><?php
     /*
    
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
}*/
    
    ?> </td> -->
 
</tr>
<?php }

}
else
{
 echo 'لا توجد بيانات';
}

?> 
