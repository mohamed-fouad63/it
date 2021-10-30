<?php
if(isset($_POST["id"]))
{
    $n = 0;
    $id =  $_POST['id'];
    $conn=mysqli_connect("localhost","root","12345678","post");
        $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
    $all_office = mysqli_query($conn, $query_all_office);
    $query_v200t_user = "
SELECT v200t_users.* , dvice.stuff_pos
FROM v200t_users
INNER JOIN dvice
ON ( v200t_users.pos_terminal = dvice.pos_terminal)
WHERE v200t_users.id = '$id'
    ";
    $v200t_user = mysqli_query($conn, $query_v200t_user);
    $query_stuff_name_user = "SELECT * FROM stuff_names WHERE id = '$id'";
    $stuff_name_user = mysqli_query($conn, $query_stuff_name_user);


    if(mysqli_num_rows($v200t_user) >= 1 )
    {

    while($v200t_user_row = mysqli_fetch_array($v200t_user))
        {
            $n++;
            $v200t_office_name = $v200t_user_row['office_name'];
            $v200t_money_code = $v200t_user_row['money_code'];
            $v200t_auth = $v200t_user_row['auth'];
            $v200t_terminal = $v200t_user_row['pos_terminal'] ;
            $v200t_sn = $v200t_user_row['sn'] ;
            $v200t_user_name = $v200t_user_row['names'] ;
            $v200t_user_id = $v200t_user_row['id'] ;
            $v200t_stuff_pos  = $v200t_user_row['stuff_pos'] ;
            
            ?>
                <tr>
                    <td>
                        <select name="" id="v200t_office_name<?php echo $n ?>" data-n = "<?php echo $n ; ?>" onchange=get_v200t_terminal(this.dataset.n);>
                        <?php 
                            $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
                            $all_office = mysqli_query($conn, $query_all_office);
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
                    <td id = "v200t_money_code<?php echo $n ?>"><?php echo $v200t_money_code ;?></td>
                    <td>
                        <select name="" data-m = "<?php echo $n ; ?>" id="v200t_terminal<?php echo $n ?>" onchange=get_v200t_sn(this.id,this.dataset.m);>
                        <option value="<?php echo $v200t_sn ;?>"><?php echo $v200t_terminal ;?></option>
                        </select>
                        <span>/<?php echo $v200t_stuff_pos ; ?></span>
                    </td>
                    <td id="v200t_sn<?php echo $n ?>"><?php echo $v200t_sn ;?></td>
                    <td id="v200t_user_name<?php echo $n ?>"><?php echo $v200t_user_name ;?></td>
                    <td>
                        <select name="" id="v200t_auth<?php echo $n ?>">
                            <option></option>
                            <option
                           <?php if($v200t_auth == 'موظف'){ echo 'selected'; } ?>
                            value="">موظف
                            </option>
                            <option
                            <?php if($v200t_auth == 'مدير'){ echo 'selected'; } ?>
                            value="">مدير
                            </option>
                            <option
                            <?php if($v200t_auth == 'مدير + موظف'){ echo 'selected'; } ?>
                            value="">مدير + موظف
                            </option>
                            <option
                            <?php if($v200t_auth == 'دعم فنى'){ echo 'selected'; } ?>
                            value="">دعم فنى
                            </option>
                        </select>                
                    </td>
                    
                    <td id="v200t_user_id<?php echo $n ?>"><?php echo $v200t_user_id ;?></td>
                    <td>
                        <select name="" id="v200t_action<?php echo $n ?>">
                            <option></option>
                            <option value="" >اضافه</option>
                            <option value="" selected>الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" data-i ="<?php echo $n ?>" onclick="insert_action_v200t(this.dataset.i)">تقديم الطلب</button>
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
                         <select name="" id="v200t_office_name<?php echo $n ?>" data-n = "<?php echo $n ; ?>" onchange=get_v200t_terminal(this.dataset.n);>
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
                    <td id = "v200t_money_code<?php echo $n ?>"></td>
                    <td>
                         <select name="" data-m = "<?php echo $n ; ?>" id="v200t_terminal<?php echo $n ?>" onchange=get_v200t_sn(this.id,this.dataset.m);>
                         </select>
                         <span id="v200t_stuff_pos<?php echo $n ?>"></span>
                    </td>
                    <td id="v200t_sn<?php echo $n ?>"></td>
                    <td id="v200t_user_name<?php echo $n ?>"><?php echo $stuff_name_row['names'] ;?></td>
                    <td>
                         <select name="" id="v200t_auth<?php echo $n ?>">
                            <option></option>
                            <option value="">موظف</option>
                            <option value="">مدير</option>
                            <option value="">مدير + موظف</option>
                            <option value="">دعم فنى</option>
                        </select>
                    </td>
                    <td id="v200t_user_id<?php echo $n ?>"><?php echo $stuff_name_row['id'] ;?></td>
                    <td>
                        <select name="" id="v200t_action<?php echo $n ?>">
                            <option></option>
                            <option value="">اضافة</option>
                            <option value="">الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" data-i ="<?php echo $n ?>" onclick="insert_action_v200t(this.dataset.i)">تقديم الطلب</button>
                    </td>
                </tr>

            <?php
        }
    }
}
?>