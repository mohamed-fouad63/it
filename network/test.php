<?php
session_start();
include '../../it/setup/session/no_session.php';
date_default_timezone_set('Africa/Cairo');
include '../connection.php';

$classification=mysqli_query($conn,
"
SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'dvice' AND column_name = 'classification'
");
$classification_count=mysqli_num_rows($classification);
$connecting=mysqli_query($conn,
"
SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = 'dvice' AND column_name = 'connecting'
");
$connecting_coun=mysqli_num_rows($connecting);


    if ($connecting_coun == 1) {
       
    }

    else {

        $add_connection =mysqli_query($conn,
"
ALTER TABLE dvice
ADD COLUMN connecting VARCHAR(20) NOT NULL AFTER ip;

");
    }
    
if ($classification_count == 1  ) {
    
} else {
$add_classification =mysqli_query($conn,
"
ALTER TABLE dvice
ADD COLUMN classification VARCHAR(20) NOT NULL AFTER ip;

");
}

echo $classification_count;
echo $connecting_coun;
?>