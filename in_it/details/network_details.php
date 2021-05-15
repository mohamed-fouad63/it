<?php if ($network_in_it > 0 ){ ?>
<fieldset id="network_fieldset">
<legend><i class="fas fa-network-wired"></i><span class="count"><?php echo $network_in_it; ?></span></legend>
<table id="network_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>تاريخ الورود</th><th colspan="">عن طريق</th><th style="display:none">المستلم</th><th style="display:none">count in it</th><th style="display:none">num</th>
<th>
</th></tr></thead>
<tbody>
    <?php
while($row_network=mysqli_fetch_assoc($query_network_in_it)){?>
<tr>
<td><?php echo $row_network["office_name"] ?></td>
<td><?php echo $row_network["dvice_name"] ?></td>
<td><?php echo $row_network["sn"] ?></td>
<td><?php echo $row_network["damage"] ?></td>
<td><?php echo $row_network["in_it_note"] ?></td>
<td><?php echo $row_network["date_in_it"] ?></td>
<td><?php echo $row_network["parcel_in_it"]?> </td>
<td style="display:none"><?php echo $row_network["admin_in_it"]?> </td>   
<td style="display:none"><?php echo $row_network["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_network["num"] ?></td> 
<td>
<?php if ( $_SESSION['edit_in_it'] == 1 or $_SESSION['resent_in_it'] == 1 or $_SESSION['move_in_it'] == 1 or $_SESSION['to_tts'] == 1 or $_SESSION['delete_in_it'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#network_modal' onclick='edit_network()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['resent_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_network_to' onclick='export_network_in_it()'>
<i class='fas fa-reply'></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['to_tts'] == 1){ ?> 
<li><button type='button' class='btn-edit btn btn-warning' data-toggle='modal' data-target='#network_to_tts' onclick='network_to_tts()'>
<i class="fas fa-ambulance"></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['move_in_it'] == 1){ ?> 
<li><button type='button' class='btn-edit btn  btn-success' data-toggle='modal' data-target='#move_network_to' onclick='move_network()'>
<i class='fas fa-people-carry'></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['replace_sims_in_it'] == 1 and $row_network["dvice_type"] == 'روتر هوائى'){ ?>
<li><button type='button' class='btn-edit btn btn-danger' data-toggle='modal' data-target='#sim_replace' onclick='sim_replace()'>
<i class="fas fa-sim-card"></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['delete_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-danger' data-toggle='modal' data-target='#network_deleted' onclick='network_deleted()'>
<i class="fas fa-trash-alt"></i></button>
</li>
<?php } ?>
</ul>
</div>
<?php } ?>
</td>  
</tr>
<?php } ?> 
</tbody>
</table>
</fieldset>
<?php } ?>