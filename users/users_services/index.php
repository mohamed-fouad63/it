<?php
session_start();
$session_id = $_SESSION['id'];
$session_username = $_SESSION['user_name'];
$db = $_SESSION['db'];
include '../../../it/setup/session/no_session.php';
//if ( $job == "hg"){ header('location: not.php');}
include '../../connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="rtl"

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../js/jquery-3.1.1.min.js"></script>
    <style>
        fieldset:not(:first-of-type) {
            margin-top: 10px
        }

        legend {
            margin: 0 30px;
            padding: 10px 10px;
            border: 1px solid;

        }

        table {
            display: table;
            margin: auto;
            width: 90%;
            border-collapse: unset;
            border-spacing: 0px 2px;
            text-align: center;
        }


        table tbody tr td {
            padding-bottom: 1px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <input type="search" name="" id="search">
        </div>
        <fieldset>
            <legend>التجزئه الماليه</legend>
            <table>
                <thead>
                    <tr>
                        <th>اسم المكتب</th>
                        <th>اسم المستخدم</th>
                        <th>رقم الملف</th>
                        <th>الرقم القومى</th>
                        <th>الصلاحيه</th>
                        <th>رقم المحمول</th>
                    </tr>
                </thead>
                <tbody id="tg">

                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <legend>الحوالات</legend>
            <table>
                <thead>
                    <tr>
                        <th>اسم المكتب</th>
                        <th>الكود المالى</th>
                        <th>اسم الموظف</th>
                        <th>الصلاحيه</th>
                        <th>رقم الملف</th>
                        <th>الرقم القومى</th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody id="hewalat_users">

                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <legend>pos Bitel</legend>
            <table>
                <thead>
                    <tr>
                        <th>اسم المنطقه</th>
                        <th>اسم المكتب</th>
                        <th>الكود المالى</th>
                        <th>رقم الماكينه</th>
                        <th>s / n</th>
                        <th>صلاحيه</th>
                        <th>الاسم رباعى</th>
                        <th>رقم الملف</th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody id="bitel_users">

                </tbody>
            </table>
        </fieldset>
        <fieldset>
            <legend>pos verifone</legend>
            <table>
                <thead>
                    <tr>
                        <th>اسم المنطقه</th>
                        <th>اسم المكتب</th>
                        <th>الكود المالى</th>
                        <th>رقم الماكينه</th>
                        <th>s / n</th>
                        <th>صلاحيه</th>
                        <th>الاسم رباعى</th>
                        <th>رقم الملف</th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody id="v200t_users">

                </tbody>
            </table>
        </fieldset>
        <div>
        <table id="hewalat_table">
            <thead>
                <tr>
                    <td>الكود المالى</td>
                    <td>اسم الموظف</td>
                    <td>الصلاحيه</td>
                    <td>رقم الملف</td>
                    <td>الرقم القومى</td>
                    <td>الاجراء</td>
                    <td><input type="button" value="نسخ جدول الحوالات" onclick="selectElementContents( document.getElementById('hewalat_table_body') );"></td>
                </tr>
            </thead>
            <tbody id="hewalat_table_body">

            </tbody>
        </table>
        <table id="bitel_table">
            <thead>
                <tr>
                    <td>اسم المكتب</td>
                    <td>الكود المالى</td>
                    <td>رقم الماكينه</td>
                    <td>S.N</td>
                    <td>صلاحية (مدير - موظف - دعم فني )</td>
                    <td>اسم المستخدم</td>
                    <td>رقم الملف</td>
                    <td>الاجراء</td>
                    <td><input type="button" value="نسخ جدول البايتل" onclick="selectElementContents( document.getElementById('bitel_table_body') );"></td>
                </tr>
            </thead>
            <tbody id="bitel_table_body">

            </tbody>
        </table>
        <table id="v200t_table">
            <thead>
                <tr>
                    <td>اسم المكتب</td>
                    <td>الكود المالى</td>
                    <td>رقم الماكينه</td>
                    <td>S.N</td>
                    <td>صلاحية (مدير - موظف - دعم فني )</td>
                    <td>اسم المستخدم</td>
                    <td>رقم الملف</td>
                    <td>الاجراء</td>
                    <td><input type="button" value="نسخ جدول الفيريفون" onclick="selectElementContents( document.getElementById('v200t_table_body') );"></td>
                </tr>
            </thead>
            <tbody id="v200t_table_body">

            </tbody>
        </table>
        </div>
    </div>
<script>
    $("#search").keyup(function () {
        var id = this.value;
        //  alert(id.length );
        if (id != "") {
            $.ajax({
                url: "tg.php",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $('#tg').html(data);
                }
            });
            $.ajax({
                url: "hewalat_users.php",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $('#hewalat_users').html(data);
                }
            });
                $.ajax({
                url: "bitel_users.php",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $('#bitel_users').html(data);
                }
            });
                $.ajax({
                url: "v200t_users.php",
                method: "POST",
                data: { id: id },
                success: function (data) {
                    $('#v200t_users').html(data);
                }
            });
        }
    });
</script>
<script>
        function get_money_code_hewalat(){
        var select_office_name_hewalat = document.getElementById('hewalat_office_name');
        var money_code_hewalat = document.getElementById('hewalat_money_code');
        var option_office_name_hewalat = select_office_name_hewalat.options[select_office_name_hewalat.selectedIndex];
        money_code_hewalat.innerText = option_office_name_hewalat.value;
            }
</script>
<script>
    function get_bitel_terminal(){
        var select_office_name = document.getElementById('bitel_office_name');
        var money_code = document.getElementById('bitel_money_code');
        var option_office_name = select_office_name.options[select_office_name.selectedIndex];
        money_code.innerText = option_office_name.value;
        var office_name = option_office_name.text;
        $.ajax({
            url: "bitel_terminal.php",
            method: "POST",
            data: { office_name: office_name },
            success: function (data) {
                $('#bitel_terminal').html(data);
                get_bitel_sn();
            }
        });

    }
</script>
<script>
    function get_bitel_sn(){
        var select_bitel_terminal = document.getElementById('bitel_terminal');
        var bitel_sn = document.getElementById('bitel_sn');
        var option_bitel_terminal = select_bitel_terminal.options[select_bitel_terminal.selectedIndex];
        if (select_bitel_terminal.value == '') {
            bitel_sn.innerText = ''
        }
        else {
            bitel_sn.innerText = option_bitel_terminal.value;
        }
    }
</script>
<script>
    function get_v200t_terminal(){
        var select_office_name_v200t = document.getElementById('v200t_office_name');
        var money_code_v200t = document.getElementById('v200t_money_code');
        var option_office_name = select_office_name_v200t.options[select_office_name_v200t.selectedIndex];
        money_code_v200t.innerText = option_office_name.value;
        var office_name = option_office_name.text;
        $.ajax({
            url: "v200t_terminal.php",
            method: "POST",
            data: { office_name: office_name },
            success: function (data) {
                $('#v200t_terminal').html(data);
                get_v200t_sn();
            }
        });

    }
</script>
<script>
    function get_v200t_sn(){
    var select_v200t_terminal = document.getElementById('v200t_terminal');
    var v200t_sn = document.getElementById('v200t_sn');
    var option_200t_terminal = select_v200t_terminal.options[select_v200t_terminal.selectedIndex];
    if (select_v200t_terminal.value == '') {
        v200t_sn.innerText = ''
    }
    else {
        v200t_sn.innerText = option_200t_terminal.value;
    }
}
</script>
<script>
$(document).on('click', '#bitel_action_insert', function() {
            var select_bitel_office_name_done = document.getElementById('bitel_office_name');
                var option_bitel_office_name_done = select_bitel_office_name_done.options[select_bitel_office_name_done.selectedIndex];
                var bitel_office_name_done = option_bitel_office_name_done.text;
                var bitel_money_code_done = option_bitel_office_name_done.value;

            var select_bitel_terminal_done = document.getElementById('bitel_terminal');
                var option_bitel_terminal_done = select_bitel_terminal_done.options[select_bitel_terminal_done.selectedIndex];
                var bitel_terminal_done = option_bitel_terminal_done.text;
                var bitel_sn_done = option_bitel_terminal_done.value;

            var select_bitel_auth_done = document.getElementById('bitel_auth');
                var option_bitel_auth_done = select_bitel_auth_done.options[select_bitel_auth_done.selectedIndex];
                var bitel_auth_done = option_bitel_auth_done.text;

            var bitel_user_name_done = document.getElementById('bitel_user_name').innerText;
            var bitel_user_id_done = document.getElementById('bitel_user_id').innerText;

            var select_bitel_action_done = document.getElementById('bitel_action');
                var option_bitel_action_done = select_bitel_action_done.options[select_bitel_action_done.selectedIndex];
                var bitel_action_done = option_bitel_action_done.text;
    $.ajax({
        url: "users_action_insert/bitel_users_action_insert.php",
        type: "POST",
        data: {
            office_name:    bitel_office_name_done,
            money_code:      bitel_money_code_done,
            pos_terminal:   bitel_terminal_done,
            sn:             bitel_sn_done,
            auth:           bitel_auth_done,
            names:      bitel_user_name_done,
            id :            bitel_user_id_done,
            action :        bitel_action_done
        },
        success: function(data) {
                $.ajax({
                    url: "users_action/bitel_users_action.php",
                    method: "POST",
                    data: {},
                    success: function(data) {
                        $('#bitel_table_body').html(data);
                    }
                });
        }
    });


});
</script>
<script>
$(document).on('click', '#v200t_action_insert', function() {

            var select_v200t_office_name_done = document.getElementById('v200t_office_name');
                var option_v200t_office_name_done = select_v200t_office_name_done.options[select_v200t_office_name_done.selectedIndex];
                var v200t_office_name_done = option_v200t_office_name_done.text;
                var v200t_money_code_done = option_v200t_office_name_done.value;

            var select_v200t_terminal_done = document.getElementById('v200t_terminal');
                var option_v200t_terminal_done = select_v200t_terminal_done.options[select_v200t_terminal_done.selectedIndex];
                var v200t_terminal_done = option_v200t_terminal_done.text;
                var v200t_sn_done = option_v200t_terminal_done.value;

            var select_v200t_auth_done = document.getElementById('v200t_auth');
                var option_v200t_auth_done = select_v200t_auth_done.options[select_v200t_auth_done.selectedIndex];
                var v200t_auth_done = option_v200t_auth_done.text;

            var v200t_user_name_done = document.getElementById('v200t_user_name').innerText;
            var v200t_user_id_done = document.getElementById('v200t_user_id').innerText;

            var select_v200t_action_done = document.getElementById('v200t_action');
                var option_v200t_action_done = select_v200t_action_done.options[select_v200t_action_done.selectedIndex];
                var v200t_action_done = option_v200t_action_done.text;
    $.ajax({
        url: "users_action_insert/v200t_users_action_insert.php",
        type: "POST",
        data: {
            office_name:       v200t_office_name_done,
            money_code:        v200t_money_code_done,
            pos_terminal:    v200t_terminal_done,
            sn:          v200t_sn_done,
            auth:        v200t_auth_done,
            names:   v200t_user_name_done,
            id :    v200t_user_id_done,
            action :     v200t_action_done
        },
        success: function(data) {
                $.ajax({
                    url: "users_action/v200t_users_action.php",
                    method: "POST",
                    data: {},
                    success: function(data) {
                        $('#v200t_table_body').html(data);
                    }
                });
        }

    });


});
</script>
<script>
$(document).on('click', '#hewalat_action_insert', function() {
            var select_hewalat_office_name_done = document.getElementById('hewalat_office_name');
                var option_hewalat_office_name_done = select_hewalat_office_name_done.options[select_hewalat_office_name_done.selectedIndex];
                var hewalat_office_name_done = option_hewalat_office_name_done.text;
                var hewalat_money_code_done = option_hewalat_office_name_done.value;

            var select_hewalat_auth_done = document.getElementById('hewalat_auth');
                var option_hewalat_auth_done = select_hewalat_auth_done.options[select_hewalat_auth_done.selectedIndex];
                var hewalat_auth_done = option_hewalat_auth_done.text;

            var hewalat_user_name_done = document.getElementById('hewalat_user_name').innerText;
            var hewalat_user_id_done = document.getElementById('hewalat_user_id').innerText;
            var hewalat_user_code_done = document.getElementById('hewalat_code').innerText;

            var select_hewalat_action_done = document.getElementById('hewalat_action');
                var option_hewalat_action_done = select_hewalat_action_done.options[select_hewalat_action_done.selectedIndex];
                var hewalat_action_done = option_hewalat_action_done.text;
    $.ajax({
        url: "users_action_insert/hewalat_users_action_insert.php",
        type: "POST",
        data: {
            office_name:       hewalat_office_name_done,
            money_code:        hewalat_money_code_done,
            auth:        hewalat_auth_done,
            names:   hewalat_user_name_done,
            id :    hewalat_user_id_done,
            code :    hewalat_user_code_done,
            action :     hewalat_action_done
        },
        success: function(data) {
                $.ajax({
                    url: "users_action/hewalat_users_action.php",
                    method: "POST",
                    data: {},
                    success: function(data) {
                        $('#hewalat_table_body').html(data);
                    }
                });
        }

    });


});
</script>
<script>
    function selectElementContents(el) {
        var body = document.body, range, sel;
        if (document.createRange && window.getSelection) {
            range = document.createRange();
            sel = window.getSelection();
            sel.removeAllRanges();
            try {
                range.selectNodeContents(el);
                sel.addRange(range);
            } catch (e) {
                range.selectNode(el);
                sel.addRange(range);
            }
        } else if (body.createTextRange) {
            range = body.createTextRange();
            range.moveToElementText(el);
            range.select();
        }
        document.execCommand("Copy");
    }
</script>
<script>
$(document).ready(function() {
function load_data() {
$.ajax({
    url: "users_action/bitel_users_action.php",
    method: "POST",
    data: {},
    success: function(data) {
        $('#bitel_table_body').html(data);
    }
});
    $.ajax({
    url: "users_action/v200t_users_action.php",
    method: "POST",
    data: {},
    success: function(data) {
        $('#v200t_table_body').html(data);
    }
});

    $.ajax({
    url: "users_action/hewalat_users_action.php",
    method: "POST",
    data: {},
    success: function(data) {
        $('#hewalat_table_body').html(data);
    }
});
    }
    load_data();
});
</script>
<script>
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
</body>

</html>