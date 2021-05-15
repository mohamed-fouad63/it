<?php
session_start();
date_default_timezone_set('Africa/Cairo');
include '../../setup/session/no_session.php';
include '../../connection.php';
$query = "
 SELECT * FROM inbox  
           WHERE date BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."'
 
 ";  
 $result = mysqli_query($conn, $query);
$rowcount1=mysqli_num_rows($result);
 ?>  
 <!DOCTYPE html>  
 <html lang="ar">  
      <head>  
           <title>المسجلات الوارده</title>  
    <script>
          function myFunction(){
              window.print();
          }
          
          </script>
           <link rel="stylesheet" href="../../css4/bootstrap.min.css" />  
          <style>
              @font-face {
                          font-family: myFirstFont;
                          src: url(C39SLOW.TTF);
                        }
            
              *{
                  font-weight: bold;
                  direction: rtl;
                text-align: center;
              }
              table {
                  width: 100%;
              }
              th {
                  text-wrap: break-word;
                    text-align: center;
                }
              .table td, .table th {
                                padding:0;
                                vertical-align: middle;
                                   
                            }
              .table td {
                   height: 70px;
              }
              .container {
                    width: auto;
                    margin:auto;
              }
 
              @media print  {
                  
                  
                  #print {
                      display: none;
                  }
                               
              }
              
          </style>
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h4 align="center">حافظه استلام مسجلات مصلحيه الى الدعم الفنى بتاريخ  <?php echo date('Y-m-d'); ?></h4>
                <button id="print"  class="btn btn-danger" onclick="myFunction()">طباعه</button>
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                             
                               <th>تاريخ التصدير</th>  
                               <th>رقم المسجل</th>  
                               <th>الراسل</th>  
                               <th>الموضوع</th>  
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                                
                               <td><?php echo $row["date"]; ?></td>  
                               <td class="barcode"><?php echo $row["barcode"]; ?></td>  
                               <td><?php echo $row["send_to"]; ?></td>  
                               <td><?php echo $row["subject"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>
                <p> استلمت عدد  <?php echo $rowcount1; ?> مسجل لا غير  </p>
           </div>  
      </body>  
 </html>  
