function edit_notice() {
    var table = newFunction();
 
    for (var i = 1; i < table.rows.length; i++) {
        table.rows[i].onclick = function () {
            document.getElementById("notice_from").value = this.cells[2].innerHTML;
            document.getElementById('notice_type').value = "شبكه";
            document.getElementById("notice_description").value = this.cells[5].innerHTML;
            document.getElementById("notice_procedure").value = this.cells[6].innerHTML;
            document.getElementById("notice_id").value = this.cells[8].innerHTML;
        };
    }
   
}
