<div class="modal fade" id="pc_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form  class="form-horizontal edit_pc_form" id="edit_pc_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات الجهاز</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pc_name"  name="_name" placeholder="اسم الجهاز" required readonly > 
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="pc_sn" placeholder="الرقم التسلسلى" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input  class="form-control" id="pc_ip"  name="_ip" placeholder="ip" required >

</div>
<label class="control-label col-sm-2" >ip</label>
<div class="col-sm-4">
<input  class="form-control" id="pc_domian_name"  name="_domian_name" placeholder="pc_domian_name" required >
</div>
<label class="control-label col-sm-2" >اسم الجهاز</label>
</div>
<div style="" class="input-group">
<label class="control-label col-sm-2" ></label>
<div class="col-sm-4">
<input type="hidden" class="form-control" id="pc_office" name="_office" placeholder="اسم المكتب" required readonly>
</div>
<div class="col-sm-4">
<input  type="hidden" class="form-control" id="pc_num" name="_num" placeholder="pc_num" required readonly>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary edit_pc" data-dismiss="modal" id="edit_pc" onclick="get_edit_id(this)"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>

</div>
</div>
</div>
</form>  
</div> 