<div class="modal fade" id="add_dvice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal add_form" id="add_form" role="form">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"> اضافه عهده بمكتب / قسم </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body"> 
<input style="text-align:center;"  name="office_name_dvice" id="office_name_dvice" placeholder="office_name_dvice" hidden>
<div class="input-group">
<div class="col-sm-4" >
<select class="form-control dvice_name" name="dvice_name" id="dvice_name" required>
    <option value=""></option>
</select>
</div>
<label class="control-label col-sm-2" style="text-align:center;">اسم الجهاز</label>
<div class="col-sm-4">
<select class="form-control action_dvice_id" name="dvice_id" id="dvice_id" required>
<option value=""></option>
<?php
$conn1=mysqli_connect("localhost","root","12345678","post");
$query_dvice_id = mysqli_query($conn1, "SELECT id FROM dvice_type GROUP BY id HAVING COUNT(*) >= 1  ");
while($row_query_dvice_id=mysqli_fetch_assoc($query_dvice_id)){
$dvice_id = $row_query_dvice_id["id"];
?>
<option  value="<?php echo $dvice_id;?>"><?php echo $dvice_id; ?></option>
<?php } ?>
</select>
</div>
<label class="control-label col-sm-2" style="text-align:center;">نوع الجهاز</label>
</div>
<div class="input-group">
<div class="col-sm-2" id="dvice_type">
    <input type="text" class="form-control dvice_type" name = "dvice_type" readonly>
</div>
<div class="col-sm-2" id="code_inventory">
    <input type="text" class="form-control code_inventory" name = "code_inventory" readonly>
</div>
<label class="control-label col-sm-2"></label>
<div class="col-sm-4">
<input type="text" class="form-control"   id="sn"   name="sn" placeholder="sn"> 
</div>
<label class="control-label col-sm-2" style="text-align:center;">الرقم التسلسلى</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary add" id="m" name="" data-dismiss="modal"><i class="fas fa-check"></i>اضافه</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div>