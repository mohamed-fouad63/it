<div class="modal fade" id="pc_replace" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal replace_pc_form">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">استبدال قطع جهاز حاسب</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text"  class="form-control" name="pc_replace_sn" id="pc_replace_sn" placeholder="pc_replace_sn" readonly required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
<div class="col-sm-4">
<input type="text" class="form-control"   id="pc_replace_name"  name="pc_replace_name" placeholder="pc_replace_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date"  class="form-control" name="pc_replace_date" id="pc_replace_date" value="<?php echo date('Y-m-d'); ?>" required>
</div>
<label class="control-label col-sm-2" >التاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control"   id="pc_replace_office_name"  name="pc_replace_office_name" placeholder="pc_replace_name" required readonly >
</div>
<label class="control-label col-sm-2" >اسم المكتب</label>
</div>

<div class="input-group">
<div class="col-sm-4">
<select class="form-control" name="pc_replace_type" id="dvice_name" required>
</select>
</div>
<label class="control-label col-sm-2" >الجزء المٌستبدل</label>
<div class="col-sm-4">

<select class="form-control action" name="dvice_id" id="dvice_id" required>
<option></option>
<?php
$query_dvice_id = mysqli_query($conn, "SELECT id FROM replace_pices_type GROUP BY id HAVING COUNT(*) >= 1  ");
while($row_query_dvice_id=mysqli_fetch_assoc($query_dvice_id)){
$dvice_id = $row_query_dvice_id["id"];
?>
<option  value="<?php echo $dvice_id;?>">
<?php echo $dvice_id; ?>
</option>

<?php } ?>
</select>
</div>
<label class="control-label col-sm-2" >الجزء التالف</label>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="replace_pc" onclick="get_replace_id(this)"><i class="fas fa-check"></i>استبدال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>