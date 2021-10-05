$(document).ready(function () {
  $(".search").click(function () {
    if ($(".typeahead").val() != "") {
      var key = $(".typeahead").val();
      $.ajax({
        url: "routers_details.php",
        type: "POST",
        data: { key: key },
        beforeSend: function () {
          // setting a timeout
          $("#wait").html("الرجاء الانتظار");
        },
        success: function (responseText) {
          $(".msg").html(responseText);
        },
      });
    }
  });
});
