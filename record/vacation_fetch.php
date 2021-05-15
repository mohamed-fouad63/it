<?php
session_start();
include '../connection.php';
//if(isset($_POST["query"]))
 $search = $_POST["query"];

$query_it_name = mysqli_query($conn, "SELECT it_name FROM misin_it GROUP BY it_name HAVING COUNT(*) >= 1");

while($row_it_name=mysqli_fetch_assoc($query_it_name)){
    $it_name = $row_it_name["it_name"];
 ?>
<tr>
    <td><?php echo $it_name ; ?></td>
    <?php
    $query_vacation1 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and office_name = 'اجازه اعتياديه' and misin_date like '%$search%' ");
    $rowcount_query_vacation1=mysqli_num_rows($query_vacation1);
    ?>
    <td><?php echo $rowcount_query_vacation1 ;?> </td>
    <?php
    $query_vacation2 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and office_name = 'اجازه عارضه' and misin_date like '%$search%' ");
$rowcount_query_vacation2=mysqli_num_rows($query_vacation2);
?>
    <td><?php echo $rowcount_query_vacation2 ;?></td>
     <?php
    $query_vacation7 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and misin_day = 'السبت' and misin_date like '%$search%' ");
$rowcount_query_vacation7=mysqli_num_rows($query_vacation7);
?>
    <td><?php echo $rowcount_query_vacation7 ;?></td>
    <?php
    $query_vacation3 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and office_name = 'بدل راحه' and misin_date like '%$search%' ");
$rowcount_query_vacation3=mysqli_num_rows($query_vacation3);
?>
    <td><?php echo $rowcount_query_vacation3 ;?></td>
    <?php
    $query_vacation4 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and office_name like '%ماموريه%' and misin_date like '%$search%' ");
$rowcount_query_vacation4=mysqli_num_rows($query_vacation4);
?>
    <td><?php echo $rowcount_query_vacation4 ;?></td>
    <?php
    $query_vacation5 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and office_name like '%اجازه مرضيه%' and misin_date like '%$search%' ");
$rowcount_query_vacation5=mysqli_num_rows($query_vacation5);
?>
    <td><?php echo $rowcount_query_vacation5 ;?></td>
    <?php
    $query_vacation6 = mysqli_query($conn, "SELECT office_name FROM misin_it where it_name = '$it_name' and office_name like '%اجازه استثنائيه%' and misin_date like '%$search%' ");
$rowcount_query_vacation6=mysqli_num_rows($query_vacation6);
?>
    <td><?php echo $rowcount_query_vacation6 ;?></td>
</tr>
<?php }


?>
