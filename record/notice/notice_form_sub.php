<?php
include '../connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    /* echo $_POST['barcode'].$_POST['to'].$_POST['subject'].$_POST['_date'];*/
    
   // $notice_date = $_POST["notice_date"];
    //$notice_noti = $_POST["notice_noti"];
    $notice_from = $_POST["notice_from"];
    $notice_type = $_POST["notice_type"];
    $notice_description = $_POST["notice_description"];
    $notice_procedure = $_POST["notice_procedure"];
    $notice_id = $_POST["notice_id"];
    $notice_edit = "
            UPDATE notice set
            notice_from = '$notice_from',
            notice_type = '$notice_type',
            notice_description = '$notice_description',
            notice_procedure = '$notice_procedure'
            
            WHERE notice_id = '$notice_id'
            ";
                if ($conn->query($notice_edit) === true)
                {
                    
                } else
                    {
                    echo "<script> alert (' لم يتم تعديل البلاغ')</script>";
                    }
}
?>