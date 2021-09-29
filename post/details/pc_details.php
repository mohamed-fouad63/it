<?php if ($rowcount1 > 0){ ?>
<fieldset>
    <legend>
        <i class="fas fa-mobile-alt"></i>
        <span class="count"><?php echo $rowcount1; ?>
        </span>اجهزه
    </legend>
    <table id="pc_table" class="table">
        <thead>
            <tr>
                <th>نوعه</th>
                <th>سريال</th>
                <th>IP</th>
                <th>Domain Name</th>
                <th colspan="2">موقفه</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row1=mysqli_fetch_assoc($query1))
            {
            ?>
            <tr>
                <td><?php echo $row1["dvice_name"] ?></td>
                <td><?php echo $row1["sn"] ?></td>
                <td><?php echo $row1["ip"] ?></td>
                <td><?php echo $row1["pc_doman_name"] ?></td>
                <td><?php echo $row1["note"]?> </td>
                <td><?php echo $row1["note_move_to"] ?></td>
                <td style="display:none"><?php echo $row1["num"] ?></td>
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
                            <?php
                            if ( $_SESSION['edit'] == 1)
                            {
                            ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="تعديل بيانات الجهاز" data-target='#pc_model' onclick='edit_pc()'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </li>
                            <?php
                            }
                            ?>
                            <?php
                            if ( $_SESSION['resent'] == 1)
                            {
                                if ($row1["note"] == '' )
                                {
                                    if (!empty($row1["note_move_to"]))
                                    {
                                    ?>
                                    <li>
                                        <button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده الجهاز للمكتب الاصلى" data-target='#export_pc_to' onclick='resend_pc()'>
                                            <i class='fas fa-reply'></i>
                                        </button>
                                    </li>
                                    <?php
                                    }
                                }
                            }
                            ?>
                            <?php if ( $_SESSION['move'] == 1)
                            {
                                if ( $row1["note"] == '')
                                    {
                            ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="نقل الجهاز" data-target='#move_pc_to' onclick='move_pc()'>
                                    <i class='fas fa-people-carry'></i>
                                </button>
                            </li>
                            <?php
                                     }
                            }   
                                if ( $_SESSION['to_it'] == 1)
                                {
                                    if ( $row1["note"] == '')
                                    {
                                    ?>
                                    <li>
                                        <button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="وارد للدعم الفنى" data-target='#pc_to_it' onclick='pc_to_it()'>
                                            <i class='fas fa-toolbox'></i>
                                        </button>
                                    </li>
                                    <?php
                                    }
                                }
                            ?>
                        </ul>
                    </div>
                    <?php
                    }
                    ?>
                </td>
                <td style="display:none"><?php echo $row1["id"] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</fieldset>
<?php
}
?>
