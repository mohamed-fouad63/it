function edit_pc() {
var table = document.getElementById("pc_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pc_name").value = this.cells[0].innerHTML;
document.getElementById("pc_sn").value = this.cells[1].innerHTML;
document.getElementById("pc_ip").value = this.cells[2].innerHTML;
document.getElementById("pc_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("pc_domian_name").value = this.cells[3].innerHTML;

document.getElementById("pc_num").value = this.cells[6].innerHTML;
};}}


function edit_monitor() {
var table1 = document.getElementById("monitor_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("monitor_name").value = this.cells[0].innerHTML;
document.getElementById("monitor_sn").value = this.cells[1].innerHTML;
 
document.getElementById("monitor_office").value = office_name;
    document.getElementById("monitor_num").value = this.cells[4].innerHTML;
};}}

function edit_printer() {
var table = document.getElementById("printer_table"),rIndex,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("printer_name").value = this.cells[0].innerHTML;
document.getElementById("printer_sn").value = this.cells[1].innerHTML;
document.getElementById("printer_ip").value = this.cells[2].innerHTML;
document.getElementById("printer_office").value = office_name;

document.getElementById("printer_num").value = this.cells[5].innerHTML;
};}}

function edit_pos() {
var table1 = document.getElementById("pos_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pos_name").value = this.cells[0].innerHTML;
document.getElementById("pos_sn").value = this.cells[1].innerHTML;
document.getElementById("pos_ip").value = this.cells[2].innerHTML;
document.getElementById("pos_office").value = office_name;

document.getElementById("pos_num").value = this.cells[5].innerHTML;
};}}
    
function edit_network() {
var table1 = document.getElementById("network_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("network_name").value = this.cells[0].innerHTML;
document.getElementById("network_sn").value = this.cells[1].innerHTML;
document.getElementById("network_ip").value = this.cells[2].innerHTML;
document.getElementById("network_office").value = office_name;
document.getElementById("network_num").value = this.cells[5].innerHTML;
    
};}}
    
function edit_postal() {
var table1 = document.getElementById("postal_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("postal_name").value = this.cells[0].innerHTML;
document.getElementById("postal_sn").value = this.cells[1].innerHTML;
 
document.getElementById("postal_office").value = office_name;
document.getElementById("postal_num").value = this.cells[4].innerHTML;
};}}

function edit_other() {
var table1 = document.getElementById("other_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("other_name").value = this.cells[0].innerHTML;
document.getElementById("other_sn").value = this.cells[1].innerHTML;

document.getElementById("other_office").value = office_name;
      document.getElementById("other_num").value = this.cells[4].innerHTML;
};}}

function add_dvice(){
   var office_name = document.getElementById("post_office_name").innerHTML;
    document.getElementById("office_name_dvice").value = office_name;

}
function switch_serial() {
   
   
    
   switch (document.getElementById("dvice_name").value) {
  case "PC FUJITSU P 420":
    document.getElementById("sn").value = "YLTH";
    break; 
  case "PC FUJITSU P 400":
    document.getElementById("sn").value = "YLCM";
    break;
  case "PC FUJITSU P 3500":
    document.getElementById("sn").value = "YVAQ0";
    break;
  case "PC FUJITSU P 556":
    document.getElementById("sn").value = "YM4X";
    break; 
  default: 
    document.getElementById("sn").value = "";
}

    
}
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
modal.style.display = "none";
}
if (event.target == modal2) {
modal2.style.display = "none";
}
}
