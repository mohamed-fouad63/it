<?php
session_start();
include '../../setup/session/no_session.php';
include '../../connection.php';
$num = $_POST['num'];
$barcode = $_POST['barcode'];
$send_to = $_POST['send_to'];
$subject = $_POST['subject'];

if(strlen($barcode) == 13){
    if($send_to == "" or $subject == "")
        { ?>
       <script> alert ('الحقول فارغه')</script>
        <?php }
        else
            {

$sql_pc_edit = "UPDATE parcel_send SET 
barcode = '$barcode',
send_to ='$send_to',
subject ='$subject'
WHERE id ='$num'";
if ($conn->query($sql_pc_edit) === TRUE){
    header("Refresh:0; url=../../reg/parcel/parcel_to_edit.php");
} else {
                    echo "<script> alert (' لم يتم اضافه المسجل - باركود مكرر')</script>";
                    }
        }

}
else {
    echo "<script> alert ('الباركود غير صحيح')</script>";
}
?>