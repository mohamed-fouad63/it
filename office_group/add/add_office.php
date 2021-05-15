<!-- am -->
<?php
session_start();
include '../../../it/setup/session/no_session.php';
$session_username = $_SESSION['user_name'];
include '../../connection.php';
$query_first_id_office = mysqli_query($conn, "SELECT id FROM all1 ORDER BY id DESC LIMIT 1");
while($row_first_id_office=mysqli_fetch_assoc($query_first_id_office)){ $new_id_office = $row_first_id_office['id']+1;}
$query_post_group = mysqli_query($conn, "SELECT post_group_name FROM post_group");
$query_id_hg = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'رئيس مجموعه' ");

$query_office_type = mysqli_query($conn, "SELECT * FROM office_type"); 
$query_id_it = mysqli_query($conn, "SELECT * FROM tbl_user where job like 'it' ");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>اضافه مكتب / قسم</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../img/it.svg" type="image/x-icon" />
    <link rel="stylesheet" href="../../css/web-fonts-with-css/css/all.css">
    <link rel="stylesheet" href="../../css/print.css" media="print">
    <link rel="stylesheet" href="../../css4/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/post.css">
    <link rel="stylesheet" href="../../css/typeahead.css">
    <link rel="stylesheet" href="../../css/header_nav.css">
    <!-- [if lt IE 9]><script src="../../js/html5shiv.min.js"></script><![endif]-->
    <script src="../../js/jquery-3.1.1.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js4/bootstrap.min.js"></script>
    <script src="../../js/typeahead.min.js"></script>
    <script src="../../js/get_details_office.js"></script>

    <style>
        .add_office_form {
            direction: rtl;
            margin-top: 90px;
        }

        table tr {
            transition: all .25s ease-in-out;
        }

        table tr:hover {
            background-color: #ddd;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav class="navbar  navbar-light bg-light  fixed-top">
                <a class="navbar-brand brand_home" href="../../index.php">الصفحه الرئيسيه</a>
                <div class="nav-item dropdown ">
                    <?php   include '../../setup/user/user.php'; ?>
                </div>
            </nav>
        </header>
        <form method="post" class="add_office_form" action="add_office_form.php">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">اسم المكتب / القسم</span>
                        </div>
                        <input type="text" name="office_name" class="form-control details-text" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text">مجموعه بريديه</label></div>
                            <select class="custom-select" name="post_group" required>
                            <option></option>
                            <?php  while($row_query_post_group=mysqli_fetch_assoc($query_post_group)){ ?>
                            <option value="<?php echo $row_query_post_group["post_group_name"];?>"><?php echo $row_query_post_group["post_group_name"];?></option>
                            <?php } ?>
                        </select>
                        <!--<label class="form-control details-text"><?php echo $row["post_group"];?></label>-->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">كود مالى</span>
                        </div>
                        <input type="number" name="money_code" class="form-control details-text">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">كود بريدى</span>
                        </div>
                        <input type="number" name="post_code" class="form-control details-text">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">كود بوستال</span>
                        </div>
                        <input type="number" name="postal_code" class="form-control details-text">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">مجموعه بوستال</span>
                        </div>
                        <select class="custom-select" name="g_postal">
                            <option value=""></option>
                            <option value="أ">أ</option>
                            <option value="ب">ب</option>
                            <option value="ج">ج</option>
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
                        <input type="text" name="domain_name" class="form-control details-text">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">منظومه الطوابع</span>
                        </div>
                        <input type="text" name="stamps" class="form-control details-text">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text">رئيس المجموعه</label>
                        </div>
                        <?php
                $query_iname_it = mysqli_query($conn, "SELECT first_name,id FROM tbl_user where job like 'رئيس مجموعه' ");
                                    ?>
                        <select class="custom-select" name="id_hg">
                            <option></option>
                            <?php  while($row_name_hg=mysqli_fetch_assoc($query_iname_it)){ ?>
                            <option value="<?php echo $row_name_hg['id'];?>"><?php echo $row_name_hg['first_name'];?></option>
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
                $query_iname_hg = mysqli_query($conn, "SELECT first_name,id FROM tbl_user where job like 'اخصائى تشغيل نظم' ");
                                
            ?>
                        <select class="custom-select" name="id_it">
                            <option></option>
                            <?php  while($row_name_it=mysqli_fetch_assoc($query_iname_hg)){ ?>
                            <option value="<?php echo $row_name_it["id"];;?>"><?php echo $row_name_it["first_name"];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">التليفون</span>
                        </div>
                        <input type="text" name="tel" class="form-control details-text">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">العنوان</span>
                        </div>
                        <input type="text" name="address" class="form-control details-text" >
                    </div>
                </div>
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
<option value = "<?php echo $row_query_office_type['office_type'];?>"><?php echo $row_query_office_type['office_type'];?></option>
           <?php }; ?>
            </select>
        </div>
    </div>
</div>
            <input class="btn btn-primary" name="add_office" type="submit" value="إضافه">
        </form>
    </div>
    <!-- end add dvice -->
    <!-- php start change_pass -->
    <?php   include '../../setup/pass/change_password_form.php'; ?>
    <!-- php end change_pass -->
    <!--Logout Modal -->
    <?php   include '../../setup/log/logout_form.php'; ?>
    <!--Logout Modal -->
</body>

</html>
<?php ?>
