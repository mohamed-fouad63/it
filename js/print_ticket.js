function pc_ticket() {
  var table = document.getElementById("pc_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);

      document.getElementById("pc_name_ticket").value = this.cells[1].innerHTML;
      document.getElementById("pc_sn_ticket").value = this.cells[2].innerHTML;
      document.getElementById("pc_damage_ticket").value =
        this.cells[3].innerHTML;
    };
  }
}
function monitor_ticket() {
  var table = document.getElementById("monitor_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);

      document.getElementById("pc_name_ticket").value = this.cells[1].innerHTML;
      document.getElementById("pc_sn_ticket").value = this.cells[2].innerHTML;
      document.getElementById("pc_damage_ticket").value =
        this.cells[3].innerHTML;
    };
  }
}
function printer_ticket() {
  var table = document.getElementById("printer_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);

      document.getElementById("pc_name_ticket").value = this.cells[1].innerHTML;
      document.getElementById("pc_sn_ticket").value = this.cells[2].innerHTML;
      document.getElementById("pc_damage_ticket").value =
        this.cells[3].innerHTML;
    };
  }
}
function postal_ticket() {
  var table = document.getElementById("postal_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);

      document.getElementById("pc_name_ticket").value = this.cells[1].innerHTML;
      document.getElementById("pc_sn_ticket").value = this.cells[2].innerHTML;
      document.getElementById("pc_damage_ticket").value =
        this.cells[3].innerHTML;
    };
  }
}
