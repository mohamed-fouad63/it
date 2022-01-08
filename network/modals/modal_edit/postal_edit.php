<div class="modal fade" id="postal_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_postal_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">

<div class="modal-header">
<h4 class="modal-title">تعديل بيانات بوستال </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden" name="edit_item_id"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="postal_name"  name="_name" placeholder="postal_name" required readonly > 
</div>
<label class="control-label col-sm-2" >نوع جهاز بوستال</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="postal_sn" placeholder="postal_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div style="display:none" class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"  id="postal_office"   name="_office" placeholder="postal_office" required readonly> 
</div>
<label class="control-label col-sm-2" > </label>
<div class="col-sm-4">
<input style="display:none" class="form-control" id="postal_num"  name="_num" placeholder="postal_num" required readonly>
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="edit_postal" onclick="get_edit_id(this)" data-dismiss="modal"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div>