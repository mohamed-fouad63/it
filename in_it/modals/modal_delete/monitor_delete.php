<div class="modal fade" id="monitor_deleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal deleted_monitor_form">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تكهين شاشه حاسب</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input  type="hidden" name="_deleted_num" id="monitor_deleted_num" placeholder="monitor_deleted_num" readonly required>
<input  type="hidden" name="_deleted_count_in_it" id="monitor_deleted_count_in_it" placeholder="monitor_deleted_count_in_it" readonly required>
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="monitor_deleted_name" name="_deleted_name" placeholder="monitor_deleted_name" required readonly>
</div>
<label class="control-label col-sm-2" >نوع الشاشه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_deleted_sn" id="monitor_deleted_sn" placeholder="monitor_deleted_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>

<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="monitor_deleted_date" name="_deleted_date" value="<?php echo date('Y-m-d'); ?>" placeholder="monitor_deleted_date" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="monitor_deleted_parcel" name="_deleted_parcel" placeholder="monitor_deleted_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="deleted_monitor" onclick="get_deleted_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 