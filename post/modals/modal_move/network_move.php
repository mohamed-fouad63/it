<div class="modal fade" id="move_network_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<form method="POST" class="form-horizontal move_network_form" role="form">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">نقل </h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input style="display:none" type="text" name="_move_num" id="network_move_num" placeholder="network_move_num" required readonly >
<div class="input-group">
<div class="col-sm-4">
<input type="text" class="form-control"   id="network_move_name"  name="_move_name" placeholder="network_move_name" required readonly> 
</div>
<label class="control-label col-sm-2" >نوع</label>
<div class="col-sm-4">
<input type="text"  class="form-control" name="_move_sn" id="network_move_sn" placeholder="network_move_sn" required readonly>
</div>
<label class="control-label col-sm-2" >الرقم التسلسلى</label>
</div>
<div class="input-group">
<div class="col-sm-4">
<select class="form-control " name="_move_to"  required>
    <option></option>
    <?php 
    $sql11 = "SELECT office_name FROM all1 ORDER BY office_name ASC";
    $result11 = $conn->query($sql11);
    while($row11 = $result11->fetch_assoc()) {?>
    <option value="<?php echo $row11['office_name'] ?>"><?php echo $row11['office_name'] ?></option>'   
   <?php }?>
</select>
</div>
<label class="control-label col-sm-2" >الى</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="network_move_from"   name="_move_from" placeholder="network_move_from" required readonly> 
</div>
<label class="control-label col-sm-2" >من</label>
</div>
  <div class="input-group">
<div class="col-sm-4">
<input type="date" class="form-control" id="network_move_date"  name="_move_date" placeholder="network_move_date" required value="<?php echo date('Y-m-d'); ?>">
</div>
<label class="control-label col-sm-2" >بتاريخ</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="network_move_parcel"   name="_move_parcel" placeholder="network_move_parcel" required> 
</div>
<label class="control-label col-sm-2" >عن طريق</label>
</div>  
  <div class="input-group">

<div class="col-sm-4">
    <select class="form-control" name="_move_like" required>
    <option></option>
    <option value="مؤقت">مؤقت</option>
    <option value="عهده">عهده</option>
    </select>
</div>
<label class="control-label col-sm-2" >نقل كــ</label>
<div class="col-sm-4">
<input type="text" class="form-control"  id="network_move_note"   name="_move_note" placeholder="network_move_note" required> 
</div>
<label class="control-label col-sm-2" >ملاحظات</label>
</div>    
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" data-dismiss="modal" id="move_network" onclick="get_move_id(this);"><i class="fas fa-check"></i>نقل</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
</div>
</div>
</div>
</form>  
</div>