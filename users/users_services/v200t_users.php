<?php
if(isset($_POST["id"]))
{
    $id =  $_POST['id'];
    $conn=mysqli_connect("localhost","root","12345678","post");



    $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
    $all_office = mysqli_query($conn, $query_all_office);


    $query_v200t_user = "SELECT * FROM v200t_users WHERE id = '$id'";
    $v200t_user = mysqli_query($conn, $query_v200t_user);

    $query_stuff_name_user = "SELECT * FROM stuff_names WHERE id = '$id'";
    $stuff_name_user = mysqli_query($conn, $query_stuff_name_user);


    if(mysqli_num_rows($v200t_user) == 1 )
    {
    while($v200t_user_row = mysqli_fetch_array($v200t_user))
        {
            $v200t_office_name = $v200t_user_row['office_name'];
            $v200t_money_code = $v200t_user_row['money_code'];
            $v200t_auth = $v200t_user_row['auth'];
            $v200t_terminal = $v200t_user_row['pos_terminal'] ;
            $v200t_sn = $v200t_user_row['sn'] ;
            $v200t_user_name = $v200t_user_row['names'] ;
            $v200t_user_id = $v200t_user_row['id'] ;
            
            ?>
                <tr>
                    <td>جنوب الشرقيه</td>
                    <td>
                        <select name="" id="v200t_office_name" onchange=get_v200t_terminal();>
                        <?php 
                                while($all_office_name_row = mysqli_fetch_array($all_office))
                            {
                                $office_name = $all_office_name_row['office_name'];
                                $money_code = $all_office_name_row['money_code'];
                                ?>
                                <option value="<?php echo $money_code ;?>"
                                <?php
                                    if($v200t_office_name == $office_name ){ echo 'selected';} ?>
                                >
                                <?php echo  $office_name ;?>
                            
                                </option>
                                <?php
                            }
                        ?>
                        </select>
                    </td>
                    <td id = "v200t_money_code"><?php echo $v200t_money_code ;?></td>
                    <td>
                        <select name="" id="v200t_terminal" onchange=get_v200t_sn();>
                        <option value="<?php echo $v200t_sn ;?>"><?php echo $v200t_terminal ;?></option>
                        </select>
                    </td>
                    <td id="v200t_sn"><?php echo $v200t_sn ;?></td>
                    <td>
                        <select name="" id="v200t_auth">
                            <option
                           <?php if($v200t_auth == 'موظف'){ echo 'selected'; } ?>
                            value="">موظف
                            </option>
                            <option
                            <?php if($v200t_auth == 'مدير'){ echo 'selected'; } ?>
                            value="">مدير
                            </option>
                            <?php if($v200t_auth == 'دعم فنى'){ echo 'selected'; } ?>
                            value="">دعم فنى
                            </option>
                        </select>                
                    </td>
                    <td id="v200t_user_name"><?php echo $v200t_user_name ;?></td>
                    <td id="v200t_user_id"><?php echo $v200t_user_id ;?></td>
                    <td>
                        <select name="" id="v200t_action">
                            <option value="" >اضافه</option>
                            <option value="" selected>الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" id="v200t_action_insert">تم</button>
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
                    <td>جنوب الشرقيه</td>
                    <td>
                        <select name="" id="v200t_office_name" onchange=get_v200t_terminal();>
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
                    <td id = "v200t_money_code"></td>
                    <td>
                        <select name="" id="v200t_terminal" onchange=get_v200t_sn();></select>
                    </td>
                    <td id="v200t_sn"></td>
                    <td>
                         <select name="" id="v200t_auth">
                            <option value="">موظف</option>
                            <option value="">مدير</option>
                            <option value="">دعم فنى</option>
                        </select>
                    </td>
                    <td id="v200t_user_name"><?php echo $stuff_name_row['names'] ;?></td>
                    <td id="v200t_user_id"><?php echo $stuff_name_row['id'] ;?></td>
                    <td>
                        <select name="" id="v200t_action">
                            <option value="" selected>اضافة</option>
                            <option value="">الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" id="v200t_action_insert">تم</button>
                    </td>
                </tr>

            <?php
        }
    }
}
?>