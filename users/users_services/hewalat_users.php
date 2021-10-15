<?php
if(isset($_POST["id"]))
{
    $id =  $_POST['id'];
    $conn=mysqli_connect("localhost","root","12345678","post");



    $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد'";
    $all_office = mysqli_query($conn, $query_all_office);


    $query_hewalat_user = "SELECT * FROM hewalat WHERE id = '$id'";
    $hewalat_user = mysqli_query($conn, $query_hewalat_user);

    $query_stuff_name_user = "SELECT * FROM stuff_names WHERE id = '$id'";
    $stuff_name_user = mysqli_query($conn, $query_stuff_name_user);


    if(mysqli_num_rows($hewalat_user) == 1 )
    {
    while($hewalat_user_row = mysqli_fetch_array($hewalat_user))
        {
            $hewalat_office_name =$hewalat_user_row['office_name'];
            $hewalat_auth =$hewalat_user_row['auth'];
            ?>
                <tr>
                    <td>
                        <select name="" id="hewalat_office_name" onchange=get_money_code_hewalat();>
                        <?php 
                                while($all_office_name_row = mysqli_fetch_array($all_office))
                            {
                                $office_name = $all_office_name_row['office_name'];
                                $money_code = $all_office_name_row['money_code'];
                                ?>
                                <option value="<?php echo $money_code ;?>"
                                <?php
                                    if($hewalat_office_name == $office_name ){ echo 'selected';} ?>
                                >
                                <?php echo  $office_name ;?>
                            
                                </option>
                                <?php
                            }
                        ?>
                            
                        </select>
                    </td>
                    <td id="hewalat_money_code"><?php echo $hewalat_user_row['money_code'] ;?></td>
                    <td id="hewalat_user_name"><?php echo $hewalat_user_row['names'] ;?></td>
                    <td>
                        <select name="" id="hewalat_auth">
                            <option></option>
                            <option
                           <?php if($hewalat_auth == 'موظف'){ echo 'selected'; } ?>
                            value="">موظف</option>
                            <option
                            <?php if($hewalat_auth == 'مدير'){ echo 'selected'; } ?>
                            value="">مدير</option>
                        </select>                
                    </td>
                    <td id="hewalat_user_id"><?php echo $hewalat_user_row['id'] ;?></td>
                    <td id="hewalat_user_code"><?php echo $hewalat_user_row['code'] ;?></td>
                    <td>
                        <select name="" id="hewalat_action">
                            <option value="" ></option>
                            <option value="" >اضافه</option>
                            <option value="" selected>الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" id="hewalat_action_insert">تم</button>
                    </td>
                </tr>
            <?php
        }
    }
    else
    {
           while($stuff_name_row = mysqli_fetch_array($stuff_name_user))
        {
            ?>
                <tr>
                    <td>
                        <select name="" id="hewalat_office_name"  onchange=get_money_code_hewalat();>
                            <option value=""></option>
                        <?php 
                                while($all_office_name_row2 = mysqli_fetch_array($all_office))
                            {
                                $office_name2 = $all_office_name_row2['office_name'];
                                $money_code2 = $all_office_name_row2['money_code'];
                                ?>
                                <option value="<?php echo $money_code2 ;?>"
                                >
                                <?php echo  $office_name2 ;?>
                                </option>
                                <?php
                            }
                        ?>
                            
                        </select>
                    </td>
                    <td id="hewalat_money_code"></td>
                    <td id="hewalat_user_name"><?php echo $stuff_name_row['names'] ;?></td>
                    <td>
                         <select name="" id="hewalat_auth">
                            <option value=""></option>
                            <option value="">موظف</option>
                            <option value="">مدير</option>
                        </select>
                    </td>
                    <td id="hewalat_user_id"><?php echo $stuff_name_row['id'] ;?></td>
                    <td id="hewalat_user_code"><?php echo $stuff_name_row['code'] ;?></td>
                    <td>
                        <select name="" id="hewalat_action">
                            <option value="" ></option>
                            <option value="" selected>اضافة</option>
                            <option value="">الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" id="hewalat_action_insert">تم</button>
                    </td>
                </tr>

            <?php
        }
    }
}
?>