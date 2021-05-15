<?php
session_start();
if(!$_SESSION['user_name']){header('location: login.php');}
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
$key=$_POST['key'];
include '../connection.php';
$query_pc_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'pc'");
$query_monitor_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'MONITOR'");
$query_printer_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'PRINTER'");
$query_pos_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'pos'");
$query_network_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'NETWORK'");
$query_postal_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'postal'");
$query_other_in_tts=mysqli_query($conn, "select count_in_it,num,office_name,dvice_name,sn,damage,in_it_note,date_auth_repair,auth_repair from in_it where status like '{$key}' && id like 'other'");
$pc_in_tts=mysqli_num_rows($query_pc_in_tts);
 $monitor_in_tts=mysqli_num_rows($query_monitor_in_tts);
 $printer_in_tts=mysqli_num_rows($query_printer_in_tts);
 $pos_in_tts=mysqli_num_rows($query_pos_in_tts);
 $network_in_tts=mysqli_num_rows($query_network_in_tts);
 $postal_in_tts=mysqli_num_rows($query_postal_in_tts);
 $other_in_tts=mysqli_num_rows($query_other_in_tts);
 
?>
<?php if ($pc_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-mobile-alt"></i><span class="count"><?php echo $pc_in_tts; ?></span></legend>
<table id="pc_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count_in_it</th><th style="display:none">num</th>
<th>

</th></tr></thead>
<tbody>
    <?php
while($row_pc=mysqli_fetch_assoc($query_pc_in_tts)){ ?>

<tr>
<td><?php echo $row_pc["office_name"] ?></td>
<td ><?php echo $row_pc["dvice_name"] ?></td>
<td><?php echo $row_pc["sn"] ?></td>
<td><?php echo $row_pc["damage"] ?></td>
<td><?php echo $row_pc["in_it_note"] ?></td>
<td><?php echo $row_pc["date_auth_repair"] ?></td>
<td><?php echo $row_pc["auth_repair"]?> </td>
  
<td style="display:none"><?php echo $row_pc["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_pc["num"] ?></td>
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ( $_SESSION['edit_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#pc_modal' onclick='edit_pc_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_pc_to' onclick='export_pc_in_tts()'>
<i class='fas fa-reply'></i></button>
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
<!-- end pc -->

<!-- start monitor -->
<?php if ($monitor_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-desktop"></i><span class="count"><?php echo $monitor_in_tts; ?></span></legend>
<table id="monitor_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count_in_it</th><th style="display:none">num</th>
<th>
<?php  ?>
</th></tr></thead>
<tbody>
    <?php
while($row_monitor=mysqli_fetch_assoc($query_monitor_in_tts)){?>
<tr>
<td><?php echo $row_monitor["office_name"] ?></td>
<td ><?php echo $row_monitor["dvice_name"] ?></td>
<td><?php echo $row_monitor["sn"] ?></td>
<td><?php echo $row_monitor["damage"] ?></td>
<td><?php echo $row_monitor["in_it_note"] ?></td>
<td><?php echo $row_monitor["date_auth_repair"] ?></td>
<td><?php echo $row_monitor["auth_repair"]?> </td>
  
<td style="display:none"><?php echo $row_monitor["count_in_it"] ?></td>
    <td style="display:none"><?php echo $row_monitor["num"] ?></td> 
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ( $_SESSION['edit_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#monitor_modal' onclick='edit_monitor_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_monitor_to' onclick='export_monitor_in_tts()'>
<i class="fas fa-reply"></i></button>
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
<!-- end monitor -->
<!-- start printer -->
<?php if ($printer_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-print"></i><span class="count"><?php echo $printer_in_tts; ?></span></legend>
<table id="printer_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count in it</th><th style="display:none">num</th>
<th>
<?php if ($session_role == "admin"){ echo "";} ?>
</th></tr></thead>
<tbody>
    <?php
while($row_printer=mysqli_fetch_assoc($query_printer_in_tts)){?>
<tr>
<td><?php echo $row_printer["office_name"] ?></td>
<td ><?php echo $row_printer["dvice_name"] ?></td>
<td><?php echo $row_printer["sn"] ?></td>
<td><?php echo $row_printer["damage"] ?></td>
<td><?php echo $row_printer["in_it_note"] ?></td>
<td><?php echo $row_printer["date_auth_repair"] ?></td>
<td><?php echo $row_printer["auth_repair"]?> </td>
   
<td style="display:none"><?php echo $row_printer["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_printer["num"] ?></td> 
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_tts'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#printer_modal' onclick='edit_printer_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_printer_to' onclick='export_printer_in_tts()'>
<i class='fas fa-reply'></i></button>
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
<!-- end printer -->
<!-- start pos -->
<?php if ($pos_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-money-bill-alt"></i><span class="count"><?php echo $pos_in_tts; ?></span></legend>
<table id="pos_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count in t</th><th style="display:none">num</th>
<th>
<?php if ($session_role == "admin"){ echo "";} ?>
</th></tr></thead>
<tbody>
    <?php
while($row_pos=mysqli_fetch_assoc($query_pos_in_tts)){?>
<tr>
<td><?php echo $row_pos["office_name"] ?></td>
<td ><?php echo $row_pos["dvice_name"] ?></td>
<td><?php echo $row_pos["sn"] ?></td>
<td><?php echo $row_pos["damage"] ?></td>
<td><?php echo $row_pos["in_it_note"] ?></td>
<td><?php echo $row_pos["date_auth_repair"] ?></td>
<td><?php echo $row_pos["auth_repair"]?> </td>
  
<td style="display:none"><?php echo $row_pos["count_in_it"] ?></td>
    <td style="display:none"><?php echo $row_pos["num"] ?></td> 
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_tts'] == 1){ ?>
<li><button type='button' class='btn-edit  btn btn-primary' data-toggle='modal' data-target='#pos_modal' onclick='edit_pos_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_pos_to' onclick='export_pos_in_tts()'>
<i class='fas fa-reply'></i></button>
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
<!-- end pos -->
<!-- start network -->
<?php if ($network_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-network-wired"></i><span class="count"><?php echo $network_in_tts; ?></span></legend>
<table id="network_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count in it</th><th style="display:none">num</th>
<th>
<?php if ($session_role == "admin"){ echo "";} ?>
</th></tr></thead>
<tbody>
    <?php
while($row_network=mysqli_fetch_assoc($query_network_in_tts)){?>
<tr>
<td><?php echo $row_network["office_name"] ?></td>
<td ><?php echo $row_network["dvice_name"] ?></td>
<td><?php echo $row_network["sn"] ?></td>
<td><?php echo $row_network["damage"] ?></td>
<td><?php echo $row_network["in_it_note"] ?></td>
<td><?php echo $row_network["date_auth_repair"] ?></td>
<td><?php echo $row_network["auth_repair"]?> </td>
   
<td style="display:none"><?php echo $row_network["count_in_it"] ?></td>
    <td style="display:none"><?php echo $row_network["num"] ?></td> 
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_tts'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#network_modal' onclick='edit_network_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_network_to' onclick='export_network_in_tts()'>
<i class='fas fa-reply'></i></button>
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
<!-- end network -->
<!-- start postal -->
<?php if ($postal_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-envelope-open-text"></i><span class="count"><?php echo $postal_in_tts; ?></span></legend>
<table id="postal_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count in it</th><th style="display:none">num</th>
<th>
<?php if ($session_role == "admin"){ echo "";} ?>
</th></tr></thead>
<tbody>
    <?php
while($row_postal=mysqli_fetch_assoc($query_postal_in_tts)){?>
<tr>
<td><?php echo $row_postal["office_name"] ?></td>
<td ><?php echo $row_postal["dvice_name"] ?></td>
<td><?php echo $row_postal["sn"] ?></td>
<td><?php echo $row_postal["damage"] ?></td>
<td><?php echo $row_postal["in_it_note"] ?></td>
<td><?php echo $row_postal["date_auth_repair"] ?></td>
<td><?php echo $row_postal["auth_repair"]?> </td>
  
<td style="display:none"><?php echo $row_postal["count_in_it"] ?></td>
    <td style="display:none"><?php echo $row_postal["num"] ?></td>
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_tts'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#postal_modal' onclick='edit_postal_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-reply btn btn-info' data-toggle='modal' data-target='#export_postal_to' onclick='export_postal_in_tts()'>
<i class='fas fa-reply'></i></button>
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
</fieldset><?php } ?>
<!-- end postal -->
<!-- start other -->
<?php if ($other_in_tts > 0 ){ ?>
<fieldset>
<legend><i class="fas fa-question-circle"></i><span class="count"><?php echo $other_in_tts; ?></span></legend>
<table id="other_table" class="table">
<thead>
<tr><th>اسم المكتب</th><th>نوع الجهاز</th><th>السريال</th><th>العطل</th><th>ملاحظات</th><th>التاريخ</th><th colspan="">رقم الاذن</th><th style="display:none">count_in_it</th><th style="display:none">num</th>
<th>
<?php if ($session_role == "admin"){ echo "";} ?>
</th></tr></thead>
<tbody>
    <?php
while($row_other=mysqli_fetch_assoc($query_other_in_tts)){?>
<tr>
<td><?php echo $row_other["office_name"] ?></td>
<td ><?php echo $row_other["dvice_name"] ?></td>
<td><?php echo $row_other["sn"] ?></td>
<td><?php echo $row_other["damage"] ?></td>
<td><?php echo $row_other["in_it_note"] ?></td>
<td><?php echo $row_other["date_auth_repair"] ?></td>
<td><?php echo $row_other["auth_repair"]?> </td>
  
<td style="display:none"><?php echo $row_other["count_in_it"] ?></td>
<td style="display:none"><?php echo $row_other["num"] ?></td>
<td>
<?php if ( $_SESSION['edit_in_tts'] == 1 or $_SESSION['resent_in_tts'] == 1 ){ ?>
<div class="btn-group dropup">
<button type="button" class="dropdown-toggle btn btn-outline-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class=""><i class="fas fa-bars"></i></span>
</button>
<ul class="dropdown-menu chosse">
<?php if ($_SESSION['edit_in_tts'] == 1){ ?>
<li><button type='button' class='btn-edit btn btn-primary' data-toggle='modal' data-target='#other_modal' onclick='edit_other_in_tts()'>
<i class='fas fa-edit'></i></button>
</li>
<?php } ?>
<?php if ( $_SESSION['resent_in_tts'] == 1 ){ ?>
<li><button type='button' class='btn-edit btn btn-info' data-toggle='modal' data-target='#export_other_to' onclick='export_other_in_tts()'>
<i class='fas fa-reply'></i></button>
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
<!-- end other -->