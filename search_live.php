<?php
session_start();
    $key=$_GET['key'];

    include 'connection.php';
    $query=mysqli_query($conn, "select office_name from all1 where money_code LIKE '%{$key}%' OR office_name LIKE '%{$key}%' OR post_code LIKE '%{$key}%' OR postal_code  LIKE '%{$key}%' ");
    while($row=mysqli_fetch_assoc($query))
    {
        $array[] = $row['office_name'];
    }
    echo json_encode($array);
    mysqli_close($conn);
?>
 