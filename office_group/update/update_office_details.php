<?php                            
session_start();
include '../../connection.php'; 
$office_name = $_POST['office_name'];
$office_type = $_POST['office_type'];
$post_group = $_POST['post_group'];
$money_code = $_POST['money_code'];
$post_code = $_POST['post_code'];
$postal_code = $_POST['postal_code'];
$g_postal = $_POST['g_postal'];
$domain_name = $_POST['domain_name'];
$stamps = $_POST['stamps'];
$id_hg = $_POST['id_hg'];
$id_it = $_POST['id_it'];
$sat = $_POST['sat'];
$address = $_POST['address'];
$G3 = $_POST['3G'];
$LL = $_POST['LL'];
$tel = $_POST['tel'];
$id = $_POST['id'];

$update_office_details = "UPDATE all1 SET 
office_name = '$office_name',
office_type = '$office_type',
post_group = '$post_group',
money_code = '$money_code',
post_code = '$post_code',
postal_code = '$postal_code',
g_postal = '$g_postal',
domain_name = '$domain_name',
stamps = '$stamps',
id_hg = '$id_hg',
id_it = '$id_it',
sat = '$sat',
address = '$address',
3G = '$G3',
LL = '$LL',
tel = '$tel'



WHERE id ='$id' ";
if ($conn->query($update_office_details) === TRUE) {echo '<script>alert("تم التحديث اضغط رجوع");</script>';}
    else { echo '<script>alert("لم يتم التحديث");</script>';} 
?>
