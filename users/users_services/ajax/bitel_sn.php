<?php
if(isset($_POST["bitel_terminal"]))
{
    $bitel_terminal =  $_POST['bitel_terminal'];
    $conn=mysqli_connect("localhost","root","12345678","post");
    $query_BITEL_sn1 = "SELECT sn FROM dvice  WHERE dvice_name = 'BITEL IC3600' AND pos_terminal = '$bitel_terminal'
    ";
    $BITEL_sn1 = mysqli_query($conn, $query_BITEL_sn1);
    while($BITEL_sn_row1 = mysqli_fetch_array($BITEL_sn1))
    { 
     echo $BITEL_sn_row1['sn'] ;
 }
}
    ?>
