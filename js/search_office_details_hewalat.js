$("#search1").on("input",function(){
$search1 = $("#search1").val();
if ($search1.length > 0){
$.get("res_hewelat.php",{"search1":$search1},function($data1){$("#result1").html($data1);})}})