  <?php
  session_start();
  include '../connection.php';
  if(!$conn){echo"غير متصل";}
  $search = $_GET[search];
    $query="SELECT * FROM `name` WHERE `names` LIKE '$search%'or `code` LIKE '$search%'or `id` LIKE '$search%'";
  $data = $conn->query($query);
   $num_rows = mysqli_num_rows($data);
      // echo "$num_rows Rows\n";
      if ($num_rows==1){   
    while($result = $data-> fetch_assoc()){

 ?>
  <html><head>
<style> 
        
</style>
</head>
<body>
  <table>
  <tr class="user_details">
  <td><input type='text' id='fname' class='input-search' value='<?php echo $result["names"] ?>' disabled></td>
  <td><input type='text' id='age' class='input-search'  value='<?php echo $result["id"] ?>' disabled></td>
  <td><input type='text' id='idd'  class='input-search' value='<?php echo $result["code"] ?>' disabled></td>
  <td>
  <select id='select_action'  name='' class='select_action' onChange='' >
    <option selected>اختر المطلوب تنفيذه لهذا المستخدم</option>
    <option id='addaction' value='أضافه'>أضافه</option>
    <option id='deleteaction' value='حذف'> حذف  </option>
    <option id='resetpassaction' value='استعاده كلمه المرور '>  استعاده كلمه المرور  </option>
</select>
  </td>
  </tr></table>
  <?php
;};} 
    
    
    
      $query1=" SELECT * FROM `all1` WHERE `office_name` LIKE '$_GET[search1]%'or `postal_code` LIKE '$_GET[search1]%'";
  $data1 = $conn->query($query1);
   $num_rows1 = mysqli_num_rows($data1);
    //  echo "$num_rows1 Rows\n";
      if ($num_rows1 ==1){   
    while($result1 = $data1-> fetch_assoc()){ ?>
  <table>
  <tr class="office_details">
  <td><input type='text' id='office' class='input-search' value='<?php echo $result1["office_name"] ?>' disabled></td>
  <td><input type='text' id='PostalCode'  class='input-search' value='<?php echo $result1["postal_code"] ?>' disabled></td>

  </tr>
  <?php 
;};} 
 ?></table>
</body>
</html>
