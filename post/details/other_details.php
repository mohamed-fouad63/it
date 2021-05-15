<?php if ($rowcount7 > 0){ ?>
<fieldset>
    <legend><i class="fas fa-question-circle"></i><span class="count"><?php echo $rowcount7; ?></span>
    </legend>
    <table id="other_table" class="table">
        <thead>
            <tr>
                <th> نوعه</th>
                <th>سريال</th>
                <th colspan="2">موقفه</th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php 
$rowcount7 = mysqli_num_rows($query7);
if ($rowcount7 > 0 ){
while($row7=mysqli_fetch_assoc($query7)){ ?>
            <tr>
                <td><?php echo $row7["dvice_name"] ?></td>
                <td><?php echo $row7["sn"]?></td>
                <td><?php echo $row7["note"]?></td>
                <td><?php echo $row7["note_move_to"]?></td>
                <td style="display:none"><?php echo $row7["num"] ?></td>
                <td>
                    <?php if ( $_SESSION['edit'] == 1 or $_SESSION['resent'] == 1 or $_SESSION['move'] == 1 or $_SESSION['to_it'] == 1 ){ ?>
                    <div class="btn-group dropup">
                        <button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class=""><i class="fas fa-bars"></i></span>
                        </button>
                        <ul class="dropdown-menu chosse">
                            <?php if ( $_SESSION['edit'] == 1){ ?>
                            <li>
                                <button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-target='#other_modal' onclick='edit_other()'>
                                    <i class='fas fa-edit'></i>
                                </button>
                            </li>
                            <?php } ?>
                            <?php if ( $_SESSION['resent'] == 1){
if ($row7["note"] == '' ){ 
if (!empty($row7["note_move_to"])){
?>
                            <li>
                                <button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده جهاز بوستال للمكتب الاصلى" data-target='#export_other_to' onclick='resend_other()'>
                                    <i class='fas fa-reply'></i>
                                </button>
                            </li> <?php }}} ?>
                            <?php if ( $_SESSION['move'] == 1){
                                if ( $row7["note"] == '')
                                {
?>
                            <li>
                                <button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_other_to' onclick='move_other()'>
                                    <i class='fas fa-people-carry'></i>
                                </button>
                            </li>
                            <?php } } ?>
                            <?php if ( $_SESSION['to_it'] == 1){
if ( $row7["note"] == ''){
?>
                            <li>
                                <button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-target='#other_to_it' onclick='other_to_it()'>
                                    <i class='fas fa-toolbox'></i>
                                </button>
                            </li>
                            <?php }} ?>
                        </ul>
                    </div>
                    <?php } ?>
                </td>
            </tr>
            <?php }};?>
        </tbody>
    </table>
</fieldset>
<?php } ?>