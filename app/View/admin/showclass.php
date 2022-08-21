<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal</title>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">
         <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">
         <script defer src="<?php echo URLROOT ;?>js/script.js"></script>
    <script defer src="<?php echo URLROOT ;?>js/mobilescreen.js"></script>
</head>
<body>

<?php  require_once"header.php";?>
    
<section class="home hometextbool">
      
      <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الاقسام</div>
      </div>
      



        <div class="titlenote">
            <a href="<?php echo URLROOT ;?>sections" class="btnleft"> <i class='bx bx-reply'></i>
            </a>


            <?php if(isset($msg[0])){
      
  
      ?>

            <span>
            <?php echo $msg[0]; ?>
            </span>

   <?php }?>

        </div>


        <br>
        <br>

        <!-- List student -->
      <div class="contentclass">

       <div class="infoclass"  dir="rtl">
       <div class="info">
        <div class="icon"><i class='bx bxl-paypal money'></i></div>
       
        <div> <?php if(isset($msg[1])){
        echo$msg[1];
       }
      ?><span>DA</span> </div>
       </div>
       <div class="info">
       <div class="icon"><i class='bx bx-group people'></i></div>
       <div>     <?php if(isset($msg[2])){
        echo$msg[2];
       }
      ?><span>تلميذ (ة)</span></div>

       </div>
       <div class="info">
      
       <div class="icon"><i class='bx bx-pin notpay'></i></div>
       <div>    <?php if(isset($msg[3])){
        echo$msg[3];
       }
      ?> <span> لم يدفع بعد</span></div>
       </div>




       </div>
    <!-- list Student -->
        <div class="listmatriel" dir="rtl">
            <table >
                <thead>
                    <tr>
                        <th>التلميذ (ة) </th>
                        <th> الاشتراك    </th>
                        <th>   الحضور </th>
                        <th>&nbsp;</th>
                        <th>الغاء الاشتراك  </th>
                       

                    </tr>
                </thead>
                <tbody dir="rtl">
                
                
             
                        <tr>
                        <td><c:out value="" />غراب رانيا</td>
                        <td><c:out value="" /><span> </span> <span></span></td>
                        <td><c:out value="" />5</td>
                        <td>&nbsp; </td>
                        <td class="btndelete">    <a href="" class=" trash"><i class='bx bx-trash'></i></a></td>
                      

                    </tr>
               
                    
                </tbody>
            </table>
        </div>
        </div>
</section>

</body>
</html>