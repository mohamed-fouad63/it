<?php
session_start();
include '../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta lang="en-US" charset="utf-8" />
    <title>سجل الاجازات و الراحات</title>
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
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <form class="navbar-form  form-inline my-2 my-lg-0" method="post">
                            <input type="search" class="form-control" name="search_text" id="search_text" autofocus placeholder="ادخل العام" />
                        </form>
                    </li>
                </ul>
                <div class="nav-item dropdown ">
                    <?php   include '../setup/user/user.php'; ?>
                </div>
            </nav>
        </header>
        <div class="tableview tableview-has-footer">
            <div class="tableview-holder" id="tableview-holder">
                <table>
                    <thead>
                        <tr>
                            <th caption="عضو الدعم الفنى" class="th_date_in  "></th>
                            <th caption="اجازه اعتياديه" class="th_by  "></th>
                            <th caption="اجازه عارضه" class="th_office"></th>
                            <th caption="ايام السبت" class="th_office"></th>
                            <th caption="بدل راحه" class="th_dvice  "></th>
                            <th caption="ماموريات" class="th_sn  "></th>
                            <th caption="اجازه مرضيه" class="th_sn  "></th>
                            <th caption="اجازه استثنائيه" class="th_sn  "></th>
                        </tr>
                    </thead>
                    <tbody id="result"></tbody>
                </table>
            </div>
            <!-- <script>
                var heightclient = document.documentElement.clientHeight - 157;
                document.getElementById('tableview-holder').style.height = heightclient + 'px';
                //alert(heightclient);

            </script> -->
        </div>
    </div>
    <!-- end add dvice -->
    <!-- php start change_pass -->
    <?php   include '../setup/pass/change_password_form.php'; ?>
    <!-- php end change_pass -->
    <!--Logout Modal -->
    <?php   include '../setup/log/logout_form.php'; ?>
    <!--Logout Modal -->
</body>
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
                url: "vacation_fetch.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }
    });

</script>

</html>
