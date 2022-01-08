$(document).ready(function () {
  $(".search").click(function () {
    if ($(".typeahead").val() != "") {
      var key = $(".typeahead").val();
      $.ajax({
        url: "details_office.php",
        type: "POST",
        data: { key: key },
        success: function (responseText) {
          $(".msg").html(responseText);
        },
      });
    }
  });
});
