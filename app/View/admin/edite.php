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


<?php if(isset($msg[5]) && $msg[5]!="error"){
      
  
      ?>
          <script>  showBanner('.banner.success');</script> 
          <?php  } if(isset($msg[5]) && $msg[5]=="error"){?>

            <script>    showBanner('.banner.error'); </script> 

          <?php } ?>
  

          <div class="banners-container" dir="ltr">
  <div class="banners" dir="ltr">
  <div class="banner error">
      <div class="banner-message" dir="ltr">
      <span class="banner-icon">
      <i class='bx bx-error-circle' style="height:48px ; width:48px;"></i>
      </span>
      <?php if(isset($msg[5]) && $msg[5] =="error"){
      
      echo $msg[6]; }
       ?>
            </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
    <div class="banner success">
      <div class="banner-message" dir="ltr">
       <span class="banner-icon">
    <i class='bx bx-check'></i>
      </span>
      
      <?php if(isset($msg) && $msg[5] !="error"){
      
     echo $msg[5]; }
      ?>  </div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
   
  </div>
</div>





<!-- edite class if msg0=class  -->
<?php if(isset($msg) && $msg[0]=="edite_class"){?>
  <section class="home">
<div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الاقسام</div>
      </div>

    <div class="titlenote">
            <a href="<?php echo URLROOT ;?>sections" class="btnleft"> <i class='bx bx-reply'></i>
            </a>
  <span>الغاء</span>
    </div>
<div class="addclass">
        <br><br>
        <div class="titleform">

         <h2 class="addperson">  تعديل القسم  </h2>
        </div>
     <br>
     
            <!-- fomullaire-->
            <div class="student">
            <form action="<?php echo URLROOT ;?>sections/update_class" method="post" dir="rtl">
                  <div class="contentstudent">
                <input type="hidden" name="class_id" value="<?php echo $msg[1]->id;?>">
                
                <div class="user-input1">
                    <label>اسم القسم </label>
                   <input type="text" required name="class_name" value="<?php echo $msg[1]->n_class;?>" placeholder="  اسم القسم  ">     
                  </div>
                   

                  <div class="user-input4">
                    <label>عدد الحصص </label>
                   <input type="number" required name="session_nbr" value="<?php echo $msg[1]->nbr_session;?>"  min ="1" max="31" placeholder="    عدد الحصص في الشهر ">     
                  </div>

                 
                  
                  <div class="user-input4">
                    <label>المبلغ الشهري </label>
                   <input type="number" required name="price" value="<?php echo $msg[1]->price;?>" step="0.001" placeholder="    المبلغ الشهري ">     
                  </div>
           
                
                  <div class="user-input" placeholder="">
                    <label>الاستاذ    المسؤول</label>
                   <select name="teacher_class"> 
                    <option value="0" <?php if($msg[1]->teacher_id==0){echo"selected";} ?>> ليس بعد</option>


                    <?php 
 require_once "../app/Models/section.class.php";
      
 $postmodel=new section;

 $teacher_class=$postmodel->get_teacher_class();


 for ($i=0; $i < sizeof($teacher_class); $i++) { 
  

 


?>
                    <option value="<?php echo $teacher_class[$i]->id ?>" <?php if($teacher_class[$i]->id ==$msg[1]->teacher_id){echo"selected";} ?>>  <?php echo $teacher_class[$i]->f_name.$teacher_class[$i]->l_name?>   </option>

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
    </section>


<?php }?>




<!-- edtite student  !--->
<?php if(isset($msg) && $msg[0]=="edite_student"){?>

  <section class="home">
<div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">السجل </div>
      </div>


      <div class="titlenote">
            <a href="<?php echo URLROOT ;?>list_students" class="btnleft"> <i class='bx bx-reply'></i>
            </a>
  <span>الغاء</span>
    </div>



            <!-- fomullaire-->
          <div class="student">
            <form action="<?php echo URLROOT ;?>list_students/update" method="post" dir="rtl">
                  <div class="contentstudent">

                
                <div class="user-input1">
                    <label>الاسم</label>
                   <input type="text" required name="f_name" value="<?php echo $msg[1][0]->f_name;?>" placeholder="  اسم التلميذ  ">     
                  </div>
                  <div class="user-input2">
                    <label>اللقب</label>
                   <input type="text" required name="l_name" value="<?php echo $msg[1][0]->l_name;?>" placeholder="  اللقب التلميذ ">     
                  </div>

                  

                  <div class="user-input3">
                    <label>تاريخ الازدياد</label>
                   <input type="date" required name="date_birth" value="<?php echo $msg[1][0]->date_birth;?>" placeholder="   تاريخ ازدياد التلميذ ">     
                  </div>
               <input type="hidden" name="student_id" value="<?php echo $msg[1][0]->id;?>">
               <input type="hidden" name="parent_id"  value="<?php echo $msg[3][0]->id;?>">

                  <div class="user-input4">
                    <label>اسم الولي</label>
                   <input type="text" required name="parent_n" value="<?php echo $msg[3][0]->n_parent;?>" placeholder="      اسم ولي التلميذ ">     
                  </div>
                  
                  <div class="user-input4">
                    <label>رقم الهاتف</label>
                   <input type="number" required name="parent_nbr" value="<?php echo $msg[3][0]->numero;?>"  placeholder="  رقم هاتف الولي ">     
                  </div>
                 




           <?php 
             if(isset($msg[2])){
            
              if($_SESSION['id_year_scolaire']){
                $year_id= $_SESSION['id_year_scolaire'];
         
           
               require_once "../app/Models/section.class.php";
                
               $postmodel=new section;
         
               $all_class=$postmodel->get_all_class($year_id);
              for ($j=0; $j <sizeof($msg[2]); $j++) { 
                # code...
             
           ?>






   
                  <div class="user-input" placeholder="">
                    <label>القسم <?php echo$j+1;?>  </label>
                   <select name="student_class<?php echo$j;?>"> 
                   

                   <?php 
       

        
      for ($i=0; $i <sizeof($all_class); $i++) { 
       
     
      
      ?>

                    <option value="<?php echo $all_class[$i]->id ?>"  <?php
                    
                   
                    if($all_class[$i]->id ==$msg[2][$j]->class_id){
                     
                      echo"selected";
                   
                    }?>> <?php echo $all_class[$i]->n_class ?></option>
                   

                    <?php } ?>
                  

                    </select>     
                  </div>
                 

          <?php  } }
            }
           
         
            ?>







                   
                </div>
                  <div class="submit">
                    <input type="submit" value="تعديل">
                  </div>

            </form>
         





          </div>

          </section>
       


<?php   }  ?>

<!--  inscription student in other class -->


<!-- edite class if msg0=class  -->
<?php if(isset($msg) && $msg[0]=="add_class"){?>
  <section class="home">
<div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">السجل</div>
      </div>

    <div class="titlenote">
            <a href="<?php echo URLROOT ;?>list_students" class="btnleft"> <i class='bx bx-reply'></i>
            </a>
  <span>الغاء</span>
    </div>
<div class="addclass">
        <br><br>
        <div class="titleform">

         <h2 class="addperson">  اظافة التسجيل في  قسم اخر  </h2>
        </div>
     <br>
     
            <!-- fomullaire-->
            <div class="student">
            <form action="<?php echo URLROOT ;?>list_students/inscript" method="post" dir="rtl">
                  <div class="contentstudent">
                <input type="hidden" name="student_id" value="<?php echo $msg[2][0]->id;?>">
                
                <div class="user-input1">
                    <label>اسم التلميذ </label>
                   <input type="text" required name="f_name" value="<?php echo $msg[2][0]->f_name;?>" placeholder="  اسم القسم  ">     
                  </div>
                   

                  <div class="user-input4">
                    <label> اللقب </label>
                   <input type="text" required name="l_name" value="<?php echo $msg[2][0]->l_name;?>"  >     
                  </div>

                 
                  
                 
           
                
                  <div class="user-input" placeholder="">
                    <label>القسم    </label>
                   <select name="class_nbr"> 


                    <?php 
 



 for ($i=0; $i < sizeof($msg[1]); $i++) { 
  

 


?>
                    <option value="<?php echo $msg[1][$i]->id ?>">  <?php echo $msg[1][$i]->n_class;?>   </option>

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
    </section>


<?php }?>



</body>
</html>