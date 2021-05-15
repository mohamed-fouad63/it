function move_pc() {
var table = document.getElementById("pc_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pc_move_name").value = this.cells[0].innerHTML;
document.getElementById("pc_move_sn").value = this.cells[1].innerHTML;
document.getElementById("pc_move_from").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("pc_move_num").value = this.cells[6].innerHTML;
document.getElementById("pcid").value = this.cells[8].innerHTML;
};}}

function move_monitor() {
var table1 = document.getElementById("monitor_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("monitor_move_name").value = this.cells[0].innerHTML;
document.getElementById("monitor_move_sn").value = this.cells[1].innerHTML;

document.getElementById("monitor_move_from").value = office_name;
    document.getElementById("monitor_move_num").value = this.cells[4].innerHTML;
};}}

function move_printer() {
var table1 = document.getElementById("printer_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("printer_move_name").value = this.cells[0].innerHTML;
document.getElementById("printer_move_sn").value = this.cells[1].innerHTML;
document.getElementById("printer_move_from").value = office_name;
    document.getElementById("printer_move_num").value = this.cells[5].innerHTML;
};}}

function move_pos() {
var table1 = document.getElementById("pos_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pos_move_name").value = this.cells[0].innerHTML;
document.getElementById("pos_move_sn").value = this.cells[1].innerHTML;
document.getElementById("pos_move_from").value = office_name;
    document.getElementById("pos_move_num").value = this.cells[5].innerHTML;
};}}


function move_network() {
var table1 = document.getElementById("network_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("network_move_name").value = this.cells[0].innerHTML;
document.getElementById("network_move_sn").value = this.cells[1].innerHTML;
document.getElementById("network_move_from").value = office_name;
    document.getElementById("network_move_num").value = this.cells[5].innerHTML;
};}}


function move_postal() {
var table1 = document.getElementById("postal_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("postal_move_name").value = this.cells[0].innerHTML;
document.getElementById("postal_move_sn").value = this.cells[1].innerHTML;
document.getElementById("postal_move_from").value = office_name;
    document.getElementById("postal_move_num").value = this.cells[4].innerHTML;
};}}


function move_other() {
var table1 = document.getElementById("other_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("other_move_name").value = this.cells[0].innerHTML;
document.getElementById("other_move_sn").value = this.cells[1].innerHTML;
document.getElementById("other_move_from").value = office_name;
    document.getElementById("other_move_num").value = this.cells[4].innerHTML;
};}}