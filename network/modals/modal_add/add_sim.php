<div class="modal fade" id="add_sim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal add_form" id="add_form" role="form">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"> اضافه شريحه </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body"> 
<div class="input-group">
<div class="col-sm-4" >
<input style="text-align:center;" class="form-control"  name="sim_num" id="office_name_dvice" placeholder="office_name_dvice" >
</div>
<label class="control-label col-sm-2" style="text-align:center;">رقم الشريحه</label>
<div class="col-sm-4">
<select class="form-control action_sim_id" name="sim_type" id="dvice_id" required>
<option value=""></option>
<?php
include '../connection.php';
$query_dvice_id = mysqli_query($conn, "SELECT sim_type FROM sims_type");
while($row_query_dvice_id=mysqli_fetch_assoc($query_dvice_id)){
$dvice_id = $row_query_dvice_id["sim_type"];
?>
<option  value="<?php echo $dvice_id;?>"><?php echo $dvice_id; ?></option>
<?php } ?>
</select>
</div>
<label class="control-label col-sm-2" style="text-align:center;">نوع الشريحه</label>
</div>
<div class="input-group">
<div class="col-sm-2" id="dvice_type">
</div>
<div class="col-sm-2" id="code_inventory">
</div>
<label class="control-label col-sm-2"></label>
<div class="col-sm-4">
<input type="text" class="form-control"   id="sim_ip"   name="sim_ip" placeholder="sim_ip"> 
</div>
<label class="control-label col-sm-2" style="text-align:center;">IP الشريحه</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary add" id="add" name="" data-dismiss="modal"><i class="fas fa-check"></i>اضافه</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div>