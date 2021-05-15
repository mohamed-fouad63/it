<a class="nav-link btn btn-outline-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php echo $_SESSION['user_name']//" ".$session_role; ?>
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="#logout" data-toggle="modal">تسجيل الخروج</a>
<a class="dropdown-item" href="#changepass" data-toggle="modal">تغيير كلمه المرور</a>
</div>
