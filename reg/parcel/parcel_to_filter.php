<?php
session_start();
include '../../setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role'];
 
 ?>  
 <!DOCTYPE html>  
 <html lang="ar">  
      <head>  
           <title>استعلام عن الطرود الصادره</title>
           <link rel="icon" href="../../img/it.svg" type="image/x-icon" />
           <link rel="stylesheet" href="../../css4/bootstrap.min.css">
               <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js4/bootstrap.min.js"></script>
        <style>
            body{
                font-weight: bold;
            }

               tr:first-of-type {
                background-color: darkgray;
            }         

            .table td, .table th {
           
                 text-align: center;
                padding: 2px 5px;
            }
            #wait {
    position: relative;
    text-align: center;
    /* justify-content: center; */
    margin-top: 17%;
}
          </style>
      </head>  
      <body>
 		<header>
		<nav class="navbar  navbar-light bg-light  fixed-top">
		<a class="navbar-brand brand_home" href="../../index.php">الصفحه الرئيسيه</a>
			<ul class="navbar-nav">
				<li class="nav-item ">
					<input type="search" id="search" class="form-control" placeholder="بحث فى الطرود الصادره" autofocus>
				</li>
			</ul>
			<div class="nav-item dropdown ">
				<?php   include '../../setup/user/user.php'; ?>
			</div>
		</nav>
		</header>
          <br><br>
           
           <div class="container">
                <div style="clear:both"></div>                 
                <div style="direction: rtl;" id="order_table">  
                <h3 id="wait"></h3>
                </div>
                <!-- php start change_pass -->
<?php   include '../../setup/pass/change_password_form.php'; ?>
<!-- php end change_pass -->

<!--Logout Modal -->
<?php   include '../../setup/log/logout_form.php'; ?>
<!--Logout Modal -->
           </div>
      </body>  
 </html>  
 <script>
$(document).ready(function(){
 load_data();
 function load_data(query){
  $.ajax({
   url:"parcel_to_fetch.php",
   method:"POST",
   data:{query:query},
   beforeSend: function() {
        // setting a timeout
        $('#wait').html("الرجاء الانتظار");
    },
   success:function(data){$('#order_table').html(data);}
  });
 }
 $('#search').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else {load_data();}
 });
});
</script>  