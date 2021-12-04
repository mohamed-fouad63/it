<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
$session_role = $_SESSION['role']; ?>
<!DOCTYPE html>
<html lang="fa">
<head>
<meta lang="ar" charset="utf-8"/>
<title>عهد المكاتب</title>
<link rel="icon" href="../img/it.svg" type="image/x-icon" />
<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
	<link rel="stylesheet" href="../css4/bootstrap.min.css">
	<link rel="stylesheet" href="../css/header_nav.css">
<link rel="stylesheet" href="../css/incoming.css">

 
<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js4/bootstrap.min.js"></script>
<!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
<style>
 #wait {
    position: relative;
    text-align: center;
    /* justify-content: center; */
    margin-top: 17%;
}
</style>
</head>
<body>
	<div class="containe">
    <!--- -->
		<header>
			<nav class="navbar  navbar-light bg-light  fixed-top">
				<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
				<ul class="navbar-nav">
					<li class="nav-item ">
						<form class="navbar-form  form-inline my-2 my-lg-0" method="post">
							<input type="search" class="form-control" name="search_text" id="search_text"  onkeyup="search()" autofocus placeholder=" بحث فورى"/>
						</form>
					</li>
				</ul>
				<div class="nav-item dropdown ">
					<?php   include '../setup/user/user.php'; ?>
				</div>
			</nav>
		</header>
    <!-- -->
    <div class="tableview tableview-has-footer">
  <div class="tableview-holder" id="tableview-holder">
  
<table id="all_dvice_table">
<thead>
<tr>
    <th caption="مكتب / قسم" class="th_office"></th>
    <th caption="نوع الجهاز" class="th_date_in  "></th>
    <th caption="السريال" class="th_by  "></th>
    <th caption="IP" class="th_dvice  "></th>
    <th caption="موقفه" class="th_damage  "></th>
</tr>
    </thead>
    <tbody id="all_dvice">
    </tbody>
      </table>
        </div>
        <!-- <script>
        var heightclient = document.documentElement.clientHeight - 157;
            document.getElementById('tableview-holder').style.height = heightclient + 'px';
           // alert(heightclient);
        </script> -->
    </div>
    </div>
<!--start change passord -->
                    <?php   include '../setup/pass/change_password_form.php'; ?>
                    <!-- end change_pass -->
                    <!--start Logout Modal -->
                    <?php   include '../setup/log/logout_form.php'; ?>
                    <!-- end Logout Modal -->

    </body>
  
<script>
    var url = 'http://localhost/it/api/read.php';
    loadJSON(url, responseData,responseError);
    function loadJSON(path, success, error) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = ()=> {
        if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            success(JSON.parse(xhr.responseText));
            console.log(xhr);
        }
        else {
            error(xhr);
        }
        }
    };
    xhr.open('POST', path, true);
    xhr.addEventListener("loadstart", e => { document.getElementById("all_dvice").innerHTML = "جارى تحميل البيانات"; });
    //  xhr.addEventListener("progress", e => { alert("progress"); });
    // xhr.addEventListener("load", e => { alert("load"); });
    // xhr.addEventListener("loadend", e => { alert("loadend"); });
    xhr.send();
    }
    function responseError(error){
        console.log(error);
    }
    function responseData(Data){
    var tr = '';
    for (let i = 0; i < Data.length; i++) {
        tr = tr
        +"<tr>"
        +"<td>"+Data[i].office_name+"</td>"
        +"<td>"+Data[i].dvice_name+"</td>"
        +"<td>"+Data[i].sn+"</td>"
        +"<td>"+Data[i].ip+"</td>"
        +"<td>"+Data[i].note+Data[i].note_move_to+"</td>"
        +"</tr>";
    }
    document.getElementById("all_dvice").innerHTML = tr;
    }
</script>
<script>
  function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search_text");
    filter = input.value.toUpperCase();
    table = document.getElementById("all_dvice_table");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
      tr[i].style.display = "none";
      td = tr[i].getElementsByTagName("td");
      for (var j = 0; j < td.length; j++) {
        cell = tr[i].getElementsByTagName("td")[j];
        
          if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          }
        
      }
      
  }
  }
  </script>
</script>
</html>
