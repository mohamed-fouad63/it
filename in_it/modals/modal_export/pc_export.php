<?php date_default_timezone_set('Africa/Cairo'); ?>
<div class="modal fade" id="export_pc_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_pc_form">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">ارسال جهاز حاسب</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input  type="hidden" name="_export_num" id="pc_export_num" placeholder="pc_export_num"  >
<input type="hidden" name="_export_count_in_it" id="pc_export_count_in_it" placeholder="pc_move_count_in_it"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pc_export_name"  name="_export_name" placeholder="pc_export_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="pc_export_sn" placeholder="pc_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>


  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="pc_export_date"  name="_export_date" value="<?php echo date('Y-m-d'); ?>" required >
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="pc_export_parcel"   name="_export_parcel" placeholder="pc_export_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary"  data-dismiss="modal" id="export_pc" onclick="get_export_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 