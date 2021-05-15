<div class="modal fade" id="printer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form class="form-horizontal edit_printer_form"  role="form">
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
<input type="text" class="form-control"   id="printer_name"  name="_name" placeholder="printer_name" required readonly > 
</div>
<label class="control-label col-sm-2" >نوع الطابعه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn" id="printer_sn" placeholder="printer_sn" required>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input  class="form-control" id="printer_ip"  name="_ip" placeholder="printer_ip" required >
</div>
<label class="control-label col-sm-2" >ip</label>
</div>
<div style="display:none" class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="printer_office" name="_office" placeholder="printer_office" required readonly>
</div>
<label class="control-label col-sm-2" ></label>
<div class="col-sm-4">
<input style="display:none" type="text" class="form-control" id="printer_num" name="_num" placeholder="printer_num" required></div>
</div></div>

<div class="modal-footer">
<button type="submit" class="btn btn-primary edit_printer" id="edit_printer" onclick="get_edit_id(this)" data-dismiss="modal"><i class="fas fa-check"></i> تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div></div></form></div>