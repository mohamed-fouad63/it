<div class="modal fade" id="pos_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_pos_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات نقاط البيع</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pos_name"  name="_name" placeholder="pos_name" required readonly > 
</div>
<label class="control-label col-sm-2" >نوع نقطه البيع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="pos_sn" placeholder="pos_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input class="form-control" id="pos_ip"  name="_ip" placeholder="pos_ip" required >
</div>
<label class="control-label col-sm-2" >ip</label>
</div>
<div style="display:none" class="input-group">
<div class="col-sm-4">
<input type="hidden" class="form-control"  id="pos_office"   name="_office" placeholder="pos_office" required readonly> 
</div>
<label class="control-label col-sm-2" ></label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control"  id="pos_num"   name="_num" placeholder="pos_num" required readonly> 
</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="edit_pos" onclick="get_edit_id(this)" data-dismiss="modal"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div> 