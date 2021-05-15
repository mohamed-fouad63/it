//JavaScript Calendar v2
//Author: Robert W. Husted (robert.husted@iname.com)
// Date:  Nov'99
//Author2:Eric Freed (helpdesk@freedfamily.org)
// Date:  Feb'02

topBackground   ="#C0E2EB";
bottomBackground="#f2f2f2";
tableBGColor    ="orange";
cellColor       ="f2f2f2";
headingCellColor="#dae8d7";
headingTextColor="0b5b00";
dateColor       ="0b5b00";
focusColor      ="#ff0000";
hoverColor      ="darkred";
fontStyle       ="8pt arial, helvetica";
headingFontStyle="8pt arial, helvetica";
bottomBorder    =true;
windowSize      ="width=210,height=200";
cal_opentwice	=true; //This is a workaround for IE to make the window come to top when it was already open

//End of customizable section


var delim, val, DayFormat, DayStr, todayStr  ; //used to for next 2 functions to communicate
var calCtrl, initDate, calDateFormat, windowTitle;
var cal  = "loaded";
var isNav= (navigator.appName == "Netscape");
var isIE = !isNav;
var weekdays = "<TR BGCOLOR='"+headingCellColor+"'>";
var longSpace="";
var calendarBegin;
var blankCell;
var calendarEnd;

var calLoaded = 'false';

 

function beginCalendar(months){

calLoaded = true;
todayStr = "Today";


for (i in weekdayArray) {
 weekdays += "<TD class='heading' align=center>"+weekdayArray[i]+"</TD>";
}
if (bottomBorder) weekdays += "<TD rowspan=7 bgcolor=orange></TD>";
weekdays += "</TR>";

blankCell= "<TD align=center class='heading' bgcolor='"+cellColor+"'>&nbsp;</TD>";


for (i=0; i<50; i++) { longSpace+="&nbsp;" }

calendarBegin =
"<HTML><HEAD>" +
"<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>"+
"<STYLE type='text/css'>" +
"<!--" +
"TD.heading { text-decoration: none; color:" + headingTextColor + "; font: " + headingFontStyle + "; }" +
"A.focusDay { color: " + focusColor + "; text-decoration: none; font: " + fontStyle + "; }" +
"A.weekDay  { color: " + dateColor  + "; text-decoration: none; font: " + fontStyle + "; }" +
"A.weekDay:hover { color: " + hoverColor + "; text-decoration: none; font: " + fontStyle + "; }" +
"-->" +
"</STYLE>" +
"</HEAD>" +
"<BODY BGCOLOR='" + bottomBackground + "'" +
"<CENTER>";
if (isNav) {
calendarBegin += 
"<TABLE CELLPADDING=0 CELLSPACING=1 BORDER=0 ALIGN=CENTER BGCOLOR='" +tableBGColor+ "'><TR><TD>";
}
calendarBegin +=
"<TABLE CELLPADDING=0 CELLSPACING=1 BORDER=0 ALIGN=CENTER BGCOLOR='" +tableBGColor+ "'>" +
weekdays +
"<TR>";

calendarEnd = "";
if (bottomBorder) {
  calendarEnd += "<TR><TD colspan=8></TD></TR>";
}
if (isNav) {
  calendarEnd += "</TD></TR></TABLE>";
}
calendarEnd +=
"</TABLE></CENTER></BODY></HTML>";
}






function markerFound(marker) {
var l=marker.length;
if (DayFormat.indexOf(marker)==0 && DayStr != null) {
 delim = DayStr.indexOf(DayFormat.substring(l,l+1));
 if (delim==0) delim=DayStr.length;
 val =DayStr.substring(0,delim);
 DayStr=DayStr.substring(delim,DayStr.length);
 DayFormat=DayFormat.substring(l,DayFormat.length);
 if (marker.indexOf("mon")==1 || !isNaN(val)) return true;
}
return false;
}

function readComplexDate(DayStr) {
DayFormat = calDateFormat.toLowerCase();
DayStr=DayStr.toLowerCase();
for (i=0; DayFormat.length!=0; DayFormat=DayFormat.substring(1,DayFormat.length)) {
 if (markerFound("dd")) calDate.setDate(val);
 if (markerFound("mm")) calDate.setMonth(val-1);
 if (markerFound("yyyy")) calDate.setFullYear(val);
 if (markerFound("yy")) {
  var n="19"+val;
  if (n<1930) n="20"+val;
  calDate.setFullYear(n);
 }
 if (markerFound("month")) {
  for (i in monthArray) {
   if (monthArray[i].toLowerCase()==val) calDate.setMonth(i);
  }
 }
 if (markerFound("mon")) {
  for (i in monthArray) {
   if (monthArray[i].toLowerCase().substring(0,3)==val) calDate.setMonth(i);
  }
 }
 DayStr=DayStr.substring(1,DayStr.length);
}
}

function showCalendar(dateField,Format,Title,months) {
//alert("-----"+todayDate);
if(calLoaded=="false"){
var dateStrings = months.split(".");

weekdayList = (dateStrings[0]).split(",");
weekdayArray = (dateStrings[1]).split(",");
monthArray = (dateStrings[2]).split(",");

beginCalendar(months);
calLoaded = true;
}
dateFieldStr = dateField;
dateField = document.getElementById(dateField);

if(dateField == null)
{

	inputFields = document.getElementsByTagName("input");
	var i =0;
	for(i=0;i<inputFields.length;i++)
	{
	
		id = inputFields[i].id;
		
		if(id.indexOf(dateFieldStr)!=-1)
		{
			dateField = inputFields[i];
			break;
		}
		
	}
}
if (parseInt(navigator.appVersion)<4) return false;
calDateFormat = Format;
windowTitle = Title;

//set initial date
calDateField = dateField;

calDate = getServerDate();
if (isNaN(calDate)) {
 calDate = new Date();
 readComplexDate(dateField.value);
}
initDate = new Date(calDate);
calDate.setDate(1);

if (isNav) rows= "'62,*'";
else rows= "'50,*'";
calDocFrameset = 
"<HTML><HEAD><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><TITLE>"+ windowTitle + longSpace +"</TITLE></HEAD>\n" +
"<FRAMESET ROWS="+ rows +" BORDER='0'>\n" +
"  <FRAME NAME='topCalFrame'    SRC='javascript:parent.opener.calDocTop' SCROLLING='no'>\n" +
"  <FRAME NAME='bottomCalFrame' SRC='javascript:parent.opener.calDocBottom' SCROLLING='no'>\n" +
"</FRAMESET>\n";

calDocBottom = buildBottomCalFrame();

calDocTop =
"<HTML>" +
"<HEAD><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><link rel='stylesheet' type='text/css' href='../../theme/enpoTheme.css'><link rel='stylesheet' type='text/css' href='../../theme/LooknFeelEgyptPost_ar1.css'></HEAD>" +
"<BODY onLoad='calControl.today.focus();calControl.today.blur();' BGCOLOR='" +topBackground+ "'>" +
"<CENTER>" + 
"<FORM NAME='calControl' onSubmit='document.calControl.year.blur();return false;'>" +
getMonthSelect() +
"<INPUT NAME='year' VALUE='" +calDate.getFullYear()+ "' TYPE=TEXT SIZE=4 MAXLENGTH=4 onChange='parent.opener.setYear()'>" +
"<BR><NOBR><INPUT " +
"TYPE=BUTTON NAME='previousYear' class='smallPrev2Btn'  VALUE='<<' onClick='parent.opener.setPreviousYear()'>&nbsp;<INPUT " +
"TYPE=BUTTON NAME='previousMonth' class='smallPrevBtn' VALUE='<' onClick='parent.opener.setPreviousMonth()'>&nbsp;<INPUT " +
"TYPE=BUTTON NAME='today' class='btnBG' VALUE="+todayStr+" onClick='parent.opener.setToday()'>&nbsp;<INPUT " +
"TYPE=BUTTON NAME='nextMonth' class='smallNextBtn' VALUE='>' onClick='parent.opener.setNextMonth()'>&nbsp;<INPUT " +
"TYPE=BUTTON NAME='nextYear' class='smallNext2Btn' VALUE='>>' onClick='parent.opener.setNextYear()'>" + 
"</NOBR>" +
"</FORM></CENTER>" +
"<SCRIPT language=JavaScript>" +
"parent.opener.calCtrl=document.calControl;" +
"</SCRIPT></BODY></HTML>";

var xx= (event.clientX)-50;
var yy= (event.clientY)-50;
var  params= 'dependent=yes,width=1,height=1,left='+xx+',top='+yy+',titlebar=yes';
var  params2= 'dependent=yes,'+windowSize+',left='+xx+',top='+yy+',titlebar=yes';



if (isIE&&cal_opentwice) {
  
	
 calWin = window.open('about:blank','calWin',params);
 calWin.close();
}
calWin = window.open('javascript:opener.calDocFrameset','calWin',params2);

if (isNav) calWin.focus();
}


function buildBottomCalFrame() {       
var calDoc = calendarBegin;
month=calDate.getMonth();
year =calDate.getFullYear();
day  =initDate.getDate();
var columnCount=0;
var days = getDaysInMonth();
if (day > days) day = days;
var firstOfMonth = new Date (year, month, 1);
var startingPos  = firstOfMonth.getDay();
days += startingPos;
for (i=0; i < startingPos; i++) {
 calDoc += blankCell;
 columnCount++;
}
var currentDay=0;
for (i=startingPos; i < days; i++) {
 currentDay = i-startingPos+1;

 if (currentDay==day && month==initDate.getMonth() && year==initDate.getFullYear())
  dayType = "focusDay";
 else
  dayType = "weekDay";

 calDoc +="<TD align=center bgcolor='" +cellColor+ "'>" +
          "<a class='" +dayType+ "' href='javascript:parent.opener.returnDate(" + 
          currentDay + ")'>&nbsp;" + currentDay + "&nbsp;</a></TD>";

 columnCount++;
 if (columnCount % 7 == 0) calDoc += "</TR><TR>";
}
for (i=days; i<42; i++)  {
 calDoc += blankCell;
 columnCount++;
 if (columnCount % 7 == 0) {
  calDoc += "</TR>";
  if (i<41) calDoc += "<TR>";
 }
}
calDoc += calendarEnd;
return calDoc;
}

function writeCalendar() {
calDocBottom = buildBottomCalFrame();
calWin.frames['bottomCalFrame'].document.open();
calWin.frames['bottomCalFrame'].document.write(calDocBottom);
calWin.frames['bottomCalFrame'].document.close();
}

function setToday() {
calDate = getServerDate();
returnDate(calDate.getDate());
}

function setYear() {
var year = calCtrl.year.value;
if (isFourDigitYear(year)) {
calDate.setFullYear(year);
writeCalendar();
}
}

function setCurrentMonth() {
var month = calCtrl.month.selectedIndex;
calDate.setMonth(month);
writeCalendar();
}

function setPreviousYear() {
calCtrl.year.value--;
setYear();
}

function setNextYear() {
calCtrl.year.value++;
setYear();
}

function setPreviousMonth() {
var year = calCtrl.year.value;
if (isFourDigitYear(year)) {
 var month = calCtrl.month.selectedIndex;
 if (month == 0) {
  month = 11;
  if (year > 1000) {
   year--;
   calDate.setFullYear(year);
   calCtrl.year.value = year;
  }
 } else {
  month--;
 }
 calDate.setMonth(month);
 calCtrl.month.selectedIndex = month;
 writeCalendar();
}
}

function setNextMonth() {
var year = calCtrl.year.value;
if (isFourDigitYear(year)) {
 var month = calCtrl.month.selectedIndex;
 if (month == 11) {
  month = 0;
  year++;
  calDate.setFullYear(year);
  calCtrl.year.value = year;
 } else {
  month++;
 }
 calDate.setMonth(month);
 calCtrl.month.selectedIndex = month;
 writeCalendar();
}
}

function getDaysInMonth()  {
var days=28;
var month=calDate.getMonth()+1;
var year =calDate.getFullYear();
if (month==1||month==3||month==5||month==7||month==8||month==10||month==12) {
 days=31;
} else if (month==4 || month==6 || month==9 || month==11) {
 days=30;
} else if (month==2 && ( (year%4)==0 && (year%100)!=0 || (year%400)==0 )) {
 days=29;
}
return (days);
}

function isFourDigitYear(year) {
if (year.length != 4 || isNaN(year)) {
calCtrl.year.value = calDate.getFullYear();
calCtrl.year.select();
calCtrl.year.focus();
return false;
}
return true;
}

function getMonthSelect() {
var activeMonth = calDate.getMonth();
monthSelect = "<SELECT NAME='month' onChange='parent.opener.setCurrentMonth()'>";
for (i in monthArray) {
if (i == activeMonth) {
    monthSelect += "<OPTION SELECTED>" + monthArray[i] + "\n";
}
else {
    monthSelect += "<OPTION>" + monthArray[i] + "\n";
}
}
monthSelect += "</SELECT>";
return monthSelect;
}

function jsReplace(inString, find, replace) {
var outString = "";
if (!inString) return "";
if (inString.indexOf(find) != -1) {
t = inString.split(find);
return (t.join(replace));
}
else {
return inString;
}
}

function doNothing() {
}

function makeTwoDigit(inValue) {
var numVal = parseInt(inValue, 10);
if (numVal < 10) {
  return("0" + numVal);
}
else {
  return numVal;
}
}

function returnDate(inDay) {
calDate.setDate(inDay);
var today = getServerDate();

var day        =calDate.getDate();
var month      =calDate.getMonth()+1;
var year       =calDate.getFullYear();
var yearString =""+year;
var monthString=monthArray[calDate.getMonth()];
var monthAbbr  =monthString.substring(0,3);
var weekday    =weekdayList[calDate.getDay()];
var weekdayAbbr=weekday.substring(0,3);

outDate=calDateFormat;
outDate=jsReplace(outDate,"DD", makeTwoDigit(day));
outDate=jsReplace(outDate,"dd", day);
outDate=jsReplace(outDate,"MM", makeTwoDigit(month));
outDate=jsReplace(outDate,"mm", month);
outDate=jsReplace(outDate,"yyyy", year);
outDate=jsReplace(outDate,"YY", year);
outDate=jsReplace(outDate,"yy", yearString.substring(2,4));
outDate=jsReplace(outDate,"Month", monthString);
outDate=jsReplace(outDate,"month", monthString.toLowerCase());
outDate=jsReplace(outDate,"MONTH", monthString.toUpperCase());
outDate=jsReplace(outDate,"Mon", monthAbbr);
outDate=jsReplace(outDate,"mon", monthAbbr.toLowerCase());
outDate=jsReplace(outDate,"MON", monthAbbr.toUpperCase());
outDate=jsReplace(outDate,"Weekday", weekday);
outDate=jsReplace(outDate,"weekday", weekday.toLowerCase());
outDate=jsReplace(outDate,"WEEKDAY", weekday.toUpperCase());
outDate=jsReplace(outDate,"Wkdy", weekdayAbbr);
outDate=jsReplace(outDate,"wkdy", weekdayAbbr.toLowerCase());
outDate=jsReplace(outDate,"WKDY", weekdayAbbr.toUpperCase());
outDate=jsReplace(outDate,"th", dayTh(day));
outDate=jsReplace(outDate,"TH", dayTh(day).toUpperCase());

calDateField.value =outDate;
try{
calDateField.onchange();
}
catch(e){

}
///////////////////////////////////////////////
var selectedDate = new Date(outDate);
//alert(today);
//if(selectedDate>today){
//alert("\u0644\u0627 \u064A\u0645\u0643\u0646 \u0627\u062E\u062A\u064A\u0627\u0631 \u062A\u0627\u0631\u064A\u062E \u0628\u0639\u062F \u062A\u0627\u0631\u064A\u062E \u0627\u0644\u064A\u0648\u0645");
//this.showCalendar(document.search.DateField2,'mm/dd/yyyy','Test');
//document.search.test.value = 'Test';
//calWin = window.open('javascript:opener.calDocFrameset','calWin','dependent=yes,'+windowSize+',screenX=300,screenY=300,titlebar=yes');
//calWin.focus();
//}else{
calWin.close();
//}
//////////////////////////////////////////////
//calDateField.focus();

}

function dayTh(d) {
if (d==1||d==21||d==31)
	return "st"
if (d==2||d==22)
	return "nd"
if (d==3||d==23)
	return "rd"
return "th"
}

function checkMonth1(){
								var e=document.search.fmonth.selectedIndex;
								var t = document.search.fday.length;
								if(e==1){
									document.search.fday.remove(30);
									document.search.fday.remove(29);
									document.search.fday.remove(28);
								}else if(e!=1 & t < 31){
									document.search.fday.options[28]=new Option("29", "29", false, false);
									document.search.fday.options[29]=new Option("30", "30", false, false);
									document.search.fday.options[30]=new Option("31", "31", false, false);
								}
							}
							
							function checkMonth2(){
								var e=document.search.tmonth.selectedIndex;
								var t = document.search.tday.length;
								if(e==1){
									document.search.tday.remove(30);
									document.search.tday.remove(29);
									document.search.tday.remove(28);
								}else if(e!=1 & t < 31){
									document.search.tday.options[28]=new Option("29", "29", false, false);
									document.search.tday.options[29]=new Option("30", "30", false, false);
									document.search.tday.options[30]=new Option("31", "31", false, false);
								}
							}
							
							function load(){
								var fday = document.search.fday;
								for (i=0; i<31; i++){
									fday.options[i]=new Option(i+1,i+1,false,false);
								}
								
								var fmonth = document.search.fmonth;
								for (y=0; y<12; y++){
									fmonth.options[y]=new Option(y+1,y+1,false,false);
								}
									
								var today = getServerDate();
								var fyear = document.search.fyear;
								for (z=2005; z<=today.getFullYear(); z++){
									fyear.options[z-2005]=new Option(z,z,false,false);
								}
								fyear.selectedIndex=0;
									
								var tday = document.search.tday;
								for (i=0; i<31; i++){
									tday.options[i]=new Option(i+1,i+1,false,false);
								}
								tday.selectedIndex = today.getDate()-1;
															
								var tmonth = document.search.tmonth;
								for (y=0; y<12; y++){
									tmonth.options[y]=new Option(y+1,y+1,false,false);
								}
								tmonth.selectedIndex=today.getMonth();
								
								var tyear = document.search.tyear;
								for (z=2005; z<=today.getFullYear(); z++){
									tyear.options[z-2005]=new Option(z,z,false,false);
								}
								tyear.selectedIndex=tyear.length-1;
								
								var field = document.search.DateField2;
								field.value = today.getDate()+" / "+(today.getMonth()+1)+" / "+today.getFullYear();
							}
							function checkSelectedDate1(){
							alert("Error");
								var selectedDay = document.search.DateField2.value;
								calDate = new Date(selectedDay);
								var today = getServerDate();
								if(calDate>today){
									alert("Error");
								}else{
									alert("correct");
								}
							}
							
							
							
	function validatePastDate(field)
	{
		
		
		var theField = document.getElementById(field);
		
		if(theField ==null)
			theField = getCompleteID2(field);
		
		var value=theField.value;
		
		if (value == ''){
			return true;
		}
		
		var fieldDate = Date.parse(value);
		
		var myDate=getServerDate();
		myDate.setTime(fieldDate);
		
		var today = getServerDate();
		
		
		var beforeToday;
		
		var day = value.split("/")[0];
		var month = value.split("/")[1];
		var year = value.split("/")[2];
		

		if (today.getFullYear()<year)
			beforeToday = false;
		else if (today.getFullYear()==year)
		{
			if(today.getMonth()<(month-1))
				beforeToday = false;
				
			else if(today.getMonth()==(month-1))
			{
				if(today.getDate()<(day))
					beforeToday = false;
				else
					beforeToday = true;
			}
			
			else
				beforeToday = true;
		
		}
		else
			beforeToday = true;
			
		return beforeToday;
	
	
	}	
	
	function validateFutureDate(field)
	{
		var theField = document.getElementById(field);
		
		if(theField ==null)
			theField = getCompleteID2(field);
		
		var value=theField.value;
		
		var fieldDate = Date.parse(value);
		
		var myDate=new Date();
		myDate.setTime(fieldDate);
		
		var today = getServerDate();
		
		var afterToday;
		
		var day = value.split("/")[0];
		var month = value.split("/")[1];
		var year = value.split("/")[2];
		

		if (today.getFullYear()>year)
			afterToday = false;
		else if (today.getFullYear()==year)
		{
			if(today.getMonth()>(month-1))
				afterToday = false;
				
			else if(today.getMonth()==(month-1))
			{
				if(today.getDate()>(day))
					afterToday = false;
				else
					afterToday = true;
			}
			
			else
				afterToday = true;
		
		}
		else
			afterToday = true;
			
		return afterToday;
	
	}	
	
	
	function getCompleteID2(outputFieldID)
	{
	var inputs = document.getElementsByTagName("input");
	var outputField = "";
	
	for (i = 0; i < inputs.length; i++)
		{
		outputField = inputs[i].id;
		
		if((outputField.indexOf(outputFieldID))!=-1)
			{
			outputField = inputs[i].id;
			break;
			}
		
	
		}
		return outputField;
	}	
	
	
	function validateStatusVSBirth(field){
		
		var birthDateField = document.getElementById(getCompleteID2("clientBirthDateText"));
		
		var underAge = isUnderAge(birthDateField.value);
		
		
		var theField = document.getElementById(field);
		
		if(theField ==null)
			theField = getCompleteID2(field);
			
		var status = theField.value;
		
		//kaser or fakjed elahleya	1 , 6 , 2 , 3
		if(status == 2 || status==7 || status ==8){
		
			if(underAge == false)
				return false;
			else
				return true;
				
		}
		// Kaser momyaz
		else if (status == 6)
		{			
			underAge = isUnderAgeForSaving(birthDateField.value);
			
			if(underAge == true)
				return false;
			else 
				return true;
		}	
		else
		{
			if(underAge == true)
				return false;
			else return true;
		}
	
	}	
	
	
	function validateAdult(){
		
		var birthDateField = document.getElementById(getCompleteID2("clientBirthDateText"));
		
		var underAge = isUnderAge(birthDateField.value);
		
		if(underAge == true)
			return false;
		else
			return true;
	}	
	
	function isUnderAge(birthdate)
	{
		var minutes = 1000 * 60;
		var hours = minutes * 60;
		var days = hours * 24;
		var years = days * 365;
	
		var birthDayString = birthdate;
		var birthDay = birthDayString;
		
		var day = birthDay.split("/")[0];
		var month = birthDay.split("/")[1];
		var year = birthDay.split("/")[2];
		
		
		var currentTime = getServerDate();
		
		var birthYear = year;
		var currentYear = currentTime.getFullYear();
		var age  = currentYear - birthYear;
		
		
		if(age<18)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	// added by kmagdy for saving work Item 4, sprint 1.3
	function isUnderAgeForSaving(birthdate)
	{
		var minutes = 1000 * 60;
		var hours = minutes * 60;
		var days = hours * 24;
		var years = days * 365;
	
		var birthDayString = birthdate;
		var birthDay = birthDayString;
		
		var day = birthDay.split("/")[0];
		var month = birthDay.split("/")[1];
		var year = birthDay.split("/")[2];
		
		
		var currentTime = getServerDate();
		
		var birthYear = year;
		var currentYear = currentTime.getFullYear();
		var age  = currentYear - birthYear;
		
		
		if(age<16 || age>21)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
	function getExtraDaysInMonths(){
		
		
		var daysArray = new Array(1,1,3,1,4,3,4,4,1,2,1,2); 
		return daysArray;
	}
	
	function validatePaymentDueDate(field)
	{
		
		var theField = document.getElementById(field);
		
		if(theField ==null)
			theField = getCompleteID2(field);
		
		var value=theField.value;
		
		
		if(value!=null && value !=''){
			var myDate=new Date(value);
	
	
			var day = value.split("/")[0];
			var month = value.split("/")[1];
			var year = value.split("/")[2];
			
			
			myDate.setMonth(parseInt(month)-1);
			myDate.setYear(year);
			myDate.setDate(day);
			
			var today = getServerDate();
			
			
			var one_day=1000*60*60*24;
			var difference =   (myDate.getTime() - today.getTime())/one_day;
			var extraDaysArr = getExtraDaysInMonths();
			
			
			if(difference >0){
				if( difference <= (180+ extraDaysArr[parseInt(today.getMonth())]))
					return true;
				else
					return false;
				}
			else
				return false;
		}
		else
			return true;
	}
	
	
