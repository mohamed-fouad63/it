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
    <title>مستخدمبن الخدمات</title>
    <script src="../../js/jquery-3.1.1.min.js"></script>
    <style>
        *{
          font-weight: bolder; 
        }
        .user_auth ,.office_users{
    margin-top: 10px;
}
        .search_div {
            text-align: center;
        }

        fieldset:not(:first-of-type) {
            margin-top: 10px
        }


legend {
    padding: 10px 10px;
    border: 1px solid;
    min-width: 105px;
    text-align-last: center;
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
        .tablinks,  .tablinks1 {
            display: flex;
        }


        .tablink, .tablink1 {
            background-color: #FFFFFF;
            display: flex;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 17px;
            width: 50%;
        }

        .tablink_default,.tablink_default1 {
    background-color: #dddddd;
        }


.tabcontent,.tabcontent1 {
    display: none;
    height: 100%;
}

        .tab_defult,.tab_defult1 {
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
.select_none{
    user-select:none;
}
    </style>
</head>

<body>
    <div>
    <div class="tablinks">
        <button class="tablink1 tablink_default1" onclick="openPage1('user_auth', this, '#dddddd')" >تعديل صلاحيات مستخدم</button>
        <button class="tablink1" onclick="openPage1('office_users', this, '#dddddd')" >مستخدمين مكتب</button>
    </div>
    </div>
    <div class="user_auth tabcontent1 tab_defult1" id="user_auth">
        <?php
        include 'user_auth/main.php';
        ?>
    </div>
    <div class="office_users  tabcontent1" id="office_users">
        <?php
include 'office_users/main.php';
        ?>
    </div>
<script src="js/id_search.js"></script>
<script src="js/office_users_search.js"></script>
<script src="js/get_money_code_hewalat.js"></script>
<script src="js/get_bitel_terminal.js"></script>
<script src="js/get_bitel_sn.js"></script>
<script src="js/get_v200t_terminal.js"></script>
<script src="js/get_v200t_sn.js"></script>
<script src="js/insert_action_bitel.js"></script>
<script src="js/insert_action_v200t.js"></script>
<script src="js/hewalat_action_insert.js"></script>
<script src="js/copy.js"></script>
<script src="js/load_data.js"></script>
<script src="js/hewalat_done.js"></script>
<script src="js/hewalat_cancel.js"></script>
<script src="js/bitel_done.js"></script>
<script src="js/bitel_cancel.js"></script>
<script src="js/v200t_done.js"></script>
<script src="js/v200t_cancel.js"></script>
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
function openPage1(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink1");
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