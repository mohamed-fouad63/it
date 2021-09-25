<?php
$session_id = $_SESSION['id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$repeat_password = $_POST['repeat_password'];

$sql88 = 'SELECT id,password FROM tbl_user WHERE id = :id';
$row881 = $pdo->prepare($sql88);
$row881->execute([$session_id]);

while($row88 = $row881->fetch()) {
if($row88['password'] != $current_password){  // لو كلمه السر الحاليه لا تتطابق مع كلمه المرور الصحيحه
echo "<script>window.alert('كلمه المرور غير صحيحه');</script>";
}elseif($new_password != $repeat_password) { // فى حاله عدم تطابق كلمتان المرور
echo "<script>window.alert('كلمتان المرور غير متطابقان حاول مر اخرى');</script>";
}else{$sql77 = "UPDATE tbl_user SET password = '$new_password' WHERE id ='$session_id'";
if ($conn->query($sql77) === TRUE) {
echo "<script>window.alert('تم تغيير كلمه المرور بنجاح');</script>";}
}  
}
?>