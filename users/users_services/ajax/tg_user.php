<?php
if(isset($_POST["id"]))
{
    $id =  $_POST['id'];
    $conn_tg=mysqli_connect("localhost","root","12345678","tg");
    $query = "SELECT * FROM new_name WHERE id = '$id'";
    $result = mysqli_query($conn_tg, $query);
    if(mysqli_num_rows($result) == 1 )
    {
    while($row = mysqli_fetch_array($result))
        {
            ?>
                <tr>
                    <td><?php echo $row['office_name'] ;?></td>
                    <td><?php echo $row['money_code'] ;?></td>
                    <td><?php echo $row['names'] ;?></td>
                    <td><?php echo $row['id'] ;?></td>
                    <td><?php echo $row['code'] ;?></td>
                    <td><?php echo $row['auth'] ;?></td>
                    <td><?php echo $row['tel'] ;?></td>
                </tr>

            <?php
        }
    }
    else
    {
        echo "لا توجد بيانات";
    }
}
?>