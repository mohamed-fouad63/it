function export_pc_in_it() {
  var table = document.getElementById("pc_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("pc_export_name").value = this.cells[1].innerHTML;
      document.getElementById("pc_export_sn").value = this.cells[2].innerHTML;

      document.getElementById("pc_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("pc_export_num").value = this.cells[9].innerHTML;
    };
  }
}
function export_monitor_in_it() {
  var table = document.getElementById("monitor_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("monitor_export_name").value =
        this.cells[1].innerHTML;
      document.getElementById("monitor_export_sn").value =
        this.cells[2].innerHTML;

      document.getElementById("monitor_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("monitor_export_num").value =
        this.cells[9].innerHTML;
    };
  }
}
function export_printer_in_it() {
  var table = document.getElementById("printer_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("printer_export_name").value =
        this.cells[1].innerHTML;
      document.getElementById("printer_export_sn").value =
        this.cells[2].innerHTML;

      document.getElementById("printer_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("printer_export_num").value =
        this.cells[9].innerHTML;
    };
  }
}
function export_pos_in_it() {
  var table = document.getElementById("pos_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("pos_export_name").value =
        this.cells[1].innerHTML;
      document.getElementById("pos_export_sn").value = this.cells[2].innerHTML;

      document.getElementById("pos_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("pos_export_num").value = this.cells[9].innerHTML;
    };
  }
}
function export_network_in_it() {
  var table = document.getElementById("network_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("network_export_name").value =
        this.cells[1].innerHTML;
      document.getElementById("network_export_sn").value =
        this.cells[2].innerHTML;

      document.getElementById("network_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("network_export_num").value =
        this.cells[9].innerHTML;
    };
  }
}
function export_postal_in_it() {
  var table = document.getElementById("postal_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("postal_export_name").value =
        this.cells[1].innerHTML;
      document.getElementById("postal_export_sn").value =
        this.cells[2].innerHTML;

      document.getElementById("postal_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("postal_export_num").value =
        this.cells[9].innerHTML;
    };
  }
}
function export_other_in_it() {
  var table = document.getElementById("other_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("other_export_name").value =
        this.cells[1].innerHTML;
      document.getElementById("other_export_sn").value =
        this.cells[2].innerHTML;

      document.getElementById("other_export_count_in_it").value =
        this.cells[8].innerHTML;
      document.getElementById("other_export_num").value =
        this.cells[9].innerHTML;
    };
  }
}
