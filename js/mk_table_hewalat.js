var rIndex, table = document.getElementById("table");
// check the empty input
function checkEmptyInput() {  // step 1 >>>  var input
'use strict';
var isEmpty = false,
fname = document.getElementById("fname").value,
age = document.getElementById("age").value,
idd = document.getElementById("idd").value,
select_action = document.getElementById("select_action").value,
prg = document.getElementById("prg").value,
office = document.getElementById("office").value,
PostalCode = document.getElementById("PostalCode").value;

// step 2 >>> empty input error
 if(fname === "") { alert(" لا يوجد اسم الموظف ") ; isEmpty = true; }
 else if (age === ""){ alert(" لا يوجد رقم الملف ") ; isEmpty = true; }
 else if (idd === ""){ alert(" لا يوجد الرقم القومى ") ; isEmpty = true; } else if (select_action === "اختر المطلوب تنفيذه لهذا المستخدم") {  alert(" اختر المطلوب تنفيذه لهذا المستخدم "); document.getElementById("select_action").style.background = "red"; isEmpty = true; }



else if (PostalCode === ""){ alert(" يجب تحديد كود مالى "); isEmpty = true; }
else if (office === ""){ alert(" يجب تحديد اسم المكتب "); isEmpty = true; }
else if (prg === "اختر الصلاحيه"){ alert(" يجب تحديد الصلاحيه "); isEmpty = true; }
else if (prg === ""){ alert(" يجب تحديد الصلاحيه "); isEmpty = true; }

return isEmpty; }
// add Row
function addHtmlTableRow(){ 
// get the table by id create a new row and cells get value from input textset the values into row cell's
if(!checkEmptyInput()){ 
var newRow = table.insertRow(table.length),
cell1 = newRow.insertCell(0), // cell for fname
cell2 = newRow.insertCell(1), // cell for age
cell3 = newRow.insertCell(2),  // cell for id
cell4 = newRow.insertCell(3),  // cell for prg
cell5 = newRow.insertCell(4),  // cell for jop
cell6 = newRow.insertCell(5), // cell for office
cell7 = newRow.insertCell(6), // cell for postalcode
fname = document.getElementById("fname").value,
age = document.getElementById("age").value,
idd = document.getElementById("idd").value,
select_action = document.getElementById("select_action").value,
prg = document.getElementById("prg").value,
office = document.getElementById("office").value,
PostalCode = document.getElementById("PostalCode").value;
cell1.style.border = '1px solid';cell1.style.fontSize='15px';cell1.style.fontWeight='bold';
cell2.style.border = '1px solid';cell2.style.fontSize='15px';cell2.style.fontWeight='bold';
cell3.style.border = '1px solid';cell3.style.fontSize='15px';cell3.style.fontWeight='bold';
cell4.style.border = '1px solid';cell4.style.fontSize='15px';cell4.style.fontWeight='bold';
cell5.style.border = '1px solid';cell5.style.fontSize='15px';cell5.style.fontWeight='bold';
cell6.style.border = '1px solid';cell6.style.fontSize='15px';cell6.style.fontWeight='bold';
cell7.style.border = '1px solid';cell7.style.fontSize='15px';cell7.style.fontWeight='bold';
cell1.innerHTML =  fname ;
cell2.innerHTML = age;
cell3.innerHTML = idd + "*";
cell4.innerHTML = prg;
cell5.innerHTML = office;
cell6.innerHTML = PostalCode;
cell7.innerHTML = select_action;
document.getElementById("search").value = "";
document.getElementById("search1").value = "";
document.getElementById("fname").value = "";
document.getElementById("age").value = "";
document.getElementById("idd").value = "";
document.getElementById("select_action").value = "اختر المطلوب تنفيذه لهذا المستخدم";
document.getElementById("office").value = "";
document.getElementById("PostalCode").value = "";
document.getElementById("prg").value = "اختر الصلاحيه";
// call the function to set the event to the new row
selectedRowToInput();
} // end if condition
} // end function
// display selected row data into input text
function selectedRowToInput()
{ 
for(var i = 2; i < table.rows.length; i++) { 
table.rows[i].onclick = function(){ 
// get the selected row index
rIndex = this.rowIndex;

document.getElementById("fname").value = this.cells[0].innerHTML;
document.getElementById("age").value = this.cells[1].innerHTML;
document.getElementById("idd").value = this.cells[2].innerHTML;
document.getElementById("prg").value = "اختر الصلاحيه";
document.getElementById("office").value = this.cells[4].innerHTML;
document.getElementById("PostalCode").value = this.cells[5].innerHTML;
document.getElementById("select_action").value = "اختر المطلوب تنفيذه لهذا المستخدم";
document.getElementById('insert').style.display = "none";
document.getElementById('edit').style.display = "inline";
document.getElementById('remove').style.display = "inline";
document.getElementById("search").disabled = true;
document.getElementById("search1").disabled = true;
}; }


}
selectedRowToInput();
function editHtmlTbleSelectedRow(){ 
var fname = document.getElementById("fname").value,
age = document.getElementById("age").value,
idd = document.getElementById("idd").value,
select_action = document.getElementById("select_action").value,
prg = document.getElementById("prg").value,
office = document.getElementById("office").value,
PostalCode = document.getElementById("PostalCode").value;

document.getElementById('insert').style.display = "inline";
document.getElementById('edit').style.display = "none";
document.getElementById('remove').style.display = "none";
document.getElementById('search').style.display = "inline";
document.getElementById('search1').style.display = "inline";
if(!checkEmptyInput()){ 
table.rows[rIndex].cells[0].innerHTML = fname;
table.rows[rIndex].cells[1].innerHTML = age;
table.rows[rIndex].cells[2].innerHTML = idd;
table.rows[rIndex].cells[3].innerHTML = prg;
//table.rows[rIndex].cells[4].innerHTML = str;
table.rows[rIndex].cells[4].innerHTML = office;
table.rows[rIndex].cells[5].innerHTML = PostalCode;
table.rows[rIndex].cells[6].innerHTML = select_action; }
document.getElementById("fname").value = "";
document.getElementById("age").value = "";
document.getElementById("idd").value = "";
document.getElementById("prg").value = "";
document.getElementById("PostalCode").value = "";
document.getElementById("office").value = "";
document.getElementById("search").disabled = false;
document.getElementById("search1").disabled = false;    

}
function removeSelectedRow(){ 
if (rIndex>0){ table.deleteRow(rIndex); }
// clear input text
document.getElementById("fname").value = "";
document.getElementById("age").value = "";
document.getElementById("idd").value = "";
document.getElementById("prg").value = "";
document.getElementById("PostalCode").value = "";
document.getElementById("office").value = "";
document.getElementById('insert').style.display = "inline";
document.getElementById('edit').style.display = "none";
document.getElementById('remove').style.display = "none";
document.getElementById('search').disabled = false;
document.getElementById('search1').disabled = false;
}
