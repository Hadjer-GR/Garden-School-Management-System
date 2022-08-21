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


<script>
      // banner

  const showBanner = (selector) => {
        	  hideBanners();
        	  // Ensure animation plays even if the same alert type is triggered.
        	  requestAnimationFrame(() => {
        	    const banner = document.querySelector(selector);
        	    banner.classList.add("visible");
        	  });
        	};

        	const hideBanners = (e) => {
        	  document
        	    .querySelectorAll(".banner.visible")
        	    .forEach((b) => b.classList.remove("visible"));
        	};
        	
       

    </script>

<?php  require_once"header.php";?>


   
<section class="home hometextbool">
      
      <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الحضور</div>
      </div>

      <?php if(isset($msg[1]) && $msg[1]!="error"){
      
  
      ?>
          <script>  showBanner('.banner.success');</script> 
          <?php  } if(isset($msg[1]) && $msg[1]=="error"){?>

            <script>    showBanner('.banner.error'); </script> 

          <?php } ?>




          <div class="banners-container" dir="ltr">
  <div class="banners" dir="ltr">
  <div class="banner error">
      <div class="banner-message" dir="ltr">
      <span class="banner-icon">
      <i class='bx bx-error-circle' style="height:48px ; width:48px;"></i>
      </span>
      <?php if(isset($msg[1]) && $msg[1] =="error"){
      
      echo $msg[2]; }
       ?>
            </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
    <div class="banner success">
      <div class="banner-message" dir="ltr">
       <span class="banner-icon">
    <i class='bx bx-check'></i>
      </span>
      
      <?php if(isset($msg) && $msg[1] !="error"){
      
     echo $msg[1]; }
      ?>  </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
   
  </div>
</div>






<div class="titlenote">
            <a href="<?php echo URLROOT ;?>attandances" class="btnleft"> <i class='bx bx-reply'></i>
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
        <br>
        <div class="contentclass">

   <div class="infoclass method">
    <a class="method1 choosemethod" id="method_1" >  <span class="imethod1"><i class='bx bx-check'>يدوي</i></span></a>
    <a  class="method2" id="method_2"> تلقائي</a>
   </div>


    <!-- list Student -->
    <div class="listmatriel" dir="rtl">
            <table >
                <thead>
                    <tr>
                        <th>التلميذ (ة) </th>
                        <th> الحضور    </th>
                        <th>   &nbsp;&nbsp;&nbsp; </th>
                        <th>&nbsp; &nbsp;&nbsp;&nbsp;</th>
                        <th>اظافة الحضور  </th>
                       

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
      $date_t=date("Y")."-".date("m")."-".date("d")-1;
      $attandace=$postmodel->get_attandance($class_id,$date_t);
     
    
      for ($i=0; $i < sizeof($student); $i++) { 
        $k=0;
        
      
      ?>
           
        <tr>
        <td><c:out value="" /><?php echo $student[$i]->f_name." ".$student[$i]->l_name  ?> </td>

     <?php for ($j=0; $j < sizeof($attandace); $j++) { 
        if($attandace[$j]->student_id == $student[$i]->id){
             $k=1;
            ?>

        <td><c:out value="" /><a style="color: green;"><i class='bx bxs-user-check' ></i> </a> <span></span></td>
    <?php }} if($k==0){?>
        <td><c:out value="" /><a style="color: red;"><i class='bx bxs-user-x' ></i></a></td>


<?php }?>


        <td><c:out value="" />&nbsp;</td>
        <td>&nbsp; </td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>attandances/insert_att?student_id=<?php echo $student[$i]->id ?>" class=" trash"><i class='bx bx-plus-medical'></i></a></td>
        </tr>
               



<?php }}?>

                    
                </tbody>
            </table>
        </div>
        </div>












</section>
 

</body>
</html>