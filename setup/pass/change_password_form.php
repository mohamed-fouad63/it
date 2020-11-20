<div id="changepass" class="modal fade" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<form  method="POST">
<div class="modal-header">
<h4 class="modal-title">تغيير كلمه المرور</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<div class="modal-body">
<div class="input-group">

<div class="col-sm-10">
<input type="password" class="form-control" name="current_password" required placeholder="كلمه المرور الحاليه"  autocomplete="off"> </div>
<label class="form-label col-sm-2" for="name">الحاليه</label>
</div>
<div class="input-group">

<div class="col-sm-10">
<input type="password" class="form-control" name="new_password" required placeholder="كلمه المرور الجديده" autocomplete="off"> </div>
<label class="form-label col-sm-2" for="name">الجديده</label>
</div>
<div class="input-group">

<div class="col-sm-10">
<input type="password" class="form-control" name="repeat_password" required placeholder="تأكيد" autocomplete="off"> </div>
<label class="form-label col-sm-2" for="name">تأكيد</label>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" name="change_pass">تحديث</button>
</div>
</div>
</form>
</div>
</div>
</div>
    <?php if(isset($_POST['change_pass'])){ include 'change_password.php';}?>