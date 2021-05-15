function selectprg(){
var chan = document.getElementById("prg").value;
if (chan === "اختر اسم البرنامج ..."){
document.getElementById("officeharka").style.display = "none";
document.getElementById("harka").style.display = "none";document.getElementById("chb").style.display = "nne";}
if (chan === "الشباك البريدى"){
document.getElementById("officeharka").style.display = "none";
document.getElementById("harka").style.display = "none";document.getElementById("chb").style.display = "inline";}
else if (chan === "الحركة والتوزيع"){document.getElementById("officeharka").style.display = "none";
document.getElementById("chb").style.display = "none";document.getElementById("harka").style.display = "inline";}
else if (chan === "تقفيل الارساليات بالمكتب"){
document.getElementById("chb").style.display = "none";
document.getElementById("harka").style.display = "none";
document.getElementById("officeharka").style.display = "inline";}
}selectprg();
