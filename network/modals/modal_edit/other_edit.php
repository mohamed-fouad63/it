<div class="modal fade" id="other_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_other_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="other_name"  name="_name" placeholder="other_name" required readonly > 
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="other_sn" placeholder="other_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div style="display:none" class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"  id="other_office"   name="_office" placeholder="other_office" required readonly> 
<input style="display:none" type="text" class="form-control"  id="other_num"   name="_num" placeholder="other_num" required readonly> 
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="edit_other" onclick="get_edit_id(this)" data-dismiss="modal"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div> 