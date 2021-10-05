<?php if ($rowcount8 > 0){ ?>
<fieldset>
<legend>
    <i class="fas fa-network-wired"></i>
    <span class="count"><?php echo $rowcount8; ?>
    </span>روترات 
</legend>
<table id="routers_table" class="table">
<thead>
<tr>
<th>اسم المكتب</th>
<th>نوعه</th>
<th>تصنيفه</th>
<th>سريال</th>
<th>IP</th>
<th>نوع الشبكه</th>
<th>التوصيل</th>
<th>موقفه</th>
<th>
</th>
</tr>
</thead>
<tbody>
<?php 
$rowcount8=mysqli_num_rows($query8);
if ($rowcount8 > 0 ){
while($row5=mysqli_fetch_assoc($query8)){ ?>
<tr>
<td><?php echo $row5["office_name"] ?></td>
<td><?php echo $row5["dvice_name"] ?></td>
<td><?php echo $row5["dvice_type"] ?></td>
<td><?php echo $row5["sn"] ?></td>
<td><?php echo $row5["ip"] ?></td>
<td><?php echo $row5["classification"] ?></td>
<td><?php echo $row5["connecting"] ?></td>
<td><?php echo $row5["note_move_to"];  echo $row5["note"]; ?></td>
<td style="display:none"><?php echo $row5["num"] ?></td>
<td>
<?php if ( $_SESSION['edit'] == 1 ){ ?>
<div class="dropup">
<button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu">

<?php if ( $_SESSION['move'] == 1){ 
    if ( $row5["note"] == '')
    {
?>
<li>
<button type='button' class='btn btn-edit btn-success' data-toggle='modal' data-target='#move_network_to' onclick='edit_routers()'>
<i class="fas fa-edit"></i>
</button>
</li> <?php } } ?>

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