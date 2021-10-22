<?php
session_start();
include '../../../setup/session/no_session.php';
include '../../../connection.php';

    $query_v200t_users_action = "SELECT * FROM v200t_users_action ORDER BY pos_terminal ASC ";
    $v200t_user_action = mysqli_query($conn, $query_v200t_users_action);
        while($v200t_user_action_row = mysqli_fetch_array($v200t_user_action))
        { ?>
                <tr>
                    <td><?php echo $v200t_user_action_row['office_name']; ?></td>
                    <td><?php echo $v200t_user_action_row['money_code']; ?></td>
                    <td><?php echo $v200t_user_action_row['pos_terminal']; ?></td>
                    <td><?php echo $v200t_user_action_row['sn']; ?></td>
                    <td><?php echo $v200t_user_action_row['auth']; ?></td>
                    <td><?php echo $v200t_user_action_row['names']; ?></td>
                    <td><?php echo $v200t_user_action_row['id']; ?></td>
                    <td><?php echo $v200t_user_action_row['action']; ?></td>
                    <td class="hide"><?php echo $v200t_user_action_row['num']; ?></td>
                    <td class="hide td_btn">
                    <button onclick="v200t_done();">تم التنفيذ</button>
                    <button onclick="v200t_cancel();">الغاء التنفيذ</button>
                    </td>
                </tr>
    <?php
        }
?>
