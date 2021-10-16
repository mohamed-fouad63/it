<?php
session_start();
$session_id = $_SESSION['id'];
$session_username = $_SESSION['user_name'];
$db = $_SESSION['db'];
include '../../../it/setup/session/no_session.php';
//if ( $job == "hg"){ header('location: not.php');}
include '../../connection.php';

?>
<!DOCTYPE html>
<html lang="en" dir="rtl"

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../js/jquery-3.1.1.min.js"></script>
    <style>
        fieldset:not(:first-of-type) {
            margin-top: 10px
        }

        legend {
            margin: 0 30px;
            padding: 10px 10px;
            border: 1px solid;

        }

        table {
            display: table;
            margin: auto;
            width: 90%;
            border-collapse: unset;
            border-spacing: 0px 2px;
            text-align: center;
        }


        table tbody tr td {
            padding-bottom: 1px;
        }
        .tablinks {
            display: flex;
        }

        .tablink {
            background-color: #FFFFFF;
            display: flex;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 50%;
        }
        .tablink_default {
    background-color: #dddddd;
        }

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    pointer-events: auto;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 0.3rem;
    outline: 0;
}
.tabcontent {
    display: none;
    height: 100%;
}
        .tab_defult {
    display: block;
}
.hide {
    opacity: 0;
}
.hewalat_table tr:hover .td_btn,
.bitel_table tr:hover .td_btn,
.v200t_table tr:hover .td_btn
{
    opacity: 1;
}
    </style>
</head>

<body>
<table>
<?php

$id = '70747';


    $conn=mysqli_connect("localhost","root","12345678","post");




    $query_bitel_user = "SELECT * FROM bitel_users WHERE id = '$id'";
    $bitel_user = mysqli_query($conn, $query_bitel_user);

    $query_stuff_name_user = "SELECT * FROM stuff_names WHERE id = '$id'";
    $stuff_name_user = mysqli_query($conn, $query_stuff_name_user);


    if(mysqli_num_rows($bitel_user) >= 1 )
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
                        <select name="office_name"  onchange=get_bitel_terminal();>
                        <?php 
                            $query_all_office = "SELECT * FROM all1 WHERE office_type = 'مركز خدمات' or office_type = 'مكتب بريد' ORDER BY office_name";
                        $all_office = mysqli_query($conn, $query_all_office);
                          while($all_office_name_row = mysqli_fetch_assoc($all_office))
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
                    <td><?php echo $bitel_money_code ;?></td>
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


?>
</table>
</body>
</html>