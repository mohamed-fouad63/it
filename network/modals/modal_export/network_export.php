<div class="modal fade" id="export_network_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal export_network_form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">اعاده جهاز شبكه </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control" id="network_export_name" name="_export_name" placeholder="network_export_name" required readonly> 
</div>
<label class="control-label col-sm-2" >نوع جهاز الشبكه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_export_sn" id="network_export_sn" placeholder="network_export_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="network_export_date"  name="_export_date" placeholder="network_export_date" required value="<?php echo date('Y-m-d'); ?>">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="network_export_parcel"   name="_export_parcel" placeholder="network_export_parcel" required> 
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div> 
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="export_network" onclick="get_export_id(this);"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
<div style="display:none">
<input style="" type="text" name="_export_num" id="network_export_num" placeholder="network_export_num" required readonly>
<input style="" type="text" name="_post_office" id="network_post_office" placeholder="network_post_office" required readonly>
<input style="" type="text" name="_from_post_office" id="network_from_post_office" placeholder="network_from_post_office" required readonly>
</div>
</form>  
</div>