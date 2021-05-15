<?php if ($rowcount_query_etisalat > 0){ ?>
<fieldset>
<legend><i class="fas fa-sim-card etisalat"></i><span class="count"><?php echo $rowcount_query_etisalat; ?></span>
</legend>
<table id="postal_table" class="table">
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
if ($rowcount_query_etisalat > 0 ){
while($row6=mysqli_fetch_assoc($query_etisalat)){ ?>
<tr>
<td><?php echo $row6["sim_type"]?></td>
<td><?php echo $row6["sim_num"]?></td>
<td><?php echo $row6["sim_ip"] ?></td>
<td><?php echo $row6["status"] ?></td>
<td style="display:none"><?php echo $row6["id"] ?></td>
<!-- <td>
<?php if ( $_SESSION['edit'] == 1 or $_SESSION['resent'] == 1 or $_SESSION['move'] == 1 or $_SESSION['to_it'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ( $_SESSION['edit'] == 1){ ?>
<li>
<button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-target='#postal_modal' onclick='edit_postal()'>
<i class='fas fa-edit'></i>
</button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent'] == 1){
if ($row6["note"] == '' ){ 
if (!empty($row6["note_move_to"])){
?>
<li>
<button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده جهاز بوستال للمكتب الاصلى" data-target='#export_postal_to' onclick='resend_postal()'>
<i class='fas fa-reply'></i>
</button>
</li> <?php }}} ?>
<?php if ( $_SESSION['move'] == 1){
if ( $row6["note"] == '')
{
?>
<li>
<button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_postal_to' onclick='move_postal()'>
<i class='fas fa-people-carry'></i>
</button>
</li>
<?php } } ?>
<?php if ( $_SESSION['to_it'] == 1){ 
if ( $row6["note"] == ''){
?>
<li>
<button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-target='#postal_to_it' onclick='postal_to_it()'>
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