<div class="modal fade" id="move_pc_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal move_pc_form">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">نقل جهاز حاسب</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input  type="hidden" name="_move_num" id="pc_move_num"  placeholder="pc_move_num" required readonly >
<input  type="hidden" name="_move_num_in_it" id="pc_move_num_in_it"  placeholder="pc_move_num_in_it" required readonly >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="pc_move_name" name="_move_name" placeholder="pc_move_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_move_sn" id="pc_move_sn" placeholder="pc_move_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<select class="form-control list" name="_move_to" required>
<option></option>
<?php
$sql10 = "SELECT office_name FROM all1 ORDER BY office_name ASC";
$result10 = $conn->query($sql10);
while($row10 = $result10->fetch_assoc()) {?>
<option value="<?php echo $row10['office_name'] ?>"><?php echo $row10['office_name'] ?></option>'
<?php }?>
</select>
</div>
<label class="control-label col-sm-2" >الى</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pc_move_from" name="_move_from" placeholder="pc_move_from" required readonly>
</div>
<label class="control-label col-sm-2" >من</label>
</div>

<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" name="_move_date" value="<?php echo date('Y-m-d'); ?>" placeholder="pc_move_date" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="_move_parcel" placeholder="pc_move_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>

<div class="input-group">
<div class="col-sm-4">
<select class="form-control" name="_move_like" required>
<option></option>
<option value="مؤقت">مؤقت</option>
<option value="عهده">عهده</option>
</select>
</div>
<label class="control-label col-sm-2" >نقل كــ</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="_move_note" placeholder="pc_move_note" required>
</div>
<label class="control-label col-sm-2" >ملاحظات</label>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="move_pc" onclick="get_move_id(this)"><i class="fas fa-check"></i>نقل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 