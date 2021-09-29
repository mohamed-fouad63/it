<?php if ($rowcount3 > 0){ ?>
<fieldset>
    <legend><i class="fas fa-print"></i><span class="count"><?php echo $rowcount3; ?></span>طابعات ليزر
    </legend>
    <table id="printer_table" class="table">
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
$rowcount3=mysqli_num_rows($query3); 
if ($rowcount3 > 0 ){
while($row3=mysqli_fetch_assoc($query3)){ ?>
            <tr>
                <td><?php echo $row3["dvice_name"]?></td>
                <td><?php echo $row3["sn"] ?></td>
                <td><?php echo $row3["ip"] ?></td>
                <td><?php echo $row3["note"] ?></td>
                <td><?php echo $row3["note_move_to"] ?></td>
                <td style="display:none"><?php echo $row3["num"]?></td>
                <td>
                    <?php if ( $_SESSION['edit'] == 1 or $_SESSION['resent'] == 1 or $_SESSION['move'] == 1 or $_SESSION['to_it'] == 1 ){ ?>
                    <div class="btn-group dropup">
                        <button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class=""><i class="fas fa-bars"></i></span>
                        </button>
                        <ul class="dropdown-menu chosse">
                            <?php if ( $_SESSION['edit'] == 1){ ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-target='#printer_modal' onclick='edit_printer()'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </li>
                            <?php } ?>
                            <?php if ( $_SESSION['resent'] == 1){
if	($row3["note"] == '' ){
if (!empty($row3["note_move_to"])){
?>
                            <li>
                                <button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده الطابعه للمكتب الاصلى" data-target='#export_printer_to' onclick='resend_printer()'>
                                    <i class='fas fa-reply'></i>
                                </button>
                            </li> <?php }}} ?>
                            <?php if ( $_SESSION['move'] == 1){
                                if ( $row3["note"] == '')
                                {
?>
                            <li>
                                <button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_printer_to' onclick='move_printer()'>
                                    <i class='fas fa-people-carry'></i>
                                </button>
                            </li>
                            <?php } }?>
                            <?php if ( $_SESSION['to_it'] == 1){
if ( $row3["note"] == ''){
?>
                            <li>
                                <button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-target='#printer_in_it' onclick='printer_to_it()'>
                                    <i class='fas fa-toolbox'></i>
                                </button>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>
                    <?php } ?>
                </td>
            </tr>
            <?php }}?>
        </tbody>
    </table>
</fieldset>
<?php } ?>