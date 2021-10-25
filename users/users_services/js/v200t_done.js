function v200t_done() {
  var v200t_table = document.getElementById("v200t_table"),
    rIndex;
  for (var i = 0; i < v200t_table.rows.length; i++) {
    v200t_table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      var office_name = this.cells[0].innerHTML,
        money_code = this.cells[1].innerHTML,
        pos_terminal = this.cells[2].innerHTML,
        sn = this.cells[3].innerHTML,
        auth = this.cells[4].innerHTML,
        names = this.cells[5].innerHTML,
        id = this.cells[6].innerHTML,
        action = this.cells[7].innerHTML,
        num = this.cells[8].innerHTML;
      $.ajax({
        url: "users_done/v200t_users_done.php",
        method: "POST",
        data: {
          money_code: money_code,
          names: names,
          auth: auth,
          id: id,
          action: action,
          office_name: office_name,
          pos_terminal: pos_terminal,
          sn: sn,
          num: num,
        },
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
