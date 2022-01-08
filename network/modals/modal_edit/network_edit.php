<div class="modal fade" id="network_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_network_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">

<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="network_name"  name="_name" placeholder="network_name" required readonly > 
</div>
<label class="control-label col-sm-2" >نوع القطعه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="network_sn" placeholder="network_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>

<div class="input-group">
<div class="col-sm-4" style="display:none">
<input type="text" class="form-control"  id="network_office"   name="_office" placeholder="network_office" required readonly> 
</div>
<!--<label class="control-label col-sm-2" >اسم المكتب</label>-->
<div class="col-sm-4">
<input type="text" class="form-control"  id="network_ip"   name="_ip" placeholder="network_ip"> 
</div>
<label class="control-label col-sm-2" >IP</label>
<div class="col-sm-4">
<input style="display:none" class="form-control" id="network_num"  name="_num" placeholder="network_num" required readonly>

</div>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" id="edit_network" onclick="get_edit_id(this)" data-dismiss="modal"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>