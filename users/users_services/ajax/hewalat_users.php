<?php
if(isset($_POST["office_users_search"]))
{
    $office_users_search =  $_POST['office_users_search'];
    $conn=mysqli_connect("localhost","root","12345678","post");

    $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد'";
    $all_office = mysqli_query($conn, $query_all_office);


    $query_hewalat_user = "SELECT * FROM hewalat WHERE money_code = '$office_users_search' or office_name = '$office_users_search'";
    $hewalat_user = mysqli_query($conn, $query_hewalat_user);


    if(mysqli_num_rows($hewalat_user) >= 1 )
    {
    while($hewalat_user_row = mysqli_fetch_array($hewalat_user))
        { ?>
                <tr>
                    <td><?php echo $hewalat_user_row['office_name'] ;?></td>
                    <td><?php echo $hewalat_user_row['money_code'] ;?></td>
                    <td><?php echo $hewalat_user_row['names'] ;?></td>
                    <td><?php echo $hewalat_user_row['auth'] ;?></td>
                    <td><?php echo $hewalat_user_row['id'] ;?></td>
                    <td><?php echo $hewalat_user_row['code'] ;?></td>
                </tr>

       <?php }
    }
}
?>