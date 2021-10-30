<?php
if(isset($_POST["office_name"]))
{
    $office_name =  $_POST['office_name'];
    $conn=mysqli_connect("localhost","root","12345678","post");
    $query_v200t_terminal1 = "SELECT pos_terminal, sn,stuff_pos	 FROM dvice  WHERE dvice_name = 'VERIFONE V200T' AND office_name = '$office_name'";
    $v200t_terminal1 = mysqli_query($conn, $query_v200t_terminal1);
    while($v200t_terminal_row1 = mysqli_fetch_array($v200t_terminal1))
    { ?>
    <option data-stuff_pos = "<?php echo $v200t_terminal_row1['stuff_pos'] ;?>" value="<?php echo $v200t_terminal_row1['sn'] ;?>"><?php echo $v200t_terminal_row1['pos_terminal'] ;?></option>
<?php }
}
    ?>
