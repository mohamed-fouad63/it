<?php
if(isset($_POST["office_users_search"]))
{
    $n = 0;
    $office_users_search =  $_POST['office_users_search'];
    $conn=mysqli_connect("localhost","root","12345678","post");
    $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
    $all_office = mysqli_query($conn, $query_all_office);
    $query_bitel_user = "SELECT * FROM bitel_users WHERE money_code = '$office_users_search'";
    $bitel_user = mysqli_query($conn, $query_bitel_user);

   
    if(mysqli_num_rows($bitel_user) >= 1 )
    {
    while($bitel_user_row = mysqli_fetch_array($bitel_user))
        {
            $n++;
            $bitel_office_name = $bitel_user_row['office_name'];
            $bitel_money_code = $bitel_user_row['money_code'];
            $bitel_auth = $bitel_user_row['auth'];
            $bitel_terminal = $bitel_user_row['pos_terminal'] ;
            $bitel_sn = $bitel_user_row['sn'] ;
            $bitel_user_name = $bitel_user_row['names'] ;
            $bitel_user_id = $bitel_user_row['id'] ;
            
            ?>
                <tr>
                    <td>
                        <select name="office_name" id="bitel_office_name<?php echo $n ?>" data-n = "<?php echo $n ; ?>" onchange=get_bitel_terminal(this.dataset.n);>
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
                                    if($bitel_office_name == $office_name ){ echo 'selected';} ?>
                                >
                                <?php echo  $office_name ;?>
                            
                                </option>
                                <?php
                            }
                        ?>
                        </select>
                    </td>
                    <td name="money_code" id="bitel_money_code<?php echo $n ?>"><?php echo $bitel_money_code ;?></td>
                    <td>
                        <select name="bitel_terminal" data-m = "<?php echo $n ; ?>" id="bitel_terminal<?php echo $n ?>" onchange=get_bitel_sn(this.id,this.dataset.m);>
                        <option value="<?php echo $bitel_sn ;?>"><?php echo $bitel_terminal ;?></option>
                        </select>
                    </td>
                    <td name="bitel_sn" id="bitel_sn<?php echo $n ?>"><?php echo $bitel_sn ;?></td>
                    <td>
                        <select name="bitel_auth" id="bitel_auth<?php echo $n ?>">
                            <option
                           <?php if($bitel_auth == 'موظف'){ echo 'selected'; } ?>
                            value="">موظف
                            </option>
                            <option
                            <?php if($bitel_auth == 'مدير'){ echo 'selected'; } ?>
                            value="">مدير
                            </option>
                            <option
                            <?php if($bitel_auth == 'مدير + موظف'){ echo 'selected'; } ?>
                            value="">مدير + موظف
                            </option>
                            <option
                            <?php if($bitel_auth == 'دعم فنى'){ echo 'selected'; } ?>
                            value="">دعم فنى
                            </option>
                        </select>                
                    </td>
                    <td name="bitel_user_name" id="bitel_user_name<?php echo $n ?>"><?php echo $bitel_user_name ;?></td>
                    <td name="bitel_user_id" id="bitel_user_id<?php echo $n ?>"><?php echo $bitel_user_id ;?></td>
                    <td>
                        <select name="bitel_action" id="bitel_action<?php echo $n ?>">
                            <option value="" >اضافه</option>
                            <option value="" selected>الغاء</option>
                            <option value="">اعادة تعيين كلمة السر</option>
                        </select>
                    </td>
                    <td>
                     <button type="button" data-i ="<?php echo $n ?>" onclick="insert_action_bitel(this.dataset.i)">تم</button>
                    </td>
                </tr>
            <?php
        }
    }


}

?>
