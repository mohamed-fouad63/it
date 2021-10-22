$("#id_search").keyup(function () {
  var id = this.value;
  //  alert(id.length );
  if (id != "") {
    $.ajax({
      url: "ajax/tg_user.php",
      method: "POST",
      data: { id: id },
      success: function (data) {
        $("#tg_user").html(data);
      },
    });
    $.ajax({
      url: "ajax/hewalat_user.php",
      method: "POST",
      data: { id: id },
      success: function (data) {
        $("#hewalat_user").html(data);
      },
    });
    $.ajax({
      url: "ajax/bitel_user.php",
      method: "POST",
      data: { id: id },
      success: function (data) {
        $("#bitel_user").html(data);
      },
    });
    $.ajax({
      url: "ajax/v200t_user.php",
      method: "POST",
      data: { id: id },
      success: function (data) {
        $("#v200t_user").html(data);
      },
    });
  }
});
