function edit_pc_in_tts() {
var table = document.getElementById("pc_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pc_name").value = this.cells[1].innerHTML;
document.getElementById("pc_sn").value = this.cells[2].innerHTML;
document.getElementById("pc_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("pc_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("pc_num").value = this.cells[7].innerHTML;
};}}


function edit_monitor_in_tts() {
var table1 = document.getElementById("monitor_table"),rIndex1;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("monitor_name").value = this.cells[1].innerHTML;
document.getElementById("monitor_sn").value = this.cells[2].innerHTML;
document.getElementById("monitor_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("monitor_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("monitor_num").value = this.cells[7].innerHTML;
};}}

function edit_printer_in_tts() {
var table = document.getElementById("printer_table"),rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("printer_name").value = this.cells[1].innerHTML;
document.getElementById("printer_sn").value = this.cells[2].innerHTML;
document.getElementById("printer_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("printer_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("printer_num").value = this.cells[7].innerHTML;
};}}

function edit_pos_in_tts() {
var table = document.getElementById("pos_table"),rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pos_name").value = this.cells[1].innerHTML;
document.getElementById("pos_sn").value = this.cells[2].innerHTML;
document.getElementById("pos_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("pos_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("pos_num").value = this.cells[7].innerHTML;
};}}
function edit_network_in_tts() {
var table = document.getElementById("network_table"),rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("network_name").value = this.cells[1].innerHTML;
document.getElementById("network_sn").value = this.cells[2].innerHTML;
document.getElementById("network_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("network_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("network_num").value = this.cells[7].innerHTML;
};}}
function edit_postal_in_tts() {
var table = document.getElementById("postal_table"),rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("postal_name").value = this.cells[1].innerHTML;
document.getElementById("postal_sn").value = this.cells[2].innerHTML;
document.getElementById("postal_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("postal_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("postal_num").value = this.cells[7].innerHTML;
};}}
function edit_other_in_tts() {
var table = document.getElementById("other_table"),rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("other_name").value = this.cells[1].innerHTML;
document.getElementById("other_sn").value = this.cells[2].innerHTML;
document.getElementById("other_date_auth_repair").value = this.cells[5].innerHTML;
document.getElementById("other_auth_repair").value = this.cells[6].innerHTML;
document.getElementById("other_num").value = this.cells[7].innerHTML;
};}}
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
