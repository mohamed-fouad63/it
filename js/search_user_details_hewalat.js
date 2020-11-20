
$("#search").on("input",function(){
$search = $("#search").val();
if ($search.length > 0){
$.get("res_hewelat.php",{"search":$search},function($data){$("#result").html($data);})}})