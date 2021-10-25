<?php
if(isset($_POST["office_users_search"]))
{
    $office_users_search =  $_POST['office_users_search'];
    $conn_tg=mysqli_connect("localhost","root","12345678","tg");
    $query1 = "SELECT * FROM new_name WHERE money_code = '$office_users_search' or office_name = '$office_users_search'";
    $result1 = mysqli_query($conn_tg, $query1);
  
    while($row1 = mysqli_fetch_array($result1))
        {
            ?>
                <tr>
                    <td><?php echo $row1['office_name'] ;?></td>
                    <td><?php echo $row1['names'] ;?></td>
                    <td><?php echo $row1['id'] ;?></td>
                    <td><?php echo $row1['code'] ;?></td>
                    <td><?php echo $row1['auth'] ;?></td>
                    <td><?php echo $row1['tel'] ;?></td>
                </tr>

            <?php
        }

}
?>