<?php
session_start();
include '../connection.php';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);

 $query_all_in_it = "
  SELECT
  * FROM replace_sims 
  WHERE
  office_name LIKE '%$search%' OR
  router_name LIKE '%$search%' OR
  router_sn LIKE '%$search%' OR
  from_ip LIKE '%$search%' OR
  from_sim_num LIKE '%$search%' OR
  from_sim_type LIKE '%$search%' OR
  to_ip LIKE '%$search%' OR
  to_sim_num LIKE '%$search%' OR
  to_sim_type LIKE '%$search%' OR
  replace_date LIKE '%$search%'

 ";
}
else
{
 $query_all_in_it = "
  SELECT * FROM replace_sims  ORDER  BY replace_date DESC";
}
$result = mysqli_query($conn, $query_all_in_it);
if($result)
{
while($row_pc=mysqli_fetch_assoc($result)){
  switch ($row_pc["from_sim_type"]) {
    case 'vodafone':
      $back_ground_from = "#ec9797";
      break;
    
      case 'orange':
        $back_ground_from = "#f18a40";
        break;

        case 'etisalat':
          $back_ground_from = "#b4ec97";
          break;
  }

  switch ($row_pc["to_sim_type"]) {
    case 'vodafone':
      $back_ground_to = "#ec9797";
      break;
    
      case 'orange':
        $back_ground_to = "#f18a40";
        break;

        case 'etisalat':
          $back_ground_to = "#b4ec97";
          break;
  }
 ?>
<tr>
<td ><?php echo $row_pc["replace_date"] ?></td>
<td ><?php echo $row_pc["office_name"]?> </td>
<td ><?php echo $row_pc["router_name"] ?></td>
<td ><?php echo $row_pc["router_sn"] ?></td>
<td  ><?php echo $row_pc["from_ip"] ?></td>
<td style = "background :<?php echo $back_ground_from ;?>"><?php echo $row_pc["from_sim_type"] ?></td>
<td ><?php echo $row_pc["from_sim_num"] ?></td>
<td ><?php echo $row_pc["to_ip"] ?></td>
<td style = "background :<?php echo $back_ground_to ;?>" ><?php echo $row_pc["to_sim_type"] ?></td>
<td ><?php echo $row_pc["to_sim_num"] ?></td>
</tr>
<?php }}
else
{
 echo 'لا توجد بيانات';
}

?> 
