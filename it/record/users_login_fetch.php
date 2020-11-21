<?php
include '../connection.php';

$query_tbl_users_login = "
  SELECT * FROM tbl_users_login";

$result = mysqli_query($conn, $query_tbl_users_login);
if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["job"] ?></td>
            <td><?php echo $row["time_login"] ?></td>
            <td></td>

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
} else {
    echo 'لا توجد بيانات';
}

?>