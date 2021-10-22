function bitel_cancel() {
  var bitel_table = document.getElementById("bitel_table"),
    rIndex;
  for (var i = 0; i < bitel_table.rows.length; i++) {
    bitel_table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      var num = this.cells[8].innerHTML;
      $.ajax({
        url: "users_undone/bitel_users_undone.php",
        method: "POST",
        data: { num: num },
        success: function (data) {
          $.ajax({
            url: "users_action/bitel_users_action.php",
            method: "POST",
            data: {},
            success: function (data) {
              $("#bitel_table_body").html(data);
            },
          });
        },
      });
    };
  }
}
