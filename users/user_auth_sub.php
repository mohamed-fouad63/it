<?php
session_start();
include '../connection.php';
if(isset($_POST['user_id'])){$user_id  = $_POST['user_id'];} else {$user_id = 0 ;}

	if(isset($_POST['counts'])){$counts  = $_POST['counts'];} else {$counts = 0 ;}
	if(isset($_POST['wrong'])){$wrong  = $_POST['wrong'];} else {$wrong = 0 ;}
if($wrong == 1 or $counts == 1 ){$link_count_wrong = 1;} else {$link_count_wrong = 0;}
	
	if(isset($_POST['sims'])){$sims  = $_POST['sims'];} else {$sims = 0 ;}
	if(isset($_POST['replace_sims'])){$replace_sims  = $_POST['replace_sims'];} else {$replace_sims = 0 ;}
if($sims == 1 or $replace_sims == 1 ){$link_network = 1;} else {$link_network = 0;}

	if(isset($_POST['edit_office'])){$edit_office  = $_POST['edit_office'];} else {$edit_office = 0 ;}
	if(isset($_POST['add_office'])){$add_office  = $_POST['add_office'];} else {$add_office = 0 ;}
	if(isset($_POST['office_group'])){$office_group  = $_POST['office_group'];} else {$office_group = 0 ;}
if($edit_office == 1 or $add_office == 1 or $office_group == 1 ){$link_office_group = 1;} else {$link_office_group = 0;}

	if(isset($_POST['Incoming'])){$Incoming  = $_POST['Incoming'];} else {$Incoming = 0 ;}
	if(isset($_POST['move_dvices'])){$move_dvices  = $_POST['move_dvices'];} else {$move_dvices = 0 ;}
	if(isset($_POST['deleted_dvices'])){$deleted_dvices  = $_POST['deleted_dvices'];} else {$deleted_dvices = 0 ;}
	if(isset($_POST['all_misin'])){$all_misin  = $_POST['all_misin'];} else {$all_misin = 0 ;}
	if(isset($_POST['notice'])){$notice  = $_POST['notice'];} else {$notice = 0 ;}
if($Incoming == 1 or $move_dvices == 1 or $deleted_dvices == 1 or $all_misin == 1 or $notice == 1 ){$link_record = 1;} else {$link_record = 0;}


	if(isset($_POST['all_dvices'])){$all_dvices  = $_POST['all_dvices'];} else {$all_dvices = 0 ;}
	if(isset($_POST['post'])){$post  = $_POST['post'];} else {$post = 0 ;}
		if(isset($_POST['edit'])){$edit  = $_POST['edit'];} else {$edit = 0 ;}
		if(isset($_POST['resent'])){$resent  = $_POST['resent'];} else {$resent = 0 ;}
		if(isset($_POST['move'])){$move  = $_POST['move'];} else {$move = 0 ;}
		if(isset($_POST['to_it'])){$to_it  = $_POST['to_it'];} else {$to_it = 0 ;}
		if(isset($_POST['add_dvice'])){$add_dvice  = $_POST['add_dvice'];} else {$add_dvice = 0 ;}
	if(isset($_POST['in_it'])){$in_it  = $_POST['in_it'];} else {$in_it = 0 ;}
		if(isset($_POST['edit_in_it'])){$edit_in_it  = $_POST['edit_in_it'];} else {$edit_in_it = 0 ;}
		if(isset($_POST['resent_in_it'])){$resent_in_it  = $_POST['resent_in_it'];} else {$resent_in_it = 0 ;}
		if(isset($_POST['move_in_it'])){$move_in_it  = $_POST['move_in_it'];}else {$move_in_it = 0 ;}
		if(isset($_POST['to_tts'])){$to_tts  = $_POST['to_tts'];} else {$to_tts = 0 ;}
		if(isset($_POST['delete_in_it'])){$delete_in_it  = $_POST['delete_in_it'];} else {$delete_in_it = 0 ;}
		if(isset($_POST['replace_sims_in_it'])){$replace_sims_in_it  = $_POST['replace_sims_in_it'];} else {$replace_sims_in_it = 0 ;}
		if(isset($_POST['retweet'])){$retweet  = $_POST['retweet'];} else {$retweet = 0 ;}
	if(isset($_POST['in_tts'])){$in_tts  = $_POST['in_tts'];} else {$in_tts = 0 ;}
		if(isset($_POST['edit_in_tts'])){$edit_in_tts  = $_POST['edit_in_tts'];} else {$edit_in_tts = 0 ;}
		if(isset($_POST['resent_in_tts'])){$resent_in_tts  = $_POST['resent_in_tts'];} else {$resent_in_tts = 0 ;}
	if(isset($_POST['replace_dvices'])){$replace_dvices  = $_POST['replace_dvices'];} else {$replace_dvices = 0 ;}
if($all_dvices == 1 or $post == 1 or $in_it == 1 or $in_tts == 1 or $replace_dvices == 1 ){$link_dvice = 1;} else {$link_dvice = 0;}


	if(isset($_POST['my_misin'])){$my_misin  = $_POST['my_misin'];} else {$my_misin = 0 ;}
	if(isset($_POST['misins'])){$misins  = $_POST['misins'];} else {$misins = 0 ;}
if($my_misin == 1 or $misins == 1 ){$link_misin = 1;} else {$link_misin = 0;}


	// if(isset($_POST['postal'])){$postal  = $_POST['postal'];} else {$postal = 0 ;}
	// if(isset($_POST['hewalat'])){$hewalat  = $_POST['hewalat'];} else {$hewalat = 0 ;}
	if(isset($_POST['users'])){$users  = $_POST['users'];} else {$users = 0 ;}
if($users == 1 ){$link_user = 1;} else {$link_user = 0;}

if(isset($_POST['link_reg'])){$link_reg  = $_POST['link_reg'];} else {$link_reg = 0 ;}
	if(isset($_POST['reg_to'])){$reg_to  = $_POST['reg_to'];} else {$reg_to = 0 ;}
	if(isset($_POST['to_filter'])){$to_filter  = $_POST['to_filter'];} else {$to_filter = 0 ;}
	if(isset($_POST['reg_in'])){$reg_in  = $_POST['reg_in'];} else {$reg_in = 0 ;}
	if(isset($_POST['in_filter'])){$in_filter  = $_POST['in_filter'];} else {$in_filter = 0 ;}
	if(isset($_POST['reg_parcel_to'])){$reg_parcel_to  = $_POST['reg_parcel_to'];} else {$reg_parcel_to = 0 ;}
	if(isset($_POST['parcel_to_filter'])){$parcel_to_filter  = $_POST['parcel_to_filter'];} else {$parcel_to_filter = 0 ;}
if($reg_to == 1 or $to_filter == 1 or $reg_in == 1 or $in_filter == 1 or $reg_parcel_to == 1 or $parcel_to_filter == 1 ){$link_reg = 1;} else {$link_reg = 0;}


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
		echo "<h1 style='margin: 0; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);text-align: center;'>انت تقوم بالغاء اخر مستخدم له صلاحيه تعديل (صلاحيات المستخدمين) لن يتم تنفيذ طلبك</h1>";
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
	// header("location:user_auth.php");
	}

?>