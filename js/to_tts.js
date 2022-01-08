function pc_to_tts() {
  var table = document.getElementById("pc_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("pc_name_tts").value = this.cells[1].innerHTML;
      document.getElementById("pc_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("pc_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("pc_num_tts").value = this.cells[9].innerHTML;
    };
  }
}
function monitor_to_tts() {
  var table = document.getElementById("monitor_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("monitor_name_tts").value =
        this.cells[1].innerHTML;
      document.getElementById("monitor_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("monitor_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("monitor_num_tts").value =
        this.cells[9].innerHTML;
    };
  }
}
function printer_to_tts() {
  var table = document.getElementById("printer_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("printer_name_tts").value =
        this.cells[1].innerHTML;
      document.getElementById("printer_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("printer_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("printer_num_tts").value =
        this.cells[9].innerHTML;
    };
  }
}
function pos_to_tts() {
  var table = document.getElementById("pos_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("pos_name_tts").value = this.cells[1].innerHTML;
      document.getElementById("pos_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("pos_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("pos_num_tts").value = this.cells[9].innerHTML;
    };
  }
}
function network_to_tts() {
  var table = document.getElementById("network_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("network_name_tts").value =
        this.cells[1].innerHTML;
      document.getElementById("network_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("network_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("network_num_tts").value =
        this.cells[9].innerHTML;
    };
  }
}
function postal_to_tts() {
  var table = document.getElementById("postal_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("postal_name_tts").value =
        this.cells[1].innerHTML;
      document.getElementById("postal_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("postal_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("postal_num_tts").value = this.cells[9].innerHTML;
    };
  }
}
function other_to_tts() {
  var table = document.getElementById("other_table"),
    rIndex;
  for (var i = 1; i < table.rows.length; i++) {
    table.rows[i].onclick = function () {
      rIndex = this.rowIndex;
      //   console.log(rIndex);
      document.getElementById("other_name_tts").value = this.cells[1].innerHTML;
      document.getElementById("other_sn_tts").value = this.cells[2].innerHTML;

      document.getElementById("other_count_in_tts").value =
        this.cells[8].innerHTML;
      document.getElementById("other_num_tts").value = this.cells[9].innerHTML;
    };
  }
}
