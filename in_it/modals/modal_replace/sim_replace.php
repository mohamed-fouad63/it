<div class="modal fade" id="sim_replace" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal replace_sim_form">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">استبدال شريحه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-3">
<input type="text"  class="form-control" name="router_sn" id="router_sn" placeholder="router_sn" readonly required>
</div>
<label class="control-label col-sm-1" >السريال</label>
<div class="col-sm-3">
<input type="text" class="form-control"   id="router_name"  name="router_name" placeholder="router_name" required readonly >
</div>
<label class="control-label col-sm-1" > الروتر</label>
<div class="col-sm-3">
<input type="text" class="form-control"   id="office_name"  name="office_name" placeholder="office_name" required readonly >
</div>
<label class="control-label col-sm-1" > المكتب</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date"  class="form-control" name="replace_date" id="replace_date" value="<?php echo date('Y-m-d'); ?>" required>
</div>
<label class="control-label col-sm-2" >التاريخ</label>
</div>
<hr>
<h6>من</h6>
<div class="input-group">

<div class="col-sm-3">
<input type="text"  class="form-control" name = "from_ip" placeholder = 'الشريحه IP  ادخل'>
</div>
<label class="control-label" ></label>

<div class="col-sm-4">
<input type="number" class="form-control" name = "from_sim_num">
</div>
<label class="control-label col-sm-1" >رقم الشريحه</label>

<div class="col-sm-3">
<select class="form-control" name="from_sim_type" id="change_sim_type_from" required>
<option></option>
<?php
$query_dvice_id = mysqli_query($conn, "SELECT sim_type FROM sims_type");
while($row_query_dvice_id=mysqli_fetch_assoc($query_dvice_id)){
$dvice_id = $row_query_dvice_id["sim_type"];
?>
<option  value="<?php echo $dvice_id;?>">
<?php echo $dvice_id; ?>
</option>

<?php } ?>
</select>
</div>
<label class="control-label col-sm-1" >نوع الشريحه</label>

</div>


<hr>
<h6>الى</h6>
<div class="input-group">

<div class="col-sm-3" id = "sim_replace_ip">
</div>
<label class="control-label" ></label>

<div class="col-sm-4">
<select class="form-control change_sim_num" name="to_sim_num" id="change_sim_num" required>
<option value = "none_sim_num"></option>
</select>
</div>
<label class="control-label col-sm-1" >رقم الشريحه</label>

<div class="col-sm-3">
<select class="form-control change_sim_type" name="to_sim_type" id="change_sim_type" required>
<option value = "none_sim_type"></option>
<?php
$query_dvice_id1 = mysqli_query($conn, "SELECT sim_type FROM sims_type");
while($row_query_dvice_id1=mysqli_fetch_assoc($query_dvice_id1)){
$dvice_id1 = $row_query_dvice_id1["sim_type"];
?>
<option  value="<?php echo $dvice_id1;?>">
<?php echo $dvice_id1; ?>
</option>

<?php } ?>
</select>

</div>
<label class="control-label col-sm-1" >نوع الشريحه</label>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="replace_sim" onclick="get_replace_sim_id(this)"><i class="fas fa-check"></i>استبدال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>