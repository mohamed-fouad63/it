function del_reg() {
var table = document.getElementById("table_edit_to"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
    document.getElementById("del_num").value = this.cells[0].innerHTML;
    document.getElementById("del_barcode").value = this.cells[1].innerHTML;
    document.getElementById("del_send_to").value = this.cells[2].innerHTML;
    document.getElementById("del_subject").value = this.cells[3].innerHTML;
};}}
