<div class="modal fade" id="network_to_it" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal network_to_it_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"> وارد الى الدعم الفنى</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
<input style="display:none" type="text" class="form-control" id="network_num_in_it" name="_num_in_it" placeholder="network_num_in_it" required>
<input type="hidden" value = "network" name = "_id">
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="network_name_in_it"  name="_name_in_it" placeholder="network_name_in_it" required readonly> 
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn_in_it" id="network_sn_in_it" placeholder="network_sn_in_it" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input  class="form-control" id="network_parcel_in_it"  name="_parcel_in_it" placeholder="network_parcel_in_it" required >
</div>
<label class="control-label col-sm-2" >عن طريق</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="network_office_in_it" name="_office_in_it" placeholder="network_office_in_it" required readonly> 
</div>
<label class="control-label col-sm-2" >اسم المكتب</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input  class="form-control" id="network_damage_in_it"  name="_damage_in_it" placeholder="network_damage_in_it" required >
</div>
<label class="control-label col-sm-2" >العطل</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id="network_note_in_it" name="_note_in_it" placeholder="network_note_in_it">
    </div>
    <label class="control-label col-sm-2" >ملاحظات</label>
    </div>
    <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="network_date_in_it"  name="_date_in_it" placeholder="network_date_in_it" required value="<?php echo date('Y-m-d'); ?>">
</div>
       <label class="control-label col-sm-2" >بتاريخ</label>
        </div>
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="network_to_it" onclick="get_to_it_id(this);"><i class="fas fa-check"></i> استلام</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>

</div>
    </div>
    </div>
</form>  
</div> 