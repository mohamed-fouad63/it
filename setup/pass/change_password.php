<?php

$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$repeat_password = $_POST['repeat_password'];
$sql88 = "SELECT * FROM tbl_user WHERE first_name = '$session_username'";
$result = $conn->query($sql88);
while($row88 = $result->fetch_assoc()) {
if($row88['password'] != $current_password){  // لو كلمه السر الحاليه لا تتطابق مع كلمه المرور الصحيحه
echo "<script>window.alert('كلمه المرور غير صحيحه');</script>";
}elseif($new_password != $repeat_password) { // فى حاله عدم تطابق كلمتان المرور
echo "<script>window.alert('كلمتان المرور غير متطابقان حاول مر اخرى');</script>";
}else{$sql77 = "UPDATE tbl_user SET password = '$new_password' WHERE first_name ='$session_username'";
if ($conn->query($sql77) === TRUE) {
echo "<script>window.alert('تم تغيير كلمه المرور بنجاح');</script>";}
}   
}
?>