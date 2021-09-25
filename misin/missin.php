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
$query_id_it = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'اخصائى تشغيل نظم' or job like 'رئيس قسم الدعم الفنى'");
?>
<!DOCTYPE html>
<html>

<head>
    <meta lang="ar" charset="utf-8" />
    <title>تسجيل الماموريات</title>
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

        .label-date-count,
        .befor_dayes_count {
            border: 1px solid #6c757d;
            border-radius: .25rem;
            padding: .375rem .75rem;
            transform: rotatey(10deg);

        }

        .befor_dayes_count {
            border: none;
            width: auto;
            height: auto;
            position: absolute;
            left: 13%;
            top: 10px;
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

        .befor_dayes_count tr th,
        .befor_dayes_count tr td {
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

        .side-it ul a {
            display: none;
        }

        .side-it ul button {
            display: none;
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
                    ايام مفتوحه
                </span>
                <input type="month" class="form-control col-sm-2" id="month_missin" value="<?php echo date('Y-m'); ?>">
                <span class="hiddenpanal" id="hiddenpanal">
                    <span class="label-date-count btn btn-outline-secondary" id="label-date-count"></span>
                    <span class="btn btn-outline-secondary btn-print" id="btn-print" onclick="window.print();"><i class="fas fa-print"></i></span>

                </span>
                <div class="nav-item dropdown ">
                    <?php include '../setup/user/user.php'; ?>
                </div>
            </nav>
        </header>
        <div class="side-it">
            <ul>
                <?php while ($row_query_id_it = mysqli_fetch_assoc($query_id_it)) { ?>
                    <div>
                        <li class="li-it"><?php echo $row_query_id_it['first_name']; ?></li>
                        <button class="btn btn-outline-secondary add-icon" data-toggle='modal' data-target='#export_pc_to' onclick="get_id_it(this)"><i class='fas fa-plus'></i></button>
                        <a><?php echo $row_query_id_it['id']; ?></a>
                    </div>
                <?php } ?>
            </ul>
        </div>
        <div class="side-it-div">
            <label for="" class="side-it-label">اعضاء الدعم الفنى</label>
        </div>
        <div class="tableview">
            <div class="tableview-holder" id="tableview-holder">
                <table id='misin_table'>
                    <thead>
                        <tr>
                            <th caption="القائم بالماموريه"></th>
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
    <div style="text-align:center;" class="modal fade" id="export_pc_to" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" class="form-horizontal add_form" target="_top">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <a href="my_misin.php">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </a>
                        <h4 class="modal-title">اضافه مامويه جديده</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="col-sm-4">
                                <select class="form-control" name="office_name" id="office_name" onchange="chanemisin()" required>
                                    <option></option>
                                    <option value="المنطقه">المنطقه</option>
                                    <option value="اجازه اعتياديه">اجازه اعتياديه</option>
                                    <option value="اجازه عارضه">اجازه عارضه</option>
                                    <option value="بدل راحه">بدل راحه</option>
                                    <option value="اجازه رسميه">اجازه رسميه</option>
                                    <option value="اجازه استثنائيه">اجازه استثنائيه</option>
                                    <option value="اجازه مرضيه">اجازه مرضيه</option>
                                    <option value="ماموريه القاهره">ماموريه القاهره</option>\
                                    <option value="لجنه جرد">لجنه جرد</option>
                                    <?php

                                    $sql10 = "SELECT office_name FROM all1 ORDER BY office_name ASC";
                                    $result10 = $conn->query($sql10);
                                    while ($row10 = $result10->fetch_assoc()) { ?>
                                        <option value="<?php echo $row10['office_name'] ?>"><?php echo $row10['office_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <label class="control-label col-sm-2">مكتب المرور</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="it_name" id="first_name" placeholder="it_name" required>
                                <input type="hidden" class="form-control" name="it_id" id="it_id" placeholder="it_id" required>
                            </div>
                            <label class="control-label col-sm-2">القائم بالماموريه</label>
                        </div>
                        <!-- end first -->
                        <!-- start sec -->
                        <div class="input-group">
                            <div class="col-sm-4">
                                <select class="form-control " name="misin_type" id="misin_type">
                                    <option></option>
                                    <option value="خطه">خطه</option>
                                    <option value="بلاغ">بلاغ</option>
                                </select>
                            </div>
                            <label class="control-label col-sm-2" id="misin_type_label"> نوع الماموريه</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="misin_date" name="misin_date" value="<?php echo date('Y-m-d'); ?>" placeholder="تاريخ الماموريه" required>
                            </div>
                            <label class="control-label col-sm-2">بتاريخ</label>
                        </div>
                        <!-- end sec -->
                        <!-- start thr -->
                        <div class="input-group" id="misin_time">
                            <div class="col-sm-4">
                                <input type="time" class="form-control" id="end_time" name="end_time" value="15:00:00" required>
                            </div>

                            <label class="control-label col-sm-2">الى الساعه</label>
                            <div class="col-sm-4">
                                <input type="time" class="form-control" id="start_time" name="start_time" value="08:00:00" required>
                            </div>
                            <label class="control-label col-sm-2">من الساعه</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add" data-dismiss="modal"><i class="fas fa-check"></i>اضافه الماموريه</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- end misin form -->

    <div style="text-align:center;" class="modal fade" id="misin_deleted" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="POST" class="form-horizontal delete_form" role="form">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">حذف الماموريه</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="col-sm-4">
                                <labe class="form-control" name="office" id="office"></labe>
                            </div>
                            <label class="control-label col-sm-2">مكتب</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="it_name" name="it_name"> </label>
                            </div>
                            <label class="control-label col-sm-2">اخصائى تشغيل نظم</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="num" id="num" placeholder="num" required>
                            </div>
                            <!-- <label class="control-label col-sm-2" >بتاريخ</label> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary delete" data-dismiss="modal" name="delete_misin"><i class="fas fa-check"></i>حذف الماموريه</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-ban"></i> الغاء</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
    //if(isset($_POST['delete_misin'])){ include 'deleted_misin.php';}
    ?>

    <!--start change passord -->
    <?php include '../setup/pass/change_password_form.php'; ?>
    <!-- end change_pass -->
    <!--start Logout Modal -->
    <?php include '../setup/log/logout_form.php'; ?>
    <!-- end Logout Modal -->
</body>
<script>
    var count_befor_dayer = 0;
    $(".li-it").click(function() {
        $(".li-it").removeClass("li-select");
        $(this).addClass("li-select");
        $(".side-it ul button").css("display", "none");
        $(this).next().css("display", "inline");

        var key = $(this).text();
        var date_missin = $("#month_missin").val();
        //  alert(date_missin);
        $.ajax({
            url: "missin_fetch.php",
            type: "POST",
            data: {
                "key": key,
                "date_missin": date_missin
            },
            success: function(data) {
                $(".msg").html(data);
            }

        });
        $.ajax({
            url: "days_count.php",
            type: "POST",
            data: {
                "key": key,
                "date_missin": date_missin
            },
            success: function(data) {
                $(".label-date-count").html(data);
                document.getElementById("hiddenpanal").style.display = "block";

            }

        });
        $.ajax({
            url: "befor_dayes_count.php",
            type: "POST",
            data: {
                "key": key,
                "date_missin": date_missin
            },
            success: function(data) {
                $(".befor_dayes_count").html(data);
            }

        });
    });
</script>
<script>
    function get_id_it(s) {
        document.getElementById("it_id").value = $(s).next().text();
        document.getElementById("first_name").value = $(s).prev().text();
    }

    function days_count() {

    }
</script>
<script>
    function chanemisin() {
        var office = document.getElementById('office_name').value;
        switch (office) {
            case "اجازه اعتياديه":
            case "اجازه عارضه":
            case "بدل راحه":
            case "اجازه رسميه":
            case "اجازه مرضيه":
            case "اجازه استثنائيه":
                $("#misin_type").prop("selectedIndex", -1);
                document.getElementById("start_time").value = '';
                document.getElementById("end_time").value = '';
                $("#misin_type").attr("disabled", "true");
                $("#start_time").attr("disabled", "disabled");
                $("#end_time").attr("disabled", "disabled");
                break;
            case "المنطقه":

                document.getElementById("start_time").value = '10:00:00';
                document.getElementById("end_time").value = '17:00:00';
                break;
            default:
                document.getElementById("start_time").value = '08:00:00';
                document.getElementById("end_time").value = '15:00:00';
                document.getElementById("misin_type").disabled = false;
                document.getElementById("start_time").disabled = false;
                document.getElementById("end_time").disabled = false;
        }
    }
</script>
<script>
    $(".add").click(function() {
        $.ajax({
            url: "misin_form_sub.php",
            type: "POST",
            data: $(".add_form").serialize(),
            success: function(data) {
                $(".msg").html(data);
                var key = $("#first_name").val();
                var date_missin = $("#month_missin").val();
                $("#office_name").prop("selectedIndex", -1);
                $("#misin_type").prop("selectedIndex", -1);

                $.ajax({
                    url: "missin_fetch.php",
                    type: "POST",
                    data: {
                        "key": key,
                        "date_missin": date_missin
                    },
                    success: function(data) {
                        $(".msg").html(data);
                    }
                });

                $.ajax({
                    url: "days_count.php",
                    type: "POST",
                    data: {
                        "key": key,
                        "date_missin": date_missin
                    },
                    success: function(data) {
                        $(".label-date-count").html(data);
                    }

                });

                $.ajax({
                    url: "befor_dayes_count.php",
                    type: "POST",
                    data: {
                        "key": key,
                        "date_missin": date_missin
                    },
                    success: function(data) {
                        $(".befor_dayes_count").html(data);
                    }
                });
            }

        });


    });
</script>

<script>
    $(".delete").click(function() {
        $.ajax({
            url: "deleted_misin.php",
            type: "POST",
            data: $(".delete_form").serialize(),
            success: function(data) {
                $(".msg").html(data);
                var key = $("#it_name").val();
                var date_missin = $("#month_missin").val();
                $.ajax({
                    url: "missin_fetch.php",
                    type: "POST",
                    data: {
                        "key": key,
                        "date_missin": date_missin
                    },
                    success: function(data) {
                        $(".msg").html(data);
                    }
                });

                $.ajax({
                    url: "days_count.php",
                    type: "POST",
                    data: {
                        "key": key,
                        "date_missin": date_missin
                    },
                    success: function(data) {
                        $(".label-date-count").html(data);
                    }

                });

                $.ajax({
                    url: "befor_dayes_count.php",
                    type: "POST",
                    data: {
                        "key": key,
                        "date_missin": date_missin
                    },
                    success: function(data) {
                        $(".befor_dayes_count").html(data);
                    }

                });
            }

        });


    });
</script>

<script>
    function myFunction(x) {
        x.nextElementSibling.classList.toggle("toggl_hidden");
        x.firstElementChild.firstElementChild.firstElementChild.classList.toggle("up");
    }
</script>
<script>
    $("#month_missin").change(function() {
        var key = $(".li-select").text();
        $.ajax({
            url: "missin_fetch.php",
            type: "POST",
            data: {
                "key": key,
                "date_missin": $(this).val()
            },
            success: function(data) {
                $(".msg").html(data);
            }

        });
    })
</script>

</html>