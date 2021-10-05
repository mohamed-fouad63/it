<?php
session_start();
include '../../it/setup/session/no_session.php';
date_default_timezone_set('Africa/Cairo');
include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>اداره الروترات</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
<link rel="stylesheet" href="../css/print.css" media="print">
<link rel="stylesheet" href="../css4/bootstrap.min.css">
<link rel="stylesheet" href="../css/post.css">
<link rel="stylesheet" href="../css/typeahead.css">
<link rel="stylesheet" href="../css/header_nav.css">
<link rel="stylesheet" href="../css/scrollbar.css">
<!-- [if lt IE 9]><script src="js/html5shiv.min.js"></script><![endif]-->
<script src="../js/move.js"></script>
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js4/bootstrap.min.js"></script>
<script src="../js/typeahead.min.js"></script>
<script>
$(document).ready(function () {
      $.ajax({
        url: "routers_details.php",
        type: "POST",
        data: { key: "" },
        beforeSend: function () {
          // setting a timeout
          $("#wait").html("الرجاء الانتظار");
        },
        success: function (responseText) {
          $(".msg").html(responseText);
        },
      });
});
</script>
<style>
        #wait {
            position: relative;
            text-align: center;
            /* justify-content: center; */
            margin-top: 17%;
        }
        .add_new_dvice {
            position: fixed;
            top: 2%;
            z-index: 1030;
            left: 20%;
        }
          .toast{
      position: fixed;
      top: 66px;
      right: 18px;
      opacity: 1;
      display: none;
}

.msg {
    top: 10px;
    position: relative;
}
.table td, .table th {
    padding: 0;
}


.table tbody tr:hover {
  color: #fd7e14;
}
.dropdown-menu{
  min-width: 0;
  padding: 0;
}
.show{
  left: -3px;
}
</style>
</head> 
<body>
<div class="">
<header>
<nav class="navbar  navbar-light bg-light  fixed-top">
<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
<ul class="navbar-nav">
<li class="nav-item ">
</li>
</ul>
<div class="nav-item dropdown ">
<?php   include '../setup/user/user.php'; ?>
</div>
</nav>
</header>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">

</div>
<div class="msg" dir="rtl">
<h3 id="wait"></h3>
</div>
</div>
<script src="../js/search_live.js"></script>
<!-- start Modal edit  -->
<?php
if ( $_SESSION['edit'] == 1){ 
include "modals/modal_edit/edit_routres.php";

}?>
<!-- end Modal edit  -->


<!-- end send modal to own office -->
<!-- start add dvice -->
<!-- end add dvice -->
<!-- php start change_pass -->
<?php   include '../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->
<!--Logout Modal -->
<?php   include '../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
<script>

  function edit_routers() {
  var table15 = document.getElementById("routers_table"),
    rIndex1;
  for (var i = 1; i < table15.rows.length; i++) {
    table15.rows[i].onclick = function () {
      rIndex1 = this.rowIndex;
      document.getElementById("office_name").value = this.cells[0].innerHTML;
      document.getElementById("router_name").value = this.cells[1].innerHTML;
      document.getElementById("router_type").value = this.cells[2].innerHTML;
      document.getElementById("router_sn").value = this.cells[3].innerHTML;
      document.getElementById("IP").value = this.cells[4].innerHTML;
      document.getElementById("num").value = this.cells[8].innerHTML;
      var query1 =  this.cells[2].innerHTML;
      var query2 =  this.cells[5].innerHTML;
      var query3 =  this.cells[6].innerHTML;
$.ajax({ 
url:"routers_type/dvice_type_fetch.php",
method:"POST",
data:{query1:query1,query2:query2,query3:query3},
success:function(data)
{
$('#classification' ).html(data);
}
})
    };
  }
}

</script>
<script>
function edit_router_submit(m){
   let router_type = document.getElementById("router_type").value;
   let connecting = document.getElementById("connecting").value;
move_id = m.getAttribute("id");
move_id_form = move_id + '_form';
$.ajax({
url:"edit/edit_router.php",
type:"POST",
data :$("."+move_id_form ).serialize(),
success:function(data){
$("."+move_id_form)[0].reset();
var key1 = $(".typeahead").val();
$.ajax({
url:"routers_details.php",type:"POST",
data :{"key":key1},
success:function(responseText){$(".msg").html(responseText);},
});
}
});
}
</script>
</body>
</html>