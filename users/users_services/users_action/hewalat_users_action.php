<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';
    $query_bitel_users_action = "SELECT * FROM hewalat_users_action ORDER BY action";
    $bitel_user_action = mysqli_query($conn, $query_bitel_users_action);
    $query_bitel_users_action_row_count =mysqli_num_rows($bitel_user_action);
        while($bitel_user_action_row = mysqli_fetch_array($bitel_user_action))
        { ?>
                <tr>
                    
                    <td><?php echo $bitel_user_action_row['money_code']; ?></td>
                    <td><?php echo $bitel_user_action_row['names']; ?></td>
                    <td><?php echo $bitel_user_action_row['auth']; ?></td>
                    <td><?php echo $bitel_user_action_row['id']; ?></td>
                    <td><?php echo $bitel_user_action_row['code']; ?></td>
                    <td><?php echo $bitel_user_action_row['action']; ?></td>
                    <td><?php echo $bitel_user_action_row['office_name']; ?></td>
                    <td class="hide"><?php echo $bitel_user_action_row['num']; ?></>
                    <td class="hide td_btn">
                    <button onclick="hewalat_done();">تم التنفيذ</button>
                    <button onclick="hewalat_cancel();">الغاء التنفيذ</button>
                    </td>
                </tr>
    <?php
        }
?>
