<?php if ($rowcount5 > 0){ ?>
<fieldset>
<legend><i class="fas fa-network-wired"></i><span class="count"><?php echo $rowcount5; ?></span>اجهزه شبكه
</legend>
<table id="network_table" class="table">
<thead>
<tr>
<th>نوعه</th>
<th>سريال</th>
<th>IP</th>
<th colspan="2">موقفه</th>
<th>
</th>
</tr>
</thead>
<tbody>
<?php 
$rowcount5=mysqli_num_rows($query5);
if ($rowcount5 > 0 ){
while($row5=mysqli_fetch_assoc($query5)){ ?>
<tr>
<td><?php echo $row5["dvice_name"] ?></td>
<td><?php echo $row5["sn"] ?></td>
<td><?php echo $row5["ip"] ?></td>
<td><?php echo $row5["note"] ?></td>
<td><?php echo $row5["note_move_to"] ?></td>
<td style="display:none"><?php echo $row5["num"] ?></td>
<td>
<?php if ( $_SESSION['edit'] == 1 or $_SESSION['resent'] == 1 or $_SESSION['move'] == 1 or $_SESSION['to_it'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ( $_SESSION['edit'] == 1){ ?>
<li>
<button type='button' class='btn btn-edit btn-primary' data-toggle='modal' data-target='#network_modal' onclick='edit_network()'>
<i class='fas fa-edit'></i>
</button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent'] == 1){
if ($row5["note"] == '' ){ 
if (!empty($row5["note_move_to"])){
?>
<li>
<button type='button' class='btn btn-info btn-edit' data-toggle='modal' data-toggle='tooltip' data-placement="right" title="اعاده جهاز شبكه للمكتب الاصلى" data-target='#export_network_to' onclick='resend_network()'>
<i class='fas fa-reply'></i>
</button>
</li> <?php }}} ?>
<?php if ( $_SESSION['move'] == 1){ 
    if ( $row5["note"] == '')
    {
?>
<li>
<button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_network_to' onclick='move_network()'>
<i class='fas fa-people-carry'></i>
</button>
</li> <?php } } ?>
<?php if ( $_SESSION['to_it'] == 1){
if ( $row5["note"] == ''){ 
?>
<li>
<button type='button' class='btn btn-edit btn-warning' data-toggle='modal' data-target='#network_to_it' onclick='network_to_it()'>
<i class='fas fa-toolbox'></i>
</button>
</li>
<?php } } ?>
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