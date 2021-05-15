<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta lang="ar" charset="utf-8" />
    <title>سجل الزائرين الحاليين</title>
    <link rel="stylesheet" href="../css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header_nav.css">
    <link rel="stylesheet" href="../css/incoming.css">
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
    <div class="containe">
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
                            <th caption="رقم الملف" class="th_office"></th>
                            <th caption="اسم المستخدم" class="th_date_in  "></th>
                            <th caption="الوظيفه" class="th_by  "></th>
                            <th caption="وقت تسجيل الدخول" class="th_dvice  "></th>
                            <th caption="" class="th_sn  "></th>
                        </tr>
                    </thead>
                    <tbody id="result"></tbody>
                </table>
            </div>
            <script>
                var heightclient = document.documentElement.clientHeight - 157;
                document.getElementById('tableview-holder').style.height = heightclient + 'px';
                //alert(heightclient);
            </script>
        </div>
    </div>
    <!-- end add dvice -->
    <!-- php start change_pass -->
    <?php include '../setup/pass/change_password_form.php'; ?>
    <!-- php end change_pass -->

    <!--Logout Modal -->
    <?php include '../setup/log/logout_form.php'; ?>
    <!--Logout Modal -->

</body>
<script>
    $(document).ready(function() {



        function load_data(query) {
            $.ajax({
                url: "users_login_fetch.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
        // $('#search_text').keyup(function() {
        //     var search = $(this).val();
        //     if (search != '') {
        //         load_data(search);
        //     } else {
        //         load_data();
        //     }
        // });

        setInterval(function() {
            load_data();
        }, 5000);
    });
</script>

</html>