<?php
if(isset($_POST["office_name"]))
{
    $office_name =  $_POST['office_name'];
    $conn=mysqli_connect("localhost","root","12345678","post");
    $query_BITEL_terminal1 = "SELECT pos_terminal, sn FROM dvice  WHERE dvice_name = 'BITEL IC3600' AND office_name = '$office_name'";
    $BITEL_terminal1 = mysqli_query($conn, $query_BITEL_terminal1);
    while($BITEL_terminal_row1 = mysqli_fetch_array($BITEL_terminal1))
    { ?>
    <option value="<?php echo $BITEL_terminal_row1['sn'] ;?>"><?php echo $BITEL_terminal_row1['pos_terminal'] ;?></option>
<?php }
}
    ?>
