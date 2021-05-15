<?php if ($rowcount2 > 0)
{
    ?>
<fieldset>
    <legend>
        <i class="fas fa-desktop"></i>
        <span class="count"><?php echo $rowcount2; ?>
        </span>
    </legend>
    <table id="monitor_table" class="table">
        <thead>
            <tr>
                <th>نوعه</th>
                <th>سريال</th>
                <th colspan="2">موقفه</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $rowcount2=mysqli_num_rows($query2);
            while($row2=mysqli_fetch_assoc($query2))
            {
            ?>
            <tr>
                <td><?php echo $row2["dvice_name"] ?></td>
                <td><?php echo $row2["sn"] ?></td>
                <td><?php echo $row2["note"]?> </td>
                <td><?php echo $row2["note_move_to"] ?></td>
                <td style="display:none"><?php echo $row2["num"] ?></td>
                <td>
                    <?php 
                    if ( $_SESSION['edit'] == 1 or $_SESSION['resent'] == 1 or $_SESSION['move'] == 1 or $_SESSION['to_it'] == 1 )
                    {
                        ?>
                    <div class="btn-group dropup">
                        <button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="">
                                <i class="fas fa-bars"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu chosse">
                            <?php if ( $_SESSION['edit'] == 1)
                            {
                            ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-target='#monitor_modal' onclick='edit_monitor()'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </li>
                            <?php
                            }
                            ?>
                            <?php if ( $_SESSION['resent'] == 1)
                            {
                            ?>
                                <?php
                                if ($row2["note"] == '' )
                                {
                                    if (!empty($row2["note_move_to"]) )
                                    {
                                ?>
                                <li>
                                    <button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده الشاشه للمكتب الاصلى" data-target='#export_monitor_to' onclick='resend_monitor()'>
                                        <i class='fas fa-reply'></i>
                                    </button>
                                </li>
                                <?php
                                    }
                                }
                            }
                            ?>
                            <?php
                            if ( $_SESSION['move'] == 1)
                            {
                                if ( $row2["note"] == '')
                                    {
                            ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_monitor_to' onclick='move_monitor()'>
                                    <i class='fas fa-people-carry'></i>
                                </button>
                            </li>
                            <?php
                                    }
                            }
                            ?>
                            <?php if ( $_SESSION['to_it'] == 1)
                            {
                                if ( $row2["note"] == '')
                                {
                            ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-target='#monitor_in_it' onclick='monitor_to_it()'>
                                    <i class='fas fa-toolbox'></i>
                                </button>
                            </li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php
                    }
            }
        ?>
        </tbody>
    </table>
</fieldset>
<?php
}
?>
