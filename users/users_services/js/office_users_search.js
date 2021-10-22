$("#office_users_search").keyup(function () {
  var office_users_search = this.value;

  if (office_users_search != "") {
    $.ajax({
      url: "ajax/tg_users.php",
      method: "POST",
      data: { office_users_search: office_users_search },
      success: function (data) {
        $("#tg_users").html(data);
      },
    });

    $.ajax({
      url: "ajax/hewalat_users.php",
      method: "POST",
      data: { office_users_search: office_users_search },
      success: function (data) {
        $("#hewalat_users").html(data);
      },
    });

    $.ajax({
      url: "ajax/bitel_users.php",
      method: "POST",
      data: { office_users_search: office_users_search },
      success: function (data) {
        $("#bitel_users").html(data);
      },
    });

    $.ajax({
      url: "ajax/v200t_users.php",
      method: "POST",
      data: { office_users_search: office_users_search },
      success: function (data) {
        $("#v200t_users").html(data);
      },
    });
  }
});
