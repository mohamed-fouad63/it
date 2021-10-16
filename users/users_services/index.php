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
        .tablinks {
            display: flex;
        }

        .tablink {
            background-color: #FFFFFF;
            display: flex;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 50%;
        }
        .tablink_default {
    background-color: #dddddd;
        }

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    pointer-events: auto;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
}
.tabcontent {
    display: none;
    height: 100%;
}
        .tab_defult {
    display: block;
}
.hide {
    opacity: 0;
}
.hewalat_table tr:hover .td_btn,
.bitel_table tr:hover .td_btn,
.v200t_table tr:hover .td_btn
{
    opacity: 1;
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
            <div id="bitel_users">
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
                <tbody>
                </tbody>
            </table>
            </div>
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
        <div class="tablinks">
        <button class="tablink tablink_default" onclick="openPage('hewalat_tab', this, '#dddddd')" >مستخدمين</button>
        <button class="tablink" onclick="openPage('bitel_tab', this, '#dddddd')" >مستخدمين البايتل</button>
        <button class="tablink" onclick="openPage('v200t_tab', this, '#dddddd')" >مستخدمين الفيرفون</button>
        </div>
        <div id="hewalat_tab" class="modal-content tabcontent tab_defult">
        <table id="hewalat_table" class="hewalat_table">
            <thead>
                <tr>
                    <td>الكود المالى</td>
                    <td>اسم الموظف</td>
                    <td>الصلاحيه</td>
                    <td>رقم الملف</td>
                    <td>الرقم القومى</td>
                    <td>الاجراء</td>
                    <td><input type="button"  class="td_hide" value="نسخ جدول الحوالات"  onclick="selectElementContents( document.getElementById('hewalat_table_body') );"></td>
                </tr>
            </thead>
            <tbody id="hewalat_table_body">

            </tbody>
        </table>
        </div>
        <div id="bitel_tab" class="modal-content tabcontent">
        <table id="bitel_table" class="bitel_table">
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
        </div>
        <div id="v200t_tab" class="modal-content tabcontent">
        <table id="v200t_table" class="v200t_table">
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
    function get_bitel_terminal(m){

        var select_office_name_bitel = document.getElementById('bitel_office_name'+m);
        var money_code_bitel = document.getElementById('bitel_money_code'+m);
        var option_office_name = select_office_name_bitel.options[select_office_name_bitel.selectedIndex];
        money_code_bitel.innerText = option_office_name.value;
        var office_name = option_office_name.text;
        $.ajax({
            url: "bitel_terminal.php",
            method: "POST",
            data: { office_name: office_name },
            success: function (data) {
                $('#bitel_terminal'+m).html(data);
                var bitel_terminal = 'bitel_terminal'+m;
                get_bitel_sn(bitel_terminal,m);
            }
        });

    }
</script>
<script>
    function get_bitel_sn(o,m){
        var select_bitel_terminal = document.getElementById(o);
        var bitel_sn = document.getElementById('bitel_sn'+m);
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
function insert_action(i) {

            var select_bitel_office_name_done = document.getElementById('bitel_office_name'+i);
                var option_bitel_office_name_done = select_bitel_office_name_done.options[select_bitel_office_name_done.selectedIndex];
                var bitel_office_name_done = option_bitel_office_name_done.text;
                var bitel_money_code_done = option_bitel_office_name_done.value;

             var select_bitel_terminal_done = document.getElementById('bitel_terminal'+i);
                var option_bitel_terminal_done = select_bitel_terminal_done.options[select_bitel_terminal_done.selectedIndex];
                var bitel_terminal_done = option_bitel_terminal_done.text;
                var bitel_sn_done = option_bitel_terminal_done.value;

            var select_bitel_auth_done = document.getElementById('bitel_auth'+i);
                var option_bitel_auth_done = select_bitel_auth_done.options[select_bitel_auth_done.selectedIndex];
                var bitel_auth_done = option_bitel_auth_done.text;

            var bitel_user_name_done = document.getElementById('bitel_user_name'+i).innerText;
            var bitel_user_id_done = document.getElementById('bitel_user_id'+i).innerText;

            var select_bitel_action_done = document.getElementById('bitel_action'+i);
                var option_bitel_action_done = select_bitel_action_done.options[select_bitel_action_done.selectedIndex];
                var bitel_action_done = option_bitel_action_done.text;

                 alert(bitel_user_name_done);
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


}
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
            var hewalat_user_code_done = document.getElementById('hewalat_user_code').innerText;

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
function hewalat_done() {
   
    var hewalat_table = document.getElementById("hewalat_table"),
        rIndex;
    for (var i = 0; i < hewalat_table.rows.length; i++) {
        hewalat_table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var money_code = this.cells[0].innerHTML,
            names = this.cells[1].innerHTML,
            auth = this.cells[2].innerHTML,
            id = this.cells[3].innerHTML,
            code = this.cells[4].innerHTML,
            action = this.cells[5].innerHTML,
            office_name = this.cells[6].innerHTML,
            num = this.cells[7].innerHTML
                    $.ajax({
                    url: "users_done/hewalat_users_done.php",
                    method: "POST",
                    data: {
                        money_code:money_code,
                        names:names,
                        auth:auth,
                        id:id,
                        code:code,
                        action:action,
                        office_name:office_name,
                        num:num
                    },
                    success: function(data) {
                        alert(data);
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
        };
    }
}

</script>
<script>
function hewalat_cancel() {
    var hewalat_table = document.getElementById("hewalat_table"),
        rIndex;
    for (var i = 0; i < hewalat_table.rows.length; i++) {
        hewalat_table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var num = this.cells[7].innerHTML;
                    $.ajax({
                    url: "users_undone/hewalat_users_undone.php",
                    method: "POST",
                    data: {num:num},
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
        };
    }
}

</script>
<script>
function bitel_done() {
    var bitel_table = document.getElementById("bitel_table"),
        rIndex;
    for (var i = 0; i < bitel_table.rows.length; i++) {
        bitel_table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var office_name = this.cells[0].innerHTML,
            money_code = this.cells[1].innerHTML,
            pos_terminal = this.cells[2].innerHTML,
            sn = this.cells[3].innerHTML,
            auth = this.cells[4].innerHTML,
            names = this.cells[5].innerHTML,
            id = this.cells[6].innerHTML,
            action = this.cells[7].innerHTML,
            num = this.cells[8].innerHTML;
                    $.ajax({
                    url: "users_done/bitel_users_done.php",
                    method: "POST",
                    data: {
                        money_code:money_code,
                        names:names,
                        auth:auth,
                        id:id,
                        action:action,
                        office_name:office_name,
                        pos_terminal :pos_terminal,
                        sn:sn,
                        num:num
                    },
                    success: function(data) {
                        alert(data);
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
        };
    }
}

</script>
<script>
function bitel_cancel() {
    var bitel_table = document.getElementById("bitel_table"),
        rIndex;
    for (var i = 0; i < bitel_table.rows.length; i++) {
        bitel_table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var num = this.cells[8].innerHTML;
                    $.ajax({
                    url: "users_undone/bitel_users_undone.php",
                    method: "POST",
                    data: {num:num},
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
        };
    }
}

</script>
<script>
function v200t_done() {
    var v200t_table = document.getElementById("v200t_table"),
        rIndex;
    for (var i = 0; i < v200t_table.rows.length; i++) {
        v200t_table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var office_name = this.cells[0].innerHTML,
            money_code = this.cells[1].innerHTML,
            pos_terminal = this.cells[2].innerHTML,
            sn = this.cells[3].innerHTML,
            auth = this.cells[4].innerHTML,
            names = this.cells[5].innerHTML,
            id = this.cells[6].innerHTML,
            action = this.cells[7].innerHTML,
            num = this.cells[8].innerHTML;
                    $.ajax({
                    url: "users_done/v200t_users_done.php",
                    method: "POST",
                    data: {
                        money_code:money_code,
                        names:names,
                        auth:auth,
                        id:id,
                        action:action,
                        office_name:office_name,
                        pos_terminal :pos_terminal,
                        sn:sn,
                        num:num
                    },
                    success: function(data) {
                        alert(data);
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
        };
    }
}

</script>
<script>
function v200t_cancel() {
    var v200t_table = document.getElementById("v200t_table"),
        rIndex;
    for (var i = 0; i < v200t_table.rows.length; i++) {
        v200t_table.rows[i].onclick = function() {
            rIndex = this.rowIndex;
            var num = this.cells[8].innerHTML;
                    $.ajax({
                    url: "users_undone/v200t_users_undone.php",
                    method: "POST",
                    data: {num:num},
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
        };
    }
}

</script>
<script>
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "#FFFFFF";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it

</script>
<script>
    function hide_office_name1(){
          hewalat_office_name = document.getElementsByClassName("hewalat_office_name");
  for (i = 0; i < hewalat_office_name.length; i++) {
    hewalat_office_name[i].style.color = "red";
  }
    }
</script>
</body>

</html>