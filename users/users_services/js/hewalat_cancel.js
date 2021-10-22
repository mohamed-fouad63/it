function hewalat_cancel() {
  var hewalat_table = document.getElementById("hewalat_table"),
    rIndex;
  for (var i = 0; i < hewalat_table.rows.length; i++) {
    hewalat_table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      var num = this.cells[7].innerHTML;
      $.ajax({
        url: "users_undone/hewalat_users_undone.php",
        method: "POST",
        data: { num: num },
        success: function (data) {
          $.ajax({
            url: "users_action/hewalat_users_action.php",
            method: "POST",
            data: {},
            success: function (data) {
              $("#hewalat_table_body").html(data);
            },
          });
        },
      });
    };
  }
}
