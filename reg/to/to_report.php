<?php 
date_default_timezone_set('Africa/Cairo');
session_start();
include '../../setup/session/no_session.php';
include '../../connection.php'; 
 $query = "
 SELECT * FROM send  
           WHERE date BETWEEN '".date('Y-m-d')."' AND '".date('Y-m-d')."'
 
 ";  
 $result = mysqli_query($conn, $query);

 ?>  
 <!DOCTYPE html>  
 <html lang="ar">  
      <head>  
           <title>المسجلات الصادره</title>  
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
                 
              }
              .container {
                    width: auto;
                    margin:auto;
              }
                .barcode {
                  height: 140px;
                    width: 400px;
                 
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
                <h4 align="center">حافظه ارسال مسجلات مصلحيه من الدعم الفنى بتاريخ  <?php echo date('Y-m-d'); ?></h4>
                <button id="print"  class="btn btn-danger" onclick="myFunction()">طباعه</button>
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                             
                               <th>رقم المسجل</th>  
                               <th>الى</th>  
                                
                          </tr>  
                     <?php
                     if($result){
                       $rowcount1=mysqli_num_rows($result);
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                                
                               <td class="barcode"><?php echo $row["barcode"]; ?></td>  
                               
                                  
                                <td><?php echo $row["send_to"]; ?>
                                <br> 
                               <?php echo $row["subject"]; ?> 
                              </td>
                             

                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>
                <p> استلمت عدد  <?php echo $rowcount1; }?> مسجل لا غير  </p>
           </div>  
      </body>  
 </html>  
