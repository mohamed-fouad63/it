<?php
$db = $_SESSION['db'];
$conn=mysqli_connect("localhost","root","12345678",$db);
mysqli_query($conn,"SET character_set_client=utf8");
mysqli_query($conn,"SET character_set_results=utf8");
mysqli_query($conn,"SET character_set_connection=utf8");
mysqli_query($conn,"SET character_set_database=utf8");
mysqli_query($conn,"SET character_set_server=utf8");
mysqli_query($conn,"set character_set_server='utf8'");
mysqli_query($conn,"set names= 'utf8'");

/*
if(! $conn){
echo mysqli_connect_error();
exit;
}
mysqli_escape_srting($conn,$_POST['username'])
header("Location:")
*/
?>

