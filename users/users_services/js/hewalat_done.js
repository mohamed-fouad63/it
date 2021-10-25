function hewalat_done() {
  var hewalat_table = document.getElementById("hewalat_table"),
    rIndex;
  for (var i = 0; i < hewalat_table.rows.length; i++) {
    hewalat_table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      var money_code = this.cells[0].innerHTML,
        names = this.cells[1].innerHTML,
        auth = this.cells[2].innerHTML,
        id = this.cells[3].innerHTML,
        code = this.cells[4].innerHTML,
        action = this.cells[5].innerHTML,
        office_name = this.cells[6].innerHTML,
        num = this.cells[7].innerHTML;
      $.ajax({
        url: "users_done/hewalat_users_done.php",
        method: "POST",
        data: {
          money_code: money_code,
          names: names,
          auth: auth,
          id: id,
          code: code,
          action: action,
          office_name: office_name,
          num: num,
        },
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
