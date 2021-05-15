<?php if ($rowcount_query_orange > 0){ ?>
<fieldset>
<legend><i class="fas fa-sim-card orange"></i><span class="count"><?php echo $rowcount_query_orange; ?></span>
</legend>
<table id="printer_table" class="table">
<thead>
<tr>
<th>نوع الشريحه	</th>
<th>سريال الشريحه</th>
<th>IP الشريحه</th>
<th>موقفه</th>
</tr>
</thead>
<tbody>
<?php 

if ($rowcount_query_orange > 0 ){
while($row3=mysqli_fetch_assoc($query_orange)){ ?>
<tr>
<td><?php echo $row3["sim_type"]?></td>
<td><?php echo $row3["sim_num"] ?></td>
<td><?php echo $row3["sim_ip"] ?></td>
<td><?php echo $row3["status"] ?></td>
<td style="display:none"><?php echo $row3["id"]?></td>
<!-- <td>
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
</td> -->
</tr>
<?php }}?>
</tbody>
</table>
</fieldset>
<?php } ?>