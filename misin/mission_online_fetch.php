<?php
session_start();
$session_id = $_SESSION['id'];
include '../connection.php';

$query_all_in_it1 = "
SELECT it_name,id,misin_day,misin_date,office_name,misin_type,start_time,end_time,counter from misin_it_online  ORDER  BY misin_date ASC
";
$result = mysqli_query($conn, $query_all_in_it1);
if ($result) {
    while ($row_pc = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <td><?php echo $row_pc["it_name"] ?></td>z
            <td><?php echo $row_pc["misin_day"] ?></td>
            <td><?php echo $row_pc["misin_date"] ?></td>
            <td><?php echo $row_pc["office_name"] ?></td>
            <td><?php echo $row_pc["misin_type"] ?> </td>
            <td><?php echo $row_pc["start_time"] ?></td>
            <td><?php echo $row_pc["end_time"] ?></td>
            <td><?php echo $row_pc["id"] ?></td>
            <td><?php echo $row_pc["counter"] ?></td>
            <td>
                <a class='btn  btn-outline-secondary' onclick="misin_add();"><i class='fas fa-plus'></i></a>
                <a class='btn  btn-outline-secondary' onclick="misin_remove();"><i class='fas fa-trash-alt'></i></a>
            </td>
            <!--<td><button type="button" class="btn-edit" data-toggle="modal" data-target="#misin_view" onclick="misin_view()">
<i class="fas fa-print"></i></button></td>-->
        </tr>
<?php }
} else {
    echo '<tr><td>لا توجد بيانات</td></tr>';
}

?>