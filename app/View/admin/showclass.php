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
      <?php if(isset($msg[4]) && $msg[4]!="error"){
      
  
      ?>
          <script>  showBanner('.banner.success');</script> 
          <?php  } if(isset($msg[4]) && $msg[4]=="error"){?>

            <script>    showBanner('.banner.error'); </script> 

          <?php } ?>
                    


          <div class="banners-container" dir="ltr">
  <div class="banners" dir="ltr">
  <div class="banner error">
      <div class="banner-message" dir="ltr">
      <span class="banner-icon">
      <i class='bx bx-error-circle' style="height:48px ; width:48px;"></i>
      </span>
      <?php if(isset($msg[4]) && $msg[4] =="error"){
      
      echo $msg[5]; }
       ?>
            </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
    <div class="banner success">
      <div class="banner-message" dir="ltr">
       <span class="banner-icon">
    <i class='bx bx-check'></i>
      </span>
      
      <?php if(isset($msg[4]) && $msg[4] !="error"){
      
     echo $msg[4]; }
      ?>  </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
   
  </div>
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
                        <th>   &nbsp;</th>
                        <th> الحضور</th>
                        <th>الغاء الاشتراك  </th>
                       

                    </tr>
                </thead>
                <tbody dir="rtl">
                
                <?php 
       
       if($_SESSION['id_year_scolaire'] && $_SESSION['class_id']){
       $year_id= $_SESSION['id_year_scolaire'];
       $class_id=$_SESSION['class_id'];
       $month_nbr=date("m");
      require_once "../app/Models/showclass.class.php";
      
      $postmodel=new showclass;
       
      $student=$postmodel->get_student($class_id,$year_id);
      $student_month=$postmodel->get_student_month($class_id,$month_nbr,$year_id);
     
    
      for ($i=0; $i < sizeof($student); $i++) { 
        $k=0;
        
      
      ?>
           
        <tr>
        <td><c:out value="" /><?php echo $student[$i]->f_name." ".$student[$i]->l_name  ?> </td>

     <?php for ($j=0; $j < sizeof($student_month); $j++) { 
        if($student_month[$j]->student_id == $student[$i]->id){
             $k=1;
            ?>

        <td class="btndelete"><c:out value="" /><a style="color: green;"> <i class='bx bxs-user-check' ></i> </a> <span></span></td>

    <?php }} if($k==0){?>
        <td><c:out value="" /><a href="<?php echo URLROOT ;?>showclasses/pay?student_id=<?php echo $student[$i]->id ?>" style="color: red;"><i class='bx bxs-user-x' ></i></a></td>




<?php }?>
        <td>&nbsp;</td>
        <td><c:out value="" />5</td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>showclasses/delete?student_id=<?php echo $student[$i]->id ?>" class=" trash"><i class='bx bx-trash'></i></a></td>
        </tr>
               



<?php }}?>

                    
                </tbody>
            </table>
        </div>
        </div>
</section>

</body>
</html>