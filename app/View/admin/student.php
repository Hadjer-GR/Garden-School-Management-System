<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT ;?>css/styleCard.css">
        <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">

        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">

         <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">
         <script defer src="<?php echo URLROOT ;?>js/script.js"></script>
    <script defer src="<?php echo URLROOT ;?>js/mobilescreen.js"></script>
    </head>
    <body>
    <?php  require_once"header.php";?>
   

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






  <section class="home" style="z-index:7;">
      <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">تسجيل</div>
      </div>

      <?php if(isset($msg[0]) && $msg[0]!="error"){
      
  
      ?>
          <script>  showBanner('.banner.success');</script> 
          <?php  } if(isset($msg[0]) && $msg[0]=="error"){?>

            <script>    showBanner('.banner.error'); </script> 

          <?php } ?>
                    


<div class="banners-container" dir="ltr">
  <div class="banners" dir="ltr">
  <div class="banner error">
      <div class="banner-message" dir="ltr">
      <span class="banner-icon">
      <i class='bx bx-error-circle' style="height:48px ; width:48px;"></i>
      </span>
      <?php if(isset($msg[0]) && $msg[0] =="error"){
      
      echo $msg[1]; }
       ?>
            </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
    <div class="banner success">
      <div class="banner-message" dir="ltr">
       <span class="banner-icon">
    <i class='bx bx-check'></i>
      </span>
      
      <?php if(isset($msg) && $msg[0] !="error"){
      
     echo $msg[0]; }
      ?>  </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
   
  </div>
</div>





<br><br>
  <div class="titleform">

  <h2 class="addperson">تسجيل التلاميذ</h2>
  </div>
    


            <!-- fomullaire-->
          <div class="student">
            <form action="<?php echo URLROOT ;?>Students/add" method="post" dir="rtl">
                  <div class="contentstudent">

                
                <div class="user-input1">
                    <label>الاسم</label>
                   <input type="text" required name="f_name" placeholder="  اسم التلميذ  ">     
                  </div>
                  <div class="user-input2">
                    <label>اللقب</label>
                   <input type="text" required name="l_name" placeholder="  اللقب التلميذ ">     
                  </div>

                  

                  <div class="user-input3">
                    <label>تاريخ الازدياد</label>
                   <input type="date" required name="date_birth" placeholder="   تاريخ ازدياد التلميذ ">     
                  </div>


                  <div class="user-input4">
                    <label>اسم الولي</label>
                   <input type="text" required name="parent_n" placeholder="      اسم ولي التلميذ ">     
                  </div>
                  
                  <div class="user-input4">
                    <label>رقم الهاتف</label>
                   <input type="number" required name="parent_nbr" placeholder="  رقم هاتف الولي ">     
                  </div>
 
                  <!--

                   <div class="user-input">
                    <label>شهادة الميلاد</label>
                   <input type="text" required name="milad" placeholder="   شهادة ميلاد التلميذ ">     
                  </div>

                  <div class="user-input">
                    <label> بطاقة التطعيم</label>
                   <input type="text" required name="ta3im"placeholder="  بطاقة التطعيم الخاصة بالتلميذ  ">     
                  </div>
                  <div class="user-input">
                    <label> صورة الشخصية</label>
                   <input type="text" required name="ta3im"placeholder="  بطاقة التطعيم الخاصة بالتلميذ  ">     
                  </div>
                  -->
                 
                  <div class="user-input" placeholder="">
                    <label>القسم   </label>
                   <select name="student_class"> 
                   

                   <?php 
       
       if($_SESSION['id_year_scolaire']){
       $year_id= $_SESSION['id_year_scolaire'];

  
      require_once "../app/Models/section.class.php";
      
      $postmodel=new section;

      $all_class=$postmodel->get_all_class($year_id);

   
      for ($i=0; $i < sizeof($all_class); $i++) { 
       
     
      
      ?>

                    <option value="<?php echo $all_class[$i]->id ?>"> <?php echo $all_class[$i]->n_class ?></option>

                    <?php } }?>



                    </select>     
                  </div>
                </div>
                  <div class="submit">
                    <input type="submit" value="اظافة">
                  </div>

            </form>
         





          </div>


         
      
    </section>
    
    <?php if(isset($msg[1]) && $msg[1]!="error"){
      
  
      ?>
          <div id="studentcard"  style="z-index:0;">

<div class="contentimg">
  
<img class="dd" src="<?php echo URLROOT ;?>/image/icon3.png">

<img src="<?php echo URLROOT ;?>/image/card1.png">
</div>
       


 <div class="general" dir="rtl">
  <br>
 <h1 style="font-size:25px;">روضة الامل</h1>

          <br>
          
          <p dir="rtl" style="font-size:0.7em ; font-weight:600;">جمعية العلماء المسلمين الجزائرين  
        
        شعبة ورقلة 
<br>
        النادي التربوي روضة الامل 
      </p>
          <div>

          <h2>  <?php echo $msg[1][2] ; ?></h2>
            <h4> <span>--</span><?php echo $msg[1][0] ; ?> <?php echo $msg[1][1] ; ?> <span>--</span></h4>
          </div>
          
          <br><br>
         
          <div> 
          <div>تاريخ التسجيل : </div>
              <span class="more"><?php echo $msg[1][3] ; ?></span>
</div>
        </div>



</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script  src="<?php echo URLROOT ;?>js/printThis.js"></script>

<script>

function printcard() { 
        $('#studentcard').printThis({
            importCSS: true,
            importStyle: true,
            loadCSS: "http://localhost/school_system/css/styleCard.css"
        });
     };

     printcard();
</script>


 
<?php

} ?>

        
  </section>

    </body>
</html>