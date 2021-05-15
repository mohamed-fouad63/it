<?php
session_start();
include '../connection.php';
$query_all_in_it1 = "
select a.office_name,c.money_code,a.sn,b.ip,a.damage
    from in_it a
        inner join
            dvice b
                on a.num = b.num and a.dvice_name like '%vx 510' and status = 'in_it'
                    inner join
                        all1 c
                            on b.office_name = c.office_name
";
/* OR
in_it.dvice_name LIKE '%675'  AND status LIKE 'in_it' */

$result = mysqli_query($conn, $query_all_in_it1);
if($result)
{

while($row_pc=mysqli_fetch_assoc($result)){

 ?>
<tr>
<td ><?php echo $row_pc["office_name"] ?></td>
<td ><?php echo $row_pc["money_code"] ?></td>
<!--<td ><?php echo $row_pc["dvice_name"] ?></td>-->
<td ><?php echo $row_pc["sn"]?> </td>
<td ><?php echo $row_pc["ip"] ?></td>
<td ><?php echo $row_pc["damage"] ?></td>

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
<td style="display:none"><?php echo $row_pc["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_pc["num"] ?></td>
<td>
</td>  
</tr>
<?php }

}
else
{
 echo '<tr><td>لا توجد بيانات</td></tr>';
}

?> 