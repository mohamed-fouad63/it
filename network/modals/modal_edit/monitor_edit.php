<div class="modal fade" id="monitor_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form  class="form-horizontal edit_monitor_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات الشاشه</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="monitor_name"  name="_name" placeholder="monitor_name" required readonly> 
</div>
<label class="control-label col-sm-2" >نوع الشاشه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="monitor_sn" placeholder="monitor_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div style="display:none" class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"  id="monitor_office"   name="_office" placeholder="monitor_office" required readonly> 
</div>
   <label class="control-label col-sm-2" >اسم المكتب</label>
    <div class="col-sm-4">
<input style="display:none" type="hidden" name="_num" id="monitor_num" placeholder="monitor_num" required readonly>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-primary edit_monitor" id="edit_monitor" onclick="get_edit_id(this);" data-dismiss="modal"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div>