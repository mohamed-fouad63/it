$(document).ready(function () {
  $(".search").click(function () {
    if ($(".post_group").val() != "") {
      var key = $(".post_group").val();
      $.ajax({
        url: "details_office_group.php",
        type: "POST",
        data: { key: key },
        success: function (responseText) {
          $(".msg").html(responseText);
        },
      });
    }
  });
});
