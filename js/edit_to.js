function edit_reg() {
var table = document.getElementById("table_edit_to"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
    document.getElementById("num").value = this.cells[0].innerHTML;
    document.getElementById("czc").value = this.cells[1].innerHTML;
    document.getElementById("typeahead").value = this.cells[2].innerHTML;
    document.getElementById("subject").value = this.cells[3].innerHTML;
};}}


