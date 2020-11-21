<?php
session_start();
include '../connection.php';



$link_count_wrong  = $_POST['link_count_wrong'];
	$counts  = $_POST['counts'];
	$wrong  = $_POST['wrong'];
$link_network  = $_POST['link_network'];
	$sims  = $_POST['sims'];
	$replace_sims  = $_POST['replace_sims'];
$link_office_group  = $_POST['link_office_group'];
	$edit_office  = $_POST['edit_office'];
	$add_office  = $_POST['add_office'];
	$office_group  = $_POST['office_group'];
$link_record  = $_POST['link_record'];
	$Incoming  = $_POST['Incoming'];
	$move_dvices  = $_POST['move_dvices'];
	$deleted_dvices  = $_POST['deleted_dvices'];
	$all_misin  = $_POST['all_misin'];
    $notice  = $_POST['notice'];
$link_dvice  = $_POST['link_dvice'];
	$all_dvices  = $_POST['all_dvices'];
	$post  = $_POST['post'];
		$edit  = $_POST['edit'];
		$resent  = $_POST['resent'];
		$move  = $_POST['move'];
		$to_it  = $_POST['to_it'];
		$add_dvice  = $_POST['add_dvice'];
	$in_it  = $_POST['in_it'];
		$edit_in_it  = $_POST['edit_in_it'];
		$resent_in_it  = $_POST['resent_in_it'];
		$move_in_it  = $_POST['move_in_it'];
		$to_tts  = $_POST['to_tts'];
		$delete_in_it  = $_POST['delete_in_it'];
        $replace_sims_in_it = $_POST['replace_sims_in_it'];
        $retweet  = $_POST['retweet'];
	$in_tts  = $_POST['in_tts'];
		$edit_in_tts  = $_POST['edit_in_tts'];
		$resent_in_tts  = $_POST['resent_in_tts'];
    $replace_dvices  = $_POST['replace_dvices'];
$link_misin  = $_POST['link_misin'];
	$my_misin  = $_POST['my_misin'];
	$misins  = $_POST['misins'];
	$edit_misin  = $_POST['edit_misin'];
	$misin_pos  = $_POST['misin_pos'];
$link_user  = $_POST['link_user'];
	$postal  = $_POST['postal'];
	$hewalat  = $_POST['hewalat'];
	$users  = $_POST['users'];
$link_reg  = $_POST['link_reg'];
	$reg_to  = $_POST['reg_to'];
	$to_filter  = $_POST['to_filter'];
	$reg_to_edit  = $_POST['reg_to_edit'];
	$reg_in  = $_POST['reg_in'];
	$in_filter  = $_POST['in_filter'];
	$user_id  = $_POST['user_id'];
	$reg_parcel_to  = $_POST['reg_parcel_to'];
	$parcel_to_filter  = $_POST['parcel_to_filter'];
	$reg_parcel_to_edit  = $_POST['reg_parcel_to_edit'];

$query_auth_user = "
SELECT users from tbl_user WHERE users = '1' ";
$result_query_auth_user = mysqli_query($conn, $query_auth_user);
$num_auth_user_link = mysqli_num_rows($result_query_auth_user);

$query_tbl_user = " SELECT * from tbl_user WHERE id = '$user_id' ";
$result_tbl_user = mysqli_query($conn, $query_tbl_user);
while($row_tbl_user = mysqli_fetch_assoc($result_tbl_user)){
	$user_auth_link = $row_tbl_user["users"];
}



	if(isset($_POST['updat_auth'])){
		
	if( $num_auth_user_link == 1 && $user_auth_link == '1' && $users != '1' ){
		echo "انت تحذف اخر مستخدم له صلاحيه تعديل صلاحيات المستخدمين لن يتم تنفيذ طلبك";
	}
		else {
			
				$update_auth = " UPDATE tbl_user SET
link_count_wrong = '$link_count_wrong',
counts = '$counts',
wrong = '$wrong',
link_network = '$link_network',
sims = '$sims',
replace_sims = '$replace_sims',
link_office_group = '$link_office_group',
edit_office = '$edit_office',
add_office = '$add_office',
office_group = '$office_group',
link_record = '$link_record',
Incoming = '$Incoming',
move_dvices = '$move_dvices',
deleted_dvices = '$deleted_dvices',
retweet = '$retweet',
all_misin = '$all_misin',
notice = '$notice',
link_dvice = '$link_dvice',
all_dvices = '$all_dvices',
post = '$post',
edit = '$edit',
resent = '$resent',
move = '$move',
to_it = '$to_it',
add_dvice = '$add_dvice',
in_it = '$in_it',
edit_in_it = '$edit_in_it',
resent_in_it = '$resent_in_it',
move_in_it = '$move_in_it',
to_tts = '$to_tts',
delete_in_it = '$delete_in_it',
replace_sims_in_it = '$replace_sims_in_it',
in_tts = '$in_tts',
edit_in_tts = '$edit_in_tts',
resent_in_tts = '$resent_in_tts',
replace_dvices = '$replace_dvices',
link_misin = '$link_misin',
my_misin = '$my_misin',
misins = '$misins',
edit_misin = '$edit_misin',
misin_pos = '$misin_pos',
link_user = '$link_user',
postal = '$postal',
hewalat = '$hewalat',
users = '$users',
link_reg = '$link_reg',
reg_to = '$reg_to',
to_filter = '$to_filter',
reg_to_edit = '$reg_to_edit',
reg_in = '$reg_in',
in_filter = '$in_filter',
reg_parcel_to = '$reg_parcel_to',
parcel_to_filter = '$parcel_to_filter',
reg_parcel_to_edit = '$reg_parcel_to_edit'
	
WHERE id = '$user_id'
";
		
		if ($conn->query($update_auth) === TRUE) { 
		header("location:user_auth.php");
		} else { echo "لم يتم تعديل الصلاحيات" ;}
	}
	}
?>