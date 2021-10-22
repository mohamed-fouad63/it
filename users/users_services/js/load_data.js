$(document).ready(function () {
  function load_data() {
    $.ajax({
      url: "users_action/bitel_users_action.php",
      method: "POST",
      data: {},
      success: function (data) {
        $("#bitel_table_body").html(data);
      },
    });
    $.ajax({
      url: "users_action/v200t_users_action.php",
      method: "POST",
      data: {},
      success: function (data) {
        $("#v200t_table_body").html(data);
      },
    });

    $.ajax({
      url: "users_action/hewalat_users_action.php",
      method: "POST",
      data: {},
      success: function (data) {
        $("#hewalat_table_body").html(data);
      },
    });
  }
  load_data();
});
