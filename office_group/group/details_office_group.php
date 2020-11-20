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
   $id_it = $row_query_office_group['id_it'];
    $office_type = $row_query_office_group['office_type'];

?>


<div class="col-md-6 col-office">
<div class="input-group mb-3">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><?php echo $office_type ; ?></span>
</div>
    <label style="text-align:center;" class="form-control details-text"><?php echo $row_query_office_group["office_name"];?></label>

</div>
</div>
 <?php //  echo $row_query_office_group["office_name"];
 }
?>
<form method="post" action="update_office_group.php">
<div class="hg_it">
    <div class="col-md-6 mb-3 col-office">
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <label class="input-group-text">رئيس المجموعه</label>
          </div>
            
                        <?php
                $query_iname_it = mysqli_query($conn, "SELECT first_name FROM tbl_user where id like '$id_hg' ");
                                    while($row_name_hg=mysqli_fetch_assoc($query_iname_it)){}?>
            <select class="custom-select" name="id_hg">
                <option></option>
          <?php  while($row_query_id_hg=mysqli_fetch_assoc($query_id_hg)){ ?>
                <option  value="<?php echo $row_query_id_hg["id"];?>"
                    <?php if ($row_query_id_hg["id"] == $id_hg ){ echo 'selected="selected"';}?>
                    ><?php echo $row_query_id_hg["first_name"];?>
                </option>
           <?php } ?>
        </select>
        </div>
    </div>   

    <div class="col-md-6 mb-3 col-office">
        
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <label class="input-group-text">مسئول الدعم الفنى</label>
          </div>
            <?php
                $query_iname_it = mysqli_query($conn, "SELECT first_name FROM tbl_user where id like '$id_it' ");
                                    while($row_name_it=mysqli_fetch_assoc($query_iname_it)){}?>
            <select class="custom-select" name="id_it">
                <option></option>
          <?php  while($row_query_id_it=mysqli_fetch_assoc($query_id_it)){ ?>
                <option  value="<?php echo $row_query_id_it["id"];?>"
                    <?php if ($row_query_id_it["id"] == $id_it ){ echo 'selected="selected"';}?>
                    ><?php echo $row_query_id_it["first_name"];?>
                </option>
           <?php } ?>
        </select>
        </div>
    </div>
</div>
    <input type="text" name="post_group" value="<?php echo $post_group ;?>" hidden>
      <div class="col-md-6 mb-3 col-office">
          <input class="btn btn-primary" type="submit" value="تحديث البيانات"></div>
</form>
