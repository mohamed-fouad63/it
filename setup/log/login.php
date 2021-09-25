<?php
session_start();
if ($_SESSION) {
    header('location:../../../it/index.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>قاعده بيانات المناطق</title>
    <link rel="icon" href="../../img/it.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../../css/login.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <form method="post">
            <div class="imgcontainer">
                <img src="../../img/it.svg" alt="Avatar" class="avatar">
            </div>
            <div class="fields">
                <div class="titleform">
                    <h5>قم بتسجيل الدخول</h5>
                </div>
                    <div class="db custom-select1">
                     <select name="db" id="db">
                        <option value="post">جنوب الشرقيه</option>
                        <option value="kna">قنا</option>
                        <option value="DMYAT">دمياط</option>
                        <option value="W_SH_QAHERA">وسط و شمال القاهره</option>
                        <option value="SH_QAHERA">شرق القاهره</option>
                        <option value="SH_DKHLIA">شمال الدقهليه</option>
                        <option value="G_DKHLIA">جنوب الدقهليه</option>
                        <option value="HELWAN">حلوان</option>
                        <option value="G_OKTOBER">جنوب اكتوبر</option>
                        <option value="SH_OKTOBER">شمال اكتوبر</option>
                        <option value="ASYOUT">اسيوط</option>
                        <option value="KFR_SHEKH">كفر الشيخ</option>
                        <option value="BRG_ARAB">برج العرب</option>
                        <option value="SH_SYNAA">شمال سيناء</option>
                        <option value="ISMAILIA">الاسماعيليه</option>
                        <option value="SH_MONOFIA">شمال المنوفيه</option>
                        <option value="G_MONFIA">جنوب المنوفيه</option>
                        <option value="GEZA">الجيزه</option>
                        <option value="SOHAG">سوهاج</option>
                        <option value="KTAMIA">القطاميه</option>
                        <option value="SH_SHRKIA">شمال الشرقيه</option>
                        <option value="BOR_SAEED">بور سعيد</option>
                        <option value="WADE_GADED">الوادى الجديد</option>
                        <option value="QALYUBIA">القليوبيه</option>
                        <option value="G_SAYNAA">جنوب سيناء</option>
                        <option value="BANI_SWEIF">بنى سويف</option>
                        <option value="FAYOUM">الفيوم</option>
                        <option value="MATROUH">مطروح</option>
                        <option value="MAHALA_KOBA">المحله الكبرى</option>
                        <option value="BEHERA">البحيره</option>
                        <option value="AKSUR">الاقصر</option>
                    </select>
                </div>
                <div class="username">
                    <input type="text" placeholder="ادخل رقم الملف" autocomplete="off" name="username_login" required>
                </div>
                <div class="password">
                    <input type="password" placeholder="ادخل كلمه المرور" name="password" required>
                </div>

                <div class="submit">
                    <input type="submit" class="signin" name="login" value="دخول">
                </div>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
    <?php
    if (isset($_POST['login'])) {
        $password = $_POST['password'];
        $username_login = $_POST['username_login'];
        $db = $_POST['db'];
      $conn=@mysqli_connect("localhost","root","12345678",$db) or die("لا يوجد قاعده بيانات لهذه المنطقه");
           $login_query = mysqli_query($conn, "SELECT *  FROM tbl_user WHERE id = '$username_login' ");

        while ($row = mysqli_fetch_assoc($login_query)) {
            if ($password == $row["password"]) {
                    $_SESSION['db'] = $row["db"];
                    $_SESSION['user_name'] =  $row["first_name"];
                    /*$_SESSION['user_name'] = implode(' ', array_slice(explode(' ', $row["first_name"]), 0, 3)) ;*/
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['job'] = $row['job'];
                    $_SESSION['post'] = $row['post'];
                    $_SESSION['add_dvice'] = $row['add_dvice'];
                    $_SESSION['edit'] = $row['edit'];
                    $_SESSION['move'] = $row['move'];
                    $_SESSION['to_it'] = $row['to_it'];
                    $_SESSION['resent'] = $row['resent'];
                    $_SESSION['in_it'] = $row['in_it'];
                    $_SESSION['edit_in_it'] = $row['edit_in_it'];
                    $_SESSION['move_in_it'] = $row['move_in_it'];
                    $_SESSION['to_tts'] = $row['to_tts'];
                    $_SESSION['resent_in_it'] = $row['resent_in_it'];
                    $_SESSION['delete_in_it'] = $row['delete_in_it'];
                    $_SESSION['in_tts'] = $row['in_tts'];
                    $_SESSION['edit_in_tts'] = $row['edit_in_tts'];
                    $_SESSION['resent_in_tts'] = $row['resent_in_tts'];
                    $_SESSION['replace_dvices'] = $row['replace_dvices'];
                    $_SESSION['retweet'] = $row['retweet'];
                    $_SESSION['replace_sims_in_it'] = $row['replace_sims_in_it'];
                    $_SESSION['all_dvices'] = $row['all_dvices'];
                    $_SESSION['Incoming'] = $row['Incoming'];
                    $_SESSION['move_dvices'] = $row['move_dvices'];
                    $_SESSION['deleted_dvices'] = $row['deleted_dvices'];
                    $_SESSION['all_misin'] = $row['all_misin'];
                    $_SESSION['notice'] = $row['notice'];
                    $_SESSION['link_office_group'] = $row['link_office_group'];
                    $_SESSION['edit_office'] = $row['edit_office'];
                    $_SESSION['add_office'] = $row['add_office'];
                    $_SESSION['office_group'] = $row['office_group'];
                    $_SESSION['my_misin'] = $row['my_misin'];
                    $_SESSION['misins'] = $row['misins'];
                    $_SESSION['edit_misin'] = $row['edit_misin'];
                    $_SESSION['misin_pos'] = $row['misin_pos'];
                    $_SESSION['postal'] = $row['postal'];
                    $_SESSION['hewalat'] = $row['hewalat'];
                    $_SESSION['users'] = $row['users'];
                    $_SESSION['reg_to'] = $row['reg_to'];
                    $_SESSION['to_filter'] = $row['to_filter'];
                    $_SESSION['reg_to_edit'] = $row['reg_to_edit'];
                    $_SESSION['reg_in'] = $row['reg_in'];
                    $_SESSION['in_filter'] = $row['in_filter'];
                    $_SESSION['reg_parcel_to'] = $row['reg_parcel_to'];
                    $_SESSION['parcel_to_filter'] = $row['parcel_to_filter'];
                    $_SESSION['reg_parcel_to_edit'] = $row['reg_parcel_to_edit'];
                    $_SESSION['link_record'] = $row['link_record'];
                    $_SESSION['link_dvice'] = $row['link_dvice'];
                    $_SESSION['link_misin'] = $row['link_misin'];
                    $_SESSION['link_user'] = $row['link_user'];
                    $_SESSION['link_reg'] = $row['link_reg'];
                    $_SESSION['link_network'] = $row['link_network'];
                    $_SESSION['sims'] = $row['sims'];
                    $_SESSION['replace_sims'] = $row['replace_sims'];
                    $_SESSION['link_count_wrong'] = $row['link_count_wrong'];
                    $_SESSION['counts'] = $row['counts'];
                    $_SESSION['wrong'] = $row['wrong'];
                    header("location:../../index.php");
                         }
        }
    }
    ?>

</body>
       <script>
            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') { c = c.trim() };
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            var selectbox = document.getElementById("db");
            window.onload = function () { selectbox.selectedIndex = readCookie("db"); }
            selectbox.onchange = function (){
                  var d = new Date();
                    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
                    var expires = "expires="+d.toUTCString();
                document.cookie= 'db = ' + this.selectedIndex + ';' + expires +'; path=/;'; 
           }
        </script>
        
</html>