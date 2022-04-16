<?php
while($row=mysqli_fetch_assoc($query)){
$it = $row["id_it"];
$hg = $row["id_hg"];
$office_name = $row["office_name"];
?>
<div class="office_head">
    <div class="post_offce_manager"></div>
</div>
<fieldset>
    <legend><i class="fas fa-info-circle"></i><span class="count"></span></legend>
    <table id="" class="table thead-dark ">
        <thead>
            <tr>
                <th><?php
$query_it=mysqli_query($conn, "select first_name from tbl_user where id LIKE '$it'"); 
while($row_it=mysqli_fetch_assoc($query_it)){ echo $row_it["first_name"];}
?>
                </th>
                <th class="post_office_name" id="post_office_name" name="post_office_name" colspan="5"><?php echo $row["office_name"];?></th>
                <th>
                    <?php
$query_hg=mysqli_query($conn, "select first_name from tbl_user where id LIKE '$hg'"); 
while($row_hg=mysqli_fetch_assoc($query_hg)){ echo $row_hg["first_name"];}
?>
                </th>
                <th><?php if ( $_SESSION['add_dvice'] == "1"){ ?>
                    <button type='button' class='btn  btn-outline-secondary add_new_dvice' data-toggle='modal' data-placement="right" title="اضافه  الجهاز" data-target='#add_dvice' onclick='add_dvice()'><i class='fas fa-plus'></i></button><?php }?>
                    <a href='../../it/grd/?office_name=<?php echo $office_name ?>' target='blank' class='btn  btn-outline-secondary print_grd' title="طباعه نموذج الجرد"><i class="fas fa-print"></i></a>
                </th>
                <th>
           
                </th>
            </tr>
            <tr>
                <th>الكود المالى</th>
                <th>الكود البريدى</th>
                <th> كود بوستال</th>
                <th>مجموعه بريد</th>
                <th> منظومه الطوابع</th>
                <th> اسم الدومين</th>
                <th>3G/LL</th>
                <th>رقم التليفون</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $row["money_code"];?></td>
                <td><?php echo $row["post_code"];?></td>
                <td><?php echo $row["postal_code"];?></td>
                <td><?php echo $row["post_group"];?></td>
                <td><?php echo $row["Stamps"];?></td>
                <td><?php echo $row["domain_name"];?></td>
                <td><?php
while($row8=mysqli_fetch_assoc($query8)){
echo $row8["ip"];
}
?></td>
                <td><?php echo $row["tel"];?></td>
            </tr><?php }?>
        </tbody>
    </table>
</fieldset>