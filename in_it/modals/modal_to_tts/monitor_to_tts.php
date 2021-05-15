<div class="modal fade" id="monitor_to_tts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal to_tts_monitor_form">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title"> ارسال شاشه الى قطاع الدعم الفنى</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden" name="_num_tts" id="monitor_num_tts" placeholder="monitor_num_tts"  >
<input type="hidden" name="_count_in_tts" id="monitor_count_in_tts" placeholder="monitor_count_in_tts"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="monitor_name_tts"  name="_name_tts" placeholder="monitor_name_tts" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الشاشه</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_sn_tts" id="monitor_sn_tts" placeholder="monitor_sn_tts" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="monitor_date_tts"  name="_date_tts" value="<?php echo date('Y-m-d'); ?>" required>
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="monitor_auth_repair"   name="_auth_repair" placeholder="monitor_auth_repair" required>
</div>
<label class="control-label col-sm-2" >رقم الاذن</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="to_tts_monitor" onclick="get_to_tts_id(this)"><i class="fas fa-check"></i>ارسال</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>
</div>