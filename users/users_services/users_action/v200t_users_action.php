<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';

    $query_bitel_users_action = "SELECT * FROM v200t_users_action";
    $bitel_user_action = mysqli_query($conn, $query_bitel_users_action);
        while($bitel_user_action_row = mysqli_fetch_array($bitel_user_action))
        { ?>
                <tr>
                    <td><?php echo $bitel_user_action_row['office_name']; ?></td>
                    <td><?php echo $bitel_user_action_row['money_code']; ?></td>
                    <td><?php echo $bitel_user_action_row['pos_terminal']; ?></td>
                    <td><?php echo $bitel_user_action_row['sn']; ?></td>
                    <td><?php echo $bitel_user_action_row['auth']; ?></td>
                    <td><?php echo $bitel_user_action_row['names']; ?></td>
                    <td><?php echo $bitel_user_action_row['id']; ?></td>
                    <td><?php echo $bitel_user_action_row['action']; ?></td>
                    <td>
                    <button onclick="v200t_done();">تم التنفيذ</button>
                    <button>الغاء التنفيذ</button>
                    </td>
                </tr>
    <?php
        }
?>
