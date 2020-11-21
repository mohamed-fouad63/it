function pc_deleted() {
var table = document.getElementById("pc_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pc_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("pc_deleted_sn").value = this.cells[2].innerHTML;
document.getElementById("pc_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("pc_deleted_num").value = this.cells[9].innerHTML;
};}}
function monitor_deleted() {
var table = document.getElementById("monitor_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("monitor_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("monitor_deleted_sn").value = this.cells[2].innerHTML;

document.getElementById("monitor_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("monitor_deleted_num").value = this.cells[9].innerHTML;
};}}
function printer_deleted() {
var table = document.getElementById("printer_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("printer_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("printer_deleted_sn").value = this.cells[2].innerHTML;

document.getElementById("printer_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("printer_deleted_num").value = this.cells[9].innerHTML;
};}}
function pos_deleted() {
var table = document.getElementById("pos_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pos_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("pos_deleted_sn").value = this.cells[2].innerHTML;

document.getElementById("pos_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("pos_deleted_num").value = this.cells[9].innerHTML;
};}}
function network_deleted() {
var table = document.getElementById("network_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("network_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("network_deleted_sn").value = this.cells[2].innerHTML;

document.getElementById("network_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("network_deleted_num").value = this.cells[9].innerHTML;
};}}
function postal_deleted() {
var table = document.getElementById("postal_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("postal_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("postal_deleted_sn").value = this.cells[2].innerHTML;

document.getElementById("postal_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("postal_deleted_num").value = this.cells[9].innerHTML;
};}}
function other_deleted() {
var table = document.getElementById("other_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("other_deleted_name").value = this.cells[1].innerHTML;
document.getElementById("other_deleted_sn").value = this.cells[2].innerHTML;

document.getElementById("other_deleted_count_in_it").value = this.cells[8].innerHTML;
document.getElementById("other_deleted_num").value = this.cells[9].innerHTML;
};}}