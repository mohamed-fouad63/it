function misin_deleted() {
    var table = document.getElementById("misin_table"), rIndex;
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            rIndex = this.rowIndex;
            //   console.log(rIndex);
            document.getElementById("it_name").value = this.cells[0].innerHTML;
            document.getElementById("office").innerHTML = this.cells[3].innerHTML;
            document.getElementById("num").value = this.cells[8].innerHTML;

        };
    }
}