<?php
if(isset($_POST["id"]))
{
    $id =  $_POST['id'];
    $conn=mysqli_connect("localhost","root","12345678","post");

    $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
    $all_office = mysqli_query($conn, $query_all_office);


    $query_bitel_user = "SELECT * FROM bitel_users WHERE id = '$id'";
    $bitel_user = mysqli_query($conn, $query_bitel_user);

    $query_stuff_name_user = "SELECT * FROM stuff_names WHERE id = '$id'";
    $stuff_name_user = mysqli_query($conn, $query_stuff_name_user);


    if(mysqli_num_rows($bitel_user) == 1 )
    {
    while($bitel_user_row = mysqli_fetch_array($bitel_user))
        {
            $bitel_office_name = $bitel_user_row['office_name'];
            $bitel_money_code = $bitel_user_row['money_code'];
            $bitel_auth = $bitel_user_row['auth'];
            $bitel_terminal = $bitel_user_row['pos_terminal'] ;
            $bitel_sn = $bitel_user_row['sn'] ;
            $bitel_user_name = $bitel_user_row['names'] ;
            $bitel_user_id = $bitel_user_row['id'] ;
            
            ?>
                <tr>
                    <td>جنوب الشرقيه</td>
                    <td>
                        <select name="office_name" id="bitel_office_name" onchange=get_bitel_terminal();>
                        <?php 
                                while($all_office_name_row = mysqli_fetch_array($all_office))
                            {
                                $office_name = $all_office_name_row['office_name'];
                                $money_code = $all_office_name_row['money_code'];
                                ?>
                                <option value="<?php echo $money_code ;?>"
                                <?php
                                    if($bitel_office_name == $office_name ){ echo 'selected';} ?>
                                >
                                <?php echo  $office_name ;?>
                            
                                </option>
                                <?php
                            }
                        ?>
                        </select>
                    </td>
                    <td name="money_code" id="bitel_money_code"><?php echo $bitel_money_code ;?></td>
                    <td>
                        <select name="bitel_terminal" id="bitel_terminal" onchange=get_bitel_sn();>
                        <option value="<?php echo $bitel_sn ;?>"><?php echo $bitel_terminal ;?></option>
                        </select>
                    </td>
                    <td name="bitel_sn" id="bitel_sn"><?php echo $bitel_sn ;?></td>
                    <td>
                        <select name="bitel_auth" id="bitel_auth">
                            <option
                           <?php if($bitel_auth == 'موظف'){ echo 'selected'; } ?>
                            value="">موظف
                            </option>
                            <option
                            <?php if($bitel_auth == 'مدير'){ echo 'selected'; } ?>
                            value="">مدير
                            </option>
                            <option
                            <?php if($bitel_auth == 'دعم فنى'){ echo 'selected'; } ?>
                            value="">دعم فنى
                            </option>
                        </select>                
                    </td>
                    <td name="bitel_user_name" id="bitel_user_name"><?php echo $bitel_user_name ;?></td>
                    <td name="bitel_user_id" id="bitel_user_id"><?php echo $bitel_user_id ;?></td>
                    <td>
                        <select name="bitel_action" id="bitel_action">
                            <option value="" >اضافه</option>
                            <option value="" selected>الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" id="bitel_action_insert">تم</button>
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
                        <select name="office_name" id="bitel_office_name" onchange=get_bitel_terminal();>
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
                    <td name="money_code" id="bitel_money_code"></td>
                    <td>
                        <select name="bitel_terminal" id="bitel_terminal" onchange=get_bitel_sn();></select>
                    </td>
                    <td name="bitel_sn" id="bitel_sn"></td>
                    <td>
                         <select name="bitel_auth" id="bitel_auth">
                            <option value="">موظف</option>
                            <option value="">مدير</option>
                            <option value="">دعم فنى</option>
                        </select>
                    </td>
                    <td name="bitel_user_name" id="bitel_user_name"><?php echo $stuff_name_row['names'] ;?></td>
                    <td name="bitel_user_id" id="bitel_user_id"><?php echo $stuff_name_row['id'] ;?></td>
                    <td>
                        <select name="bitel_action" id="bitel_action">
                            <option value="" selected>اضافة</option>
                            <option value="">الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" id="bitel_action_insert">تم</button>
                    </td>
                </tr>
            <?php
        }
    }
}
?>