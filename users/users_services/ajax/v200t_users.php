<?php
if(isset($_POST["office_users_search"]))
{
    $n = 0;
    $office_users_search =  $_POST['office_users_search'];
    $conn=mysqli_connect("localhost","root","12345678","post");
        $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
    $all_office = mysqli_query($conn, $query_all_office);
    $query_v200t_user = "
    SELECT v200t_users.* , dvice.stuff_pos
    FROM v200t_users
    INNER JOIN dvice
    ON ( v200t_users.pos_terminal = dvice.pos_terminal)
    WHERE v200t_users.money_code = '$office_users_search' OR v200t_users.office_name = '$office_users_search'
    ORDER BY v200t_users.pos_terminal ASC,v200t_users.auth ASC
    ";
    $v200t_user = mysqli_query($conn, $query_v200t_user);



  

    while($v200t_user_row = mysqli_fetch_array($v200t_user))
        { ?>
            <tr>
                <td><?php echo $v200t_user_row['office_name'] ;?></td>
                <td><?php echo $v200t_user_row['money_code'] ;?></td>
                <td><?php echo $v200t_user_row['pos_terminal'];?>
                    <span class="select_none"><?php echo '/'. $v200t_user_row['stuff_pos'] ?></span>
                </td>
                <td><?php echo $v200t_user_row['sn'] ;?></td>
                <td><?php echo $v200t_user_row['names'] ;?></td>
                <td><?php echo $v200t_user_row['auth'] ;?></td>
                <td><?php echo $v200t_user_row['id'] ;?></td>
            </tr>
        <?php
        }
    
    
        
    }

?>