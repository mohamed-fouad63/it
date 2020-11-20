<div class="modal fade" id="printer_deleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal deleted_printer_form">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تكهين طابعه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input  type="hidden" name="_deleted_num" id="printer_deleted_num" placeholder="printer_deleted_num" required readonly>
<input  type="hidden" name="_deleted_count_in_it" id="printer_deleted_count_in_it" placeholder="printer_deleted_count_in_it" readonly required>
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_deleted_name" name="_deleted_name" placeholder="printer_deleted_name" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الطابعه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_deleted_sn" id="printer_deleted_sn" placeholder="printer_deleted_sn" readonly required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="printer_deleted_date" name="_deleted_date" value="<?php echo date('Y-m-d'); ?>" placeholder="printer_deleted_date" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_deleted_parcel" name="_deleted_parcel" placeholder="printer_deleted_parcel" required>
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="deleted_printer" onclick="get_deleted_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 