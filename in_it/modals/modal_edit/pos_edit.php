<div class="modal fade" id="pos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_pos_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات نقطه البيع</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pos_name"  name="_name" placeholder="اسم " required readonly>
</div>
<label class="control-label col-sm-2" >نوع نقطه البيع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="pos_sn" placeholder="الرقم التسلسلى" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input  class="form-control" id="pos_damage"  name="_damage" placeholder="pos_damage" required style="width: 100%;">
</div>
<label class="control-label col-sm-2" >العطل</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="pos_in_it_note" name="_in_it_note" placeholder="pos_in_it_note" required>
</div>
<label class="control-label col-sm-2" >ملاحظات</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input style="display:none" type="hidden" class="form-control" id="pos_num" name="_num" placeholder="pos_num" required readonly>
</div>
<label class="control-label col-sm-2" ></label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_pos" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div> 