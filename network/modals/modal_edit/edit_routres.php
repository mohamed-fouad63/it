<div class="modal fade" id="move_network_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal edit_router_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تعديل بيانات روتر </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden" name="num" id="num" placeholder="num" required readonly >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="router_name"  name="router_name" placeholder="router_name" required readonly> 
</div>
<label class="control-label col-sm-2" >نوع الروتر</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="office_name" id="office_name" placeholder="office_name" required readonly>
</div>
<label class="control-label col-sm-2" >اسم المكتب</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"  id="router_sn"   name="router_sn" placeholder="router_sn" required readonly> 
</div>
<label class="control-label col-sm-2" >السريال</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="router_type"   name="router_type" placeholder="router_type" readonly > 
</div>
<label class="control-label col-sm-2" >تصنيف الروتر</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="IP"  name="IP" placeholder="IP" required >
</div>
<label class="control-label col-sm-2" >IP</label>
<div class="col-sm-4" id="">
  <select class="form-control" name="classification" id="classification" required>

  </select>
</div>
<label class="control-label col-sm-2" >نوع الشبكه</label>
</div>  
  <div class="input-group" style="direction: rtl;">
    <label class="control-label col-sm-2" style="display: none;">ملاحظات</label>
<div class="col-sm-4" style="display: none;">
<input type="text" class="form-control"  id=""   name="" placeholder="" required> 
</div>

<label class="control-label col-sm-2" >موقفه</label>
<div class="col-sm-4">
    <select class="form-control" name="connecting" id="connecting" required>
    <option></option>
    <option value="يعمل">يعمل</option>
    <option value="ربط">ربط</option>
    <option value="احتياطى">احتياطى</option>
    <option value="لا يغمل">لا يغمل</option>
    </select>
</div>

</div>    
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="edit_router" onclick="edit_router_submit(this);"><i class="fas fa-check"></i>تعديل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div>