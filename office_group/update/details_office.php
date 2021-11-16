<!-- am -->
<?php
session_start();
$key=$_POST['key'];
include '../../connection.php';
$query=mysqli_query($conn, "select * from all1 where money_code LIKE '{$key}' OR office_name LIKE '{$key}' OR post_code LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query)){
        $id_it = $row['id_it'];
        $id_hg = $row['id_hg'];
        $post_group = $row["post_group"];
        $office_name = $row["office_name"];
        $office_type = $row["office_type"];
        $money_code = $row["money_code"];
        $post_code = $row["post_code"];
        $postal_code = $row["postal_code"];
        $g_postal = $row["g_postal"];
        $domain_name = $row["domain_name"];
        $Stamps = $row["Stamps"];
        $Sat = $row["sat"];
        $address = $row["address"];
        $g3 = $row["3G"];
        $ll = $row["LL"];
        $tel = $row["tel"];
        $id = $row["id"];

$query_post_group = mysqli_query($conn, "SELECT post_group_name  FROM post_group");
$query_id_it = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'اخصائى تشغيل نظم' ");
$query_id_hg = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'رئيس مجموعه' ");
$query_office_type = mysqli_query($conn, "SELECT * FROM office_type");    

$query_name_hg = mysqli_query($conn, "SELECT first_name FROM tbl_user where id like '$id_hg' ");
    while($row_name_hg=mysqli_fetch_assoc($query_name_hg)){
        $hg_first_name = $row_name_hg["first_name"]; // for hidden label
}
$query_name_it = mysqli_query($conn, "SELECT first_name FROM tbl_user where id like '$id_it' ");
    while($row_name_it=mysqli_fetch_assoc($query_name_it)){
       $it_first_name = $row_name_it["first_name"]; // for hidden label
                                    }
?>
<form class="edit_form">

    
 <div class="row">
    <div class="col-md-6 mb-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">اسم المكتب / القسم</span>
          </div>
          
            <input type="text" name="office_name" class="form-control details-text" value="<?php echo $office_name;?>" readonly>
        </div>
    </div>
 
    <div class="col-md-6 mb-3">
        <div class="input-group mb-4">
          <div class="input-group-prepend">
              <label class="input-group-text">مجموعه بريديه</label></div>
        <select class="custom-select" name="post_group" >
            <option></option>
          <?php  while($row_query_post_group=mysqli_fetch_assoc($query_post_group)){ ?>
            <option  value="<?php echo $row_query_post_group["post_group_name"];?>"
                    <?php if ($row_query_post_group["post_group_name"] == $post_group ){ echo 'selected="selected"';} ?>
                ><?php echo $row_query_post_group["post_group_name"];?>
            </option>
           <?php } ?>
            </select>
        </div>
    </div>
</div>   
    
    
    
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">كود مالى</span>
            </div>
            <input type="number" name="money_code" class="form-control details-text" value="<?php echo $money_code ?>">
        </div>
    </div>
    <div class="col-md-3 mb-3">
         <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">كود بريدى</span>
            </div>
            <input type="number" name="post_code" class="form-control details-text" value="<?php echo $post_code ?>">
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="input-group mb-3">
            
            
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">كود بوستال</span>
          </div>
            
  
        <input type="number" name="postal_code" class="form-control details-text" value="<?php echo $postal_code ?>">
        </div>
    </div>
            <div class="col-md-3 mb-3">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">مجموعه بوستال</span>
            </div>
           <!-- <label class="form-control details-text"><?php //echo $g_postal ?></label>-->
            <select class="custom-select" name="g_postal">
                <option></option>
                <option <?php if ( $g_postal == 'أ' ) {echo 'selected="selected"';} ?> value="أ">أ</option>
             <option <?php if ( $g_postal == 'ب' ) {echo 'selected="selected"';} ?> value="ب">ب</option>
             <option  <?php if ( $g_postal == 'ج' ) {echo 'selected="selected"';} ?> value="ج">ج</option>
            </select> 
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-6 mb-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">اسم دومين المكتب</span>
          </div>
            <input type="text" name="domain_name" class="form-control details-text" value="<?php echo $domain_name ?>">
        </div>
    </div>
 
    <div class="col-md-6 mb-3">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">منظومه الطوابع</span>
          </div>
            <input type="text" name="stamps" class="form-control details-text" value="<?php echo $Stamps ?>">
        </div>
    </div>
</div>



<div class="row">
    <div class="col-md-6 mb-3">
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <label class="input-group-text">رئيس المجموعه</label>
          </div>
            
            <select class="custom-select" name="id_hg" >
                <option></option>
          <?php  while($row_query_id_hg=mysqli_fetch_assoc($query_id_hg)){
              $hg_id_first_name = $row_query_id_hg["first_name"];
              $hg_id = $row_query_id_hg["id"]; ?>
            <option
            value="<?php echo $hg_id ?>"
            <?php if($hg_id == $id_hg){ echo 'selected';}?>     
                    ><?php echo $hg_id_first_name; ?></option>
           <?php } ?>
        </select>
        </div>
    </div>   

    <div class="col-md-6 mb-3">
        <div class="input-group mb-4">
          <div class="input-group-prepend">
            <label class="input-group-text">مسئول الدعم الفنى</label>
          </div>
            <?php
                 
            ?>
           <!-- <label class="form-control details-text"><?php echo $it_first_name ;?></label> -->
            <select class="custom-select" name="id_it" >
                <option></option>
          <?php  while($row_query_id_it=mysqli_fetch_assoc($query_id_it)){
              $it_id_first_name = $row_query_id_it["first_name"]; 
              $it_id = $row_query_id_it["id"]; ?>
            <option
            value="<?php echo $it_id;?>"
           <?php if($it_id == $id_it){ echo 'selected';}?>
                    
                    ><?php echo $it_id_first_name; ?></option>
           <?php } ?>
        </select>
        </div>
    </div>
</div>

<div class="row">


</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">نوع المكتب</span>
            </div>
          <!--  <input type="text" name="office_type" class="form-control details-text" value="<?php echo $office_type;?>" >-->
            <select class="custom-select" name="office_type">
                <option></option>
          <?php  while($row_query_office_type=mysqli_fetch_assoc($query_office_type)){ ?>
            <option  value="<?php echo $row_query_office_type["office_type"];?>"
                    <?php if ($row_query_office_type["office_type"] == $office_type ){ echo 'selected="selected"';} ?>
                ><?php echo $row_query_office_type["office_type"];?>
            </option>
           <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">التليفون</span>
            </div>
            <input type="text" name="tel" class="form-control details-text" value="<?php echo $tel;?>">
        </div>
    </div>
</div>

<div class="row">
 

       <div class="col-md-6 mb-3">

    </div>
        <div class="col-md-6 mb-3" style="display:none;">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">رقم المعرف</span>
            </div>
            <input type="text" name="id" class="form-control details-text" value="<?php echo $id;?>">
        </div>
    </div>

</div>

</form>

<?php } ?>
<button class="btn btn-primary edit" >تحديث البيانات</button>
<script>
$(".edit").click(function(){

$.ajax({
url:"update_office_details.php",
type:"POST",
data :$(".edit_form").serialize(),
success:function(data){
    alert('تم تحديث البيانات ')
// var key = $(".typeahead").val();
// $.ajax({
// url:"details_office.php",type:"POST",
// data :{"key":key},
// success:function(responseText){$(".msg").html(responseText);}
// });
}
});
});
</script>
<?php ?>