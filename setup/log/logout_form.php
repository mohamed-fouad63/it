<form>
<div id="logout" class="modal fade" role="dialog">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">تسجيل الخروج</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<input type="hidden" name="delete_id" value="<?php echo $id; ?>">
<div class="alert alert-danger">
	<label class="form-label">هل تريد تسجيل الدخول</label>
<!--<strong><?php //echo $_SESSION['user_name']; ?>?</strong>-->
</div>
</div>
<div class="modal-footer">
<a href="../../../it/setup/log/logout.php">
<button type="button" class="btn btn-danger">نعم </button>
</a>
<button type="button" class="btn btn-default" data-dismiss="modal">لا</button>
</div>
</div>
</div>
</div>
</form>
