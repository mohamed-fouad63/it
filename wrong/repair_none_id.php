<?php
session_start();

include '../connection.php';
$update_dvice_type = mysqli_query($conn,"UPDATE dvice
INNER JOIN post.dvice_type ON dvice.dvice_name = post.dvice_type.dvice_name
SET dvice.dvice_type =  post.dvice_type.dvice_type
WHERE  dvice.dvice_name = post.dvice_type.dvice_name
" ) ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>done</p>
</body>
</html>
