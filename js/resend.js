function resend_pc() {
var table = document.getElementById("pc_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pc_export_name").value = this.cells[0].innerHTML;
document.getElementById("pc_export_sn").value = this.cells[1].innerHTML;
document.getElementById("pc_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("pc_export_num").value = this.cells[6].innerHTML;
document.getElementById("pc_from_post_office").value = this.cells[5].innerHTML;
};}}
function resend_monitor() {
var table = document.getElementById("monitor_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("monitor_export_name").value = this.cells[0].innerHTML;
document.getElementById("monitor_export_sn").value = this.cells[1].innerHTML;
document.getElementById("monitor_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("monitor_export_num").value = this.cells[4].innerHTML;
document.getElementById("monitor_from_post_office").value = this.cells[3].innerHTML;
};}}
function resend_printer() {
var table = document.getElementById("printer_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("printer_export_name").value = this.cells[0].innerHTML;
document.getElementById("printer_export_sn").value = this.cells[1].innerHTML;
document.getElementById("printer_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("printer_export_num").value = this.cells[5].innerHTML;
document.getElementById("printer_from_post_office").value = this.cells[4].innerHTML;
};}}
function resend_pos() {
var table = document.getElementById("pos_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pos_export_name").value = this.cells[0].innerHTML;
document.getElementById("pos_export_sn").value = this.cells[1].innerHTML;
document.getElementById("pos_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("pos_export_num").value = this.cells[5].innerHTML;
document.getElementById("pos_from_post_office").value = this.cells[4].innerHTML;
};}}
function resend_network() {
var table = document.getElementById("network_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("network_export_name").value = this.cells[0].innerHTML;
document.getElementById("network_export_sn").value = this.cells[1].innerHTML;
document.getElementById("network_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("network_export_num").value = this.cells[5].innerHTML;
document.getElementById("network_from_post_office").value = this.cells[4].innerHTML;
};}}
function resend_postal() {
var table = document.getElementById("postal_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("postal_export_name").value = this.cells[0].innerHTML;
document.getElementById("postal_export_sn").value = this.cells[1].innerHTML;
document.getElementById("postal_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("postal_export_num").value = this.cells[4].innerHTML;
document.getElementById("postal_from_post_office").value = this.cells[3].innerHTML;
};}}
function resend_other() {
var table = document.getElementById("other_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("other_export_name").value = this.cells[0].innerHTML;
document.getElementById("other_export_sn").value = this.cells[1].innerHTML;
document.getElementById("other_post_office").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("other_export_num").value = this.cells[4].innerHTML;
document.getElementById("other_from_post_office").value = this.cells[3].innerHTML;
};}}