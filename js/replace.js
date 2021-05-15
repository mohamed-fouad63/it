function pc_replace() {
    var table = document.getElementById("pc_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            //   console.log(rIndex);
            document.getElementById("pc_replace_name").value = this.cells[1].innerHTML;
            document.getElementById("pc_replace_sn").value = this.cells[2].innerHTML;
            document.getElementById("pc_replace_office_name").value = this.cells[0].innerHTML;
            document.getElementById("pc_replace_count_in_it").value = this.cells[8].innerHTML;
            document.getElementById("pc_replace_num").value = this.cells[9].innerHTML;
        };
    }
}

function sim_replace() {
    var table = document.getElementById("network_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            //   console.log(rIndex);
            document.getElementById("router_name").value = this.cells[1].innerHTML;
            document.getElementById("router_sn").value = this.cells[2].innerHTML;
            document.getElementById("office_name").value = this.cells[0].innerHTML;
            // document.getElementById("sim_replace_count_in_it").value = this.cells[8].innerHTML;
            // document.getElementById("sim_replace_num").value = this.cells[9].innerHTML;
        };
    }
}
