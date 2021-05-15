<?php  
session_start();
include '../connection.php';
	if(isset($_POST['user_id'])){$user_id  = $_POST['user_id'];} else {$user_id = 0 ;}
		if(isset($_POST['users'])){$users  = $_POST['users'];} else {$users = 0 ;}

$query_tbl_user = " SELECT * from tbl_user WHERE id = '$user_id' ";
$result_tbl_user = mysqli_query($conn, $query_tbl_user);
while($row_tbl_user = mysqli_fetch_assoc($result_tbl_user)){
	$user_auth_link = $row_tbl_user["users"];
}

$query_auth_user = "
SELECT users from tbl_user WHERE users = '1' ";
$result_query_auth_user = mysqli_query($conn, $query_auth_user);
$num_auth_user_link = mysqli_num_rows($result_query_auth_user);

if(isset($_POST['delete_auth'])){
if( $num_auth_user_link == 1 && $user_auth_link == '1' && $user_id != '1' ){
	
echo "<h1 style='margin: 0; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);text-align: center;'>انت تقوم بحذف اخر مستخدم له صلاحيه تعديل (صلاحيات المستخدمين) لن يتم تنفيذ طلبك</h1>";
}
else {
	$sql = "delete from tbl_user WHERE id='$user_id'";
if(mysqli_query($conn, $sql))  
{
header("location:user_auth.php");
}
}
}
?>