<div class="modal fade" id="printer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_printer_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات الطابعه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="printer_name" placeholder="اسم الطابعه" required readonly>
</div>
<label class="control-label col-sm-2" >نوع الطابعه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" id="printer_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input  class="form-control" id="printer_damage"  name="_damage" placeholder="printer_damage" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >العطل</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_in_it_note" name="_in_it_note" placeholder="printer_in_it_note" required>
</div>
<label class="control-label col-sm-2" >ملاحظات</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input style="display:none" type="hidden" class="form-control" id="printer_num" name="_num" placeholder="printer_num" required>
</div>
<label class="control-label col-sm-2" ></label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_printer" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>