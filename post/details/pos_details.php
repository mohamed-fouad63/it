<?php if ($rowcount4 > 0){ ?>
<fieldset>
    <legend><i class="fas fa-money-bill-alt"></i><span class="count"><?php echo $rowcount4; ?></span>نقاط بيع
    </legend>
    <table id="pos_table" class="table">
        <thead>
            <tr>
                <th> نوعه</th>
                <th>سريال</th>
                <th>IP</th>
                <th colspan="2">موقفه</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
$rowcount4=mysqli_num_rows($query4);
if ($rowcount4 > 0 ){
while($row4=mysqli_fetch_assoc($query4)){ ?>
            <tr>
                <td><?php echo $row4["dvice_name"]?></td>
                <td><?php echo $row4["sn"]?></td>
                <td><?php echo $row4["ip"]?></td>
                <td><?php echo $row4["note"]?></td>
                <td><?php echo $row4["note_move_to"]?></td>
                <td style="display:none"><?php echo $row4["num"]?></td>
                <td>
                    <?php if ( $_SESSION['edit'] == 1 or $_SESSION['resent'] == 1 or $_SESSION['move'] == 1 or $_SESSION['to_it'] == 1 ){ ?>
                    <div class="btn-group dropup">
                        <button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class=""><i class="fas fa-bars"></i></span>
                        </button>
                        <ul class="dropdown-menu chosse">
                            <?php if ( $_SESSION['edit'] == 1){ ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-target='#pos_modal' onclick='edit_pos()'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </li>
                            <?php } ?>
                            <?php if ( $_SESSION['resent'] == 1){
if ($row4["note"] == '' ){
if (!empty($row4["note_move_to"])){
?>
                            <li>
                                <button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده pos للمكتب الاصلى" data-target='#export_pos_to' onclick='resend_pos()'>
                                    <i class='fas fa-reply'></i>
                                </button>
                            </li> <?php }}} ?>
                            <?php if ( $_SESSION['move'] == 1){ 
                                if ( $row4["note"] == '')
                                {
                                ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_pos_to' onclick='move_pos()'>
                                    <i class='fas fa-people-carry'></i>
                                </button>
                            </li>
                            <?php  } } ?>
                            <?php if ( $_SESSION['to_it'] == 1){
if ( $row4["note"] == ''){ ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-target='#pos_to_it' onclick='pos_to_it()'>
                                    <i class='fas fa-toolbox'></i>
                                </button>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php }} ?>
                </td>
            </tr>
            <?php }}?>
        </tbody>
    </table>
</fieldset>
<?php } ?>