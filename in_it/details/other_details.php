<?php if ($other_in_it > 0 ){ ?>
<fieldset id="other_fieldset">
<legend><i class="fas fa-question-circle"></i><span class="count"><?php echo $other_in_it; ?></span></legend>
<table id="other_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>تاريخ الورود</th><th colspan="">عن طريق</th><th style="display:none">المستلم</th><th style="display:none">count_in_it</th><th style="display:none">num</th>
<th>
</th></tr></thead>
<tbody>
    <?php
while($row_other=mysqli_fetch_assoc($query_other_in_it)){?>
<tr>
<td><?php echo $row_other["office_name"] ?></td>
<td ><?php echo $row_other["dvice_name"] ?></td>
<td><?php echo $row_other["sn"] ?></td>
<td><?php echo $row_other["damage"] ?></td>
<td><?php echo $row_other["in_it_note"] ?></td>
<td><?php echo $row_other["date_in_it"] ?></td>
<td><?php echo $row_other["parcel_in_it"]?> </td>
<td style="display:none"><?php echo $row_other["admin_in_it"]?> </td>   
<td style="display:none"><?php echo $row_other["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_other["num"] ?></td>
<td>
<?php if ( $_SESSION['edit_in_it'] == 1 or $_SESSION['resent_in_it'] == 1 or $_SESSION['move_in_it'] == 1 or $_SESSION['to_tts'] == 1 or $_SESSION['delete_in_it'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn  btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#other_modal' onclick='edit_other()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['resent_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_other_to' onclick='export_other_in_it()'>
<i class='fas fa-reply'></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['to_tts'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-warning' data-toggle='modal' data-target='#other_to_tts' onclick='other_to_tts()'>
<i class="fas fa-ambulance"></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['move_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn  btn-success' data-toggle='modal' data-target='#move_other_to' onclick='move_other()'>
<i class='fas fa-people-carry'></i></button>
</li>
<?php } ?>
<?php if ($_SESSION['delete_in_it'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-danger' data-toggle='modal' data-target='#other_deleted' onclick='other_deleted()'>
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