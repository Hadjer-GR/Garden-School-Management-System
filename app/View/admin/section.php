
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Amal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">
         <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">
         <script defer src="<?php echo URLROOT ;?>js/script.js"></script>
    <script defer src="<?php echo URLROOT ;?>js/mobilescreen.js"></script>
    </head>
    <body>

    
<?php 

if($_SESSION["type"]=="admin"){
  require_once "header.php";

}else{
  require_once "sec_header.php";

}

?>

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

  <section class="home ">
  <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الاقسام</div>
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

      <div class="contentbox"  >



      <!-- get all the class -->
      
      <?php 
       
       if( isset($_SESSION['id_year_scolaire'])){


        
       $year_id= $_SESSION['id_year_scolaire'];
      require_once "../app/Models/section.class.php";
      
      $postmodel=new section;

      $all_class=$postmodel->get_all_class($year_id);

   
      for ($i=0; $i < sizeof($all_class); $i++) { 
       
     
      
      ?>
 <div class="box box-down blue" dir="rtl">
      <h2> <?php echo $all_class[$i]->n_class ?></h2>
      <p><span>
     اسم الاستاذ (ة ):
      </span>
    <span> <?php echo $all_class[$i]->f_name." ".$all_class[$i]->l_name?>  </span></p>
    <br>
  
  <div class="class_btn">
                         
                     
   <a href="<?php echo URLROOT ;?>sections/edite_class?class_id= <?php echo $all_class[$i]->id ?>" > <i class='bx bx-edit'></i></a>
    <a href="<?php echo URLROOT ;?>sections/emploi?id=<?php echo $all_class[$i]->id ?>" class="trash"><i class='bx bx-grid'></i></a>
                  
                    </div>
  <a  class="viewclass" href="<?php echo URLROOT ;?>Showclasses?class_id= <?php echo $all_class[$i]->id ?>">
    عرض
  </a>
    </div>


     <?php } }?>
   

  









    </div>
    <div class="addclass">
        <h2>اظافة قسم</h2>
     <br>
     
            <!-- fomullaire-->
            <div class="student">
            <form action="<?php echo URLROOT ;?>sections/addclass" method="post" dir="rtl">
                  <div class="contentstudent">

                
                <div class="user-input1">
                    <label>اسم القسم </label>
                   <input type="text" required name="class_name" placeholder="  اسم القسم  ">     
                  </div>
                   

                 
                 
                  
                  <div class="user-input4">
                    <label>المبلغ الشهري </label>
                   <input type="number" required name="price" step="0.001" placeholder="    المبلغ الشهري ">     
                  </div>
           
                
                  <div class="user-input" placeholder="">
                    <label>الاستاذ    المسؤول</label>
                   <select name="teacher_class"> 
                    <option value="0"> ليس بعد</option>


                    <?php 
 require_once "../app/Models/section.class.php";
      
 $postmodel=new section;

 $teacher_class=$postmodel->get_teacher_class();


 for ($i=0; $i < sizeof($teacher_class); $i++) { 
  

 


?>
                    <option value="<?php echo $teacher_class[$i]->id ?>">  <?php echo $teacher_class[$i]->f_name.$teacher_class[$i]->l_name?>   </option>

<?php  }?>




                    </select>     
                  </div>
                 
                </div>
                  <div class="submit">
                    <input type="submit" value="اظافة">
                  </div>

            </form>
         





          </div>
        
    </div>
    <br><br>
    <div class="addclass"     
    <?php  if(isset( $_SESSION["id_year_scolaire"])  ) {
      ?>
    
    style="display:none;"
    
    <?php } ?>
    >
        <h2>اظافة العام الدراسي</h2>
     <br>
     
            <!-- fomullaire-->
            <div class="student">
            <form action="<?php echo URLROOT ;?>sections/scolaire_y" method="post" dir="rtl">
                  <div class="contentstudent">

             
                  <div class="user-input4">
                    <label> من </label>
                   <input type="date" required name="start_y"  >     
                  </div>

                 
                  
                  <div class="user-input4">
                    <label> الى </label>
                   <input type="date" required name="end_y"   >     
                  </div>
 
                
                 
                </div>
                  <div class="submit">
                    <input type="submit" value="اظافة">
                  </div>

            </form>
         





          </div>
        
    </div>


   
  </section>


    </body>
</html>