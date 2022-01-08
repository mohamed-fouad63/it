<div class="modal fade" id="pc_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" action="../in_it/word2.php" target="_blank" class="form-horizontal">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">طباعه اذن الاصلاح</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden" name="_num_tts" id="pc_num_tts" placeholder="pc_num_tts"  >
<input type="hidden" name="_count_in_tts" id="" placeholder="pc_count_in_tts"  >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="pc_name_ticket"  name="pc_name_ticket" placeholder="pc_name_tts" required readonly >
</div>
<label class="control-label col-sm-2" >نوع الجهاز</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="pc_sn_ticket" id="pc_sn_ticket" placeholder="pc_sn_tts" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="pc_date_ticket"  name="pc_date_ticket" value="<?php echo date('Y-m-d'); ?>"  required>
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="pc_damage_ticket"   name="pc_damage_ticket" placeholder="pc_auth_repair" required>
</div>
<label class="control-label col-sm-2" >العطل</label>
</div>
</div>
<div class="modal-footer">
<button type="submit" name="sub_print_ticket" class="btn btn-primary" ><i class="fas fa-check"></i>استخراج اذن الاصلاح</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> تم</button>
</div>
</div>
</div>
</form>
</div> 