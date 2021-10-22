function v200t_cancel() {
  var v200t_table = document.getElementById("v200t_table"),
    rIndex;
  for (var i = 0; i < v200t_table.rows.length; i++) {
    v200t_table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      var num = this.cells[8].innerHTML;
      $.ajax({
        url: "users_undone/v200t_users_undone.php",
        method: "POST",
        data: { num: num },
        success: function (data) {
          $.ajax({
            url: "users_action/v200t_users_action.php",
            method: "POST",
            data: {},
            success: function (data) {
              $("#v200t_table_body").html(data);
            },
          });
        },
      });
    };
  }
}
