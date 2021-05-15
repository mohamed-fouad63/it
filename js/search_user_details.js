'use strict';
$("#search").on("input", function () {
    var $search = $("#search").val();
    if ($search.length > 0) {
        $.get("res_postal.php", {"search": $search}, function ($data) {$("#result").html($data); });
    }
}
               );