function pc_to_it() {
var table = document.getElementById("pc_table"), rIndex;
for(var i = 1; i < table.rows.length; i++){
table.rows[i].onclick = function()
{
rIndex = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pc_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("pc_sn_in_it").value = this.cells[1].innerHTML;
document.getElementById("pc_office_in_it").value = document.getElementById("post_office_name").innerHTML;
document.getElementById("pc_num_in_it").value = this.cells[6].innerHTML;
};}}

function monitor_to_it() {
var table1 = document.getElementById("monitor_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("monitor_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("monitor_sn_in_it").value = this.cells[1].innerHTML;

document.getElementById("monitor_office_in_it").value = office_name;
    document.getElementById("monitor_num_in_it").value = this.cells[4].innerHTML;
};}}

function printer_to_it() {
var table1 = document.getElementById("printer_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("printer_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("printer_sn_in_it").value = this.cells[1].innerHTML;
document.getElementById("printer_office_in_it").value = office_name;
    document.getElementById("printer_num_in_it").value = this.cells[5].innerHTML;
};}}

function pos_to_it() {
var table1 = document.getElementById("pos_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("pos_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("pos_sn_in_it").value = this.cells[1].innerHTML;
document.getElementById("pos_office_in_it").value = office_name;
    document.getElementById("pos_num_in_it").value = this.cells[5].innerHTML;
};}}


function network_to_it() {
var table1 = document.getElementById("network_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("network_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("network_sn_in_it").value = this.cells[1].innerHTML;
document.getElementById("network_office_in_it").value = office_name;
document.getElementById("network_num_in_it").value = this.cells[5].innerHTML;
};}}


function postal_to_it() {
var table1 = document.getElementById("postal_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("postal_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("postal_sn_in_it").value = this.cells[1].innerHTML;
document.getElementById("postal_office_in_it").value = office_name;
    document.getElementById("postal_num_in_it").value = this.cells[4].innerHTML;
};}}


function other_to_it() {
var table1 = document.getElementById("other_table"),rIndex1,office_name = document.getElementById("post_office_name").innerHTML;
for(var i = 1; i < table1.rows.length; i++){
table1.rows[i].onclick = function()
{
rIndex1 = this.rowIndex;
//   console.log(rIndex);
document.getElementById("other_name_in_it").value = this.cells[0].innerHTML;
document.getElementById("other_sn_in_it").value = this.cells[1].innerHTML;
document.getElementById("other_office_in_it").value = office_name;
    document.getElementById("other_num_in_it").value = this.cells[4].innerHTML;
};}}