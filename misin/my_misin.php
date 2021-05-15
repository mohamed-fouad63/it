<?php
session_start();
date_default_timezone_set('Africa/Cairo');
include '../connection.php';
$session_id = $_SESSION['id'];
$session_username = $_SESSION['user_name'];
$job = $_SESSION['job'];
include '../../it/setup/session/no_session.php';
if ($job == "hg") {
	header('location: not.php');
}
$query_id_it = mysqli_query($conn, "SELECT first_name, id FROM tbl_user where id = '$session_id'");
?>
<!DOCTYPE html>
<html>

<head>
	<meta lang="ar" charset="utf-8" />
	<title>ماموياتى</title>
	<link rel="icon" href="../img/it.svg" type="image/x-icon" />
	<link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
	<link rel="stylesheet" href="../css4/bootstrap.min.css">
	<link rel="stylesheet" href="../css/incoming.css">
	<link rel="stylesheet" href="../css/header_nav.css">
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js4/bootstrap.min.js"></script>
	<script src="../js/misin_deleted.js"></script>
	<!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->
	<style>
		body {
			overflow: hidden;
		}

		.hiddenpanal {
			display: none;
		}
		.befor_dayes_count {
			position: absolute;
			top: 10px;
			left: 15%;
		}
		.table_dayes_before {
			border-radius: .25rem;
			border: none;
			width: auto;
			height: auto;
			background-color: #f8f9fa;
			box-shadow:
				/* logo shadow */
				0px 0px 2px #5f5f5f,
				/* offset */
				0px 0px 0px 5px #ecf0f3,
				/* bottom right */
				8px 8px 15px #a7aaaf,
				/* top left */
				-8px -8px 15px #fff;
		}

		.table_dayes_before tr th,
		.table_dayes_before tr td {
			text-align: center !important;
		}

		.tbodychange {
			display: none;
		}

		.toggl_hidden {
			display: table-header-group;
			transition: 2s;
		}

		.arrow {
			border: solid black;
			border-width: 0 3px 3px 0;
			display: inline-block;
			padding: 3px;
			margin-left: 10px;
			margin-right: 10px;
			transition: 1s
		}

		.down {
			transform: rotate(45deg);
			-webkit-transform: rotate(45deg);
		}

		.up {
			transform: rotate(-135deg);
			-webkit-transform: rotate(-135deg);

		}

		h2 {
			margin-top: 0;
		}

		table .thead {
			direction: rtl;
		}

		table tr {
			transition: all .25s ease-in-out;

		}

		table tr:hover {
			background-color: #ddd;
		}

		.side-it {
			position: absolute;
			overflow-x: auto;
			overflow-y: auto;
			height: 80%;
			width: 25%;
			top: 100px;
			right: 0;
			direction: rtl;
			text-align: right;
			padding-right: 15px;
		}

		.side-it:hover {
			overflow-y: auto;
		}

		.side-it ul {
			padding: 0;
		}

		.side-it ul button {
			width: 14%;
		}

		.side-it-div {
			position: absolute;
			right: 0;
			height: 49.99px;
			width: 25%;
			background: #eef9ff;
			vertical-align: middle;
		}

		.side-it-label {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.li-it {
			margin-top: 5px;
			margin-bottom: 5px;
			list-style: none;
			padding: 10px 7px;
			cursor: pointer;
			display: inline-block;
			width: 80%;
		}

		.li-it:hover {
			background-color: beige;
		}

		.li-select {
			background-color: #ddd;
			width: 80%;
		}

		.tableview {
			width: 75%;
			position: absolute;
			height: 100%;
		}

		.tableview>.tableview-holder {
			display: block;
			position: static;
			overflow-x: auto;
			overflow-y: auto;
			height: 85%;
			transition: all 1s ease-out;
		}

		.hide {
			display: none
		}

		.td_hover {
			display: block;
		}

		.panel {
			margin-bottom: 14px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			width: 45%;
			float: right;
			margin-left: 14px;
			text-align: center;
		}

		.panel-default {
			border-color: #ddd;
		}

		.panel-default>.panel-heading {
			color: #333;
			background-color: #f5f5f5;
			border-color: #ddd;
		}

		.panel-title {
			margin-top: 0;
			margin-bottom: 0;
			font-size: 16px;
			color: inherit;
			display: inline-block;
			max-width: 100%;
			margin-bottom: 5px;
			font-weight: bold;
		}

		.panel-body {
			padding: 5px;
		}

		.div_year {
			margin-bottom: 15px;

		}

		.year_form {
			width:100%;
		}

		@media print {


			.side-it-div,
			.side-it {
				display: none;
			}

			.tableview {
				width: 100%;
				height: auto;

			}

			.tableview-holder {
				height: 29.7cm;
			}

			.td_hover {
				display: none
			}
		}
	</style>
</head>

<body>
	<div class="">
		<header>
			<nav class="navbar  navbar-light bg-light  fixed-top">
				<a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
				<span class="befor_dayes_count" id="befor_dayes_count">
				</span>
				<input type="month" class="form-control col-sm-2" id="month_missin" value="<?php echo date('Y-m'); ?>">
				<a href="misin_form.php" class="btn btn-outline-secondary add-icon"><i class='fas fa-plus'></i></a>
				<div class="nav-item dropdown ">
					<?php include '../setup/user/user.php'; ?>
				</div>
			</nav>
		</header>
		<div class="side-it">
			<div class="div_year">
			<div class="w13">
				<div class="panel panel-default year_form">
					<div class="panel-heading">
						<label class="panel-title" for="des">ادخل العام لعرض اجازاتك</label>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" name="search_text" id="search_text" placeholder="ادخل العام">
					</div>
			</div>
			</div>
			<div id="vacation_view">
			</div>
		</div>
	</div>
	<div class="side-it-div">
		<label for="" class="side-it-label"></label>
	</div>
	<div class="tableview">
		<div class="tableview-holder" id="tableview-holder">
			<table id='misin_table'>
				<thead>
					<tr>
						<!-- <th caption="القائم بالماموريه"></th> -->
						<th caption="يوم" class=""></th>
						<th caption="تاريخ الماموريه" class=""></th>
						<th caption="مكتب" class=""></th>
						<th caption="خطه \ بلاغ" class=""></th>
						<th caption="من الساعه" class=""></th>
						<th caption="حتى الساعه" class=""></th>
					</tr>
				</thead>
				<tbody id="result" class="msg"></tbody>
			</table>
		</div>
	</div>
	</div>


	<!-- end misin form -->


	<!--start change passord -->
	<?php include '../setup/pass/change_password_form.php'; ?>
	<!-- end change_pass -->
	<!--start Logout Modal -->
	<?php include '../setup/log/logout_form.php'; ?>
	<!-- end Logout Modal -->
</body>
<script>
	var count_befor_dayer = 0;
	var date_missin = $("#month_missin").val();
	//  alert(date_missin);
	$.ajax({
		url: "my_misin_fetch.php",
		type: "POST",
		data: {
			"date_missin": date_missin
		},
		success: function(data) {
			$(".msg").html(data);
		}

	});

	$.ajax({
		url: "befor_dayes_my_misin.php",
		type: "POST",
		data: {
			"date_missin": date_missin
		},
		success: function(data) {
			$(".befor_dayes_count").html(data);
		}

	});
</script>
<script>
	$("#month_missin").change(function() {
		$.ajax({
			url: "my_misin_fetch.php",
			type: "POST",
			data: {
				"date_missin": $(this).val()
			},
			success: function(data) {
				$(".msg").html(data);
			}

		});
	})
</script>
<script>
	$(document).ready(function() {
		var d = new Date();
		document.getElementById("search_text").value = d.getFullYear();
		var search_this_year = d.getFullYear();
		load_data(search_this_year);
		$('#search_text').keyup(function() {
			var search = $(this).val();
			if (search.length > 4) {
				alert("العام الذى ادخلته غير صحيح");
			} else if (search.length < 4) {
				load_data(search_this_year);
			} else {
				load_data(search);
			}
		});

		function load_data(query) {
			$.ajax({
				url: "my_misin_vaction_fetc.php",
				method: "POST",
				data: {
					query: query
				},
				success: function(data) {
					$('#vacation_view').html(data);
				}
			});
		}
	});
</script>
<script>
	function myFunction(x) {
		x.nextElementSibling.classList.toggle("toggl_hidden");
		x.firstElementChild.firstElementChild.firstElementChild.classList.toggle("up");
	}
</script>

</html>