function edit_notice() {
var table = document.getElementById("table_edit_notice");
var m = document.getElementById("notice_type");
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
    document.getElementById("notice_from").value = this.cells[2].innerHTML;
    m.options[m.selectedIndex].text = this.cells[4].innerHTML;
    document.getElementById("notice_description").value = this.cells[5].innerHTML;
    document.getElementById("notice_procedure").value = this.cells[6].innerHTML;
    document.getElementById("notice_id").value = this.cells[8].innerHTML;
};}}
