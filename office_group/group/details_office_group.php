<?php
session_start();
$key=$_POST['key'];
include '../../connection.php';
$query_id_it = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'اخصائى تشغيل نظم' ");
$query_id_hg = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'رئيس مجموعه' ");

$query_office_group = mysqli_query($conn, "SELECT * FROM all1 where post_group like '$key' ");
while($row_query_office_group=mysqli_fetch_assoc($query_office_group)){
    $post_group = $row_query_office_group['post_group'];
    $id_hg = $row_query_office_group['id_hg'];
   $id_it = '70629';
    $office_type = $row_query_office_group['office_type'];

?>


<div class="col-md-6 col-office">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><?php echo $office_type ; ?></span>
</div>
    <label style="text-align:center;" class="form-control details-text">
    <?php echo $row_query_office_group["office_name"];?>
    <a calss="btn btn-outline-secondary" style="float:left" href="../../grd/?office_name=<?php echo $row_query_office_group["office_name"] ?>" target="balnk"><i class="fas fa-print"></i></a>
    
</label>

</div>
</div>
 <?php //  echo $row_query_office_group["office_name"];
 }
?>
<!-- <form method="post" action="update_office_group.php">
<div class="hg_it">
    <div class="col-md-6 mb-3 col-office">

    </div>   

    <div class="col-md-6 mb-3 col-office">
        

    </div>
</div>
    <input type="text" name="post_group" value="<?php echo $post_group ;?>" hidden>
      <div class="col-md-6 mb-3 col-office">
          <input class="btn btn-primary" type="submit" value="تحديث البيانات"></div>
</form> -->
