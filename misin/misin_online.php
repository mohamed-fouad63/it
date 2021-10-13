<?php
session_start();
$session_id = $_SESSION['id'];
$session_username = $_SESSION['user_name'];
$job = $_SESSION['job'];
include '../../it/setup/session/no_session.php';
if ($job == "hg") {
    header('location: not.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta lang="ar" charset="utf-8" />
    <title>ماموريات تحت الانتظار </title>
    <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../css/incoming.css">
    <link rel="stylesheet" href="../css/header_nav.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js4/bootstrap.min.js"></script>
    <!-- [if lt IE 9]><script src="../js/html5shiv.min.js"></script><![endif]-->

    <style>
    h2 {
        margin-top: 0;
    }

    table tr {
        transition: all .25s ease-in-out;
    }

    table tr:hover {
        background-color: #ddd;
    }
    </style>
</head>

<body>
    <div class="">
        <header>
            <nav class="navbar  navbar-light bg-light  fixed-top">

                <a class="navbar-brand brand_home" href="../index.php">الصفحه الرئيسيه</a>
                <div class="nav-item dropdown ">
                    <?php include '../setup/user/user.php'; ?>
                </div>

            </nav>
        </header>
        <div class="tableview tableview-has-footer">
            <div class="tableview-holder" id="tableview-holder">
                <table>
                    <thead>
                        <tr>
                            <th caption=" مسئول الدعم الفنى" class=""></th>
                            <th caption="يوم " class=""></th>
                            <th caption="تاريخ الماموريه " class=""></th>
                            <th caption="مكتب" class=""></th>
                            <th caption="خطه \ بلاغ" class=""></th>
                            <th caption="من الساعه" class=""></th>
                            <th caption=" حتى الساعه" class=""></th>
                            <th caption="رقم ملف" class=""  style="display:none;"></th>
                            <th caption="" class="" style="display:none;"></th>
                            <th caption="ما تم عمله" class=""></th>
                            <th caption="اجراء" class=""></th>
                        </tr>
                    </thead>
                    <tbody id="result" class="msg"></tbody>
                </table>
            </div>
        </div>
    </div>
    <!--start change passord -->
    <?php include '../setup/pass/change_password_form.php'; ?>
    <!-- end change_pass -->
    <!--start Logout Modal -->
    <?php include '../setup/log/logout_form.php'; ?>
    <!-- end Logout Modal -->
</body>
<script>

</script>
<script>
    $(document).ready(function() {



function load_data() {
    $.ajax({
        url: "mission_online_fetch.php",
        method: "POST",
        data: {},
        success: function(data) {
            $('#result').html(data);
        }
    });
}
load_data();
});
function misin_add() {
    var table = document.getElementById("result"),
        rIndex;
    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var it_name = this.cells[0].innerHTML,
            misin_day = this.cells[1].innerHTML,
            misin_date = this.cells[2].innerHTML,
            office_name = this.cells[3].innerHTML,
            misin_type = this.cells[4].innerHTML,
            start_time = this.cells[5].innerHTML,
            end_time = this.cells[6].innerHTML,
            id = this.cells[7].innerHTML,
            counter = this.cells[8].innerHTML;
            does = this.cells[9].innerHTML;
            $.ajax({
                url: "mission_online_add.php",
                method: "POST",
                data: {
                    it_name: it_name,
                    misin_day: misin_day,
                    misin_date: misin_date,
                    office_name: office_name,
                    misin_type: misin_type,
                    start_time: start_time,
                    end_time: end_time,
                    id: id,
                    counter: counter,
                    does:does
                },
                success: function(data) {
                    function load_data() {
                        $.ajax({
                            url: "mission_online_fetch.php",
                            method: "POST",
                            data: {},
                            success: function(data) {
                                $('#result').html(data);
                            }
                        });
                    }
                    load_data();
                }
            });
            

        };
    }



}
function misin_remove() {
    var table = document.getElementById("result"),
        rIndex;
    for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var it_name = this.cells[0].innerHTML,
            misin_day = this.cells[1].innerHTML,
            misin_date = this.cells[2].innerHTML,
            office_name = this.cells[3].innerHTML,
            misin_type = this.cells[4].innerHTML,
            start_time = this.cells[5].innerHTML,
            end_time = this.cells[6].innerHTML,
            id = this.cells[7].innerHTML,
            counter = this.cells[8].innerHTML;
            $.ajax({
                url: "mission_online_remove.php",
                method: "POST",
                data: {
                    it_name: it_name,
                    misin_day: misin_day,
                    misin_date: misin_date,
                    office_name: office_name,
                    misin_type: misin_type,
                    start_time: start_time,
                    end_time: end_time,
                    id: id,
                    counter: counter
                },
                success: function(data) {
                    function load_data() {
                        $.ajax({
                            url: "mission_online_fetch.php",
                            method: "POST",
                            data: {},
                            success: function(data) {
                                $('#result').html(data);
                            }
                        });
                    }
                    load_data();
                }
            });
            

        };
    }



}

</script>

</html>