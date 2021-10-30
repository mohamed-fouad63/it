<div  class="search_div">
    <input type="search" id="id_search" placeholder="ادخل رقم الملف">
</div>
        <?php
        include 'tg.php';
        include 'hewalat.php';
        include 'bitel.php';
        include 'v200t.php';
        ?>
<div>
    <div class="tablinks">
        <button class="tablink tablink_default" onclick="openPage('hewalat_tab', this, '#dddddd')">مستخدمين
            الحوالات</button>
        <button class="tablink" onclick="openPage('bitel_tab', this, '#dddddd')">مستخدمين البايتل</button>
        <button class="tablink" onclick="openPage('v200t_tab', this, '#dddddd')">مستخدمين الفيرفون</button>
    </div>
        <?php
        include 'tables_action/hewalat_action.php';
        include 'tables_action/bitel_action.php';
        include 'tables_action/v200t_action.php';
        ?>
</div>