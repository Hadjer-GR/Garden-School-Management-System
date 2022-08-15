
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <section class="home ">
  <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الاقسام</div>
      </div>
      <?php if(isset($data) && ($data=="insertyear" || $data="insertclass")){
        
      
        ?>
            <script>  showBanner('.banner.success');</script> 
            <?php } ?>
                      
<div class="banners-container" dir="ltr">
  <div class="banners" dir="ltr">
   
    <div class="banner success">
      <div class="banner-message" dir="ltr">
       <span class="banner-icon">
    <i class='bx bx-check'></i>
      </span>
      
       تمت الاظافة بنجاح</div>
      <div class="banner-close" onclick="hideBanners()"><i class='bx bx-x'></i></div>
    </div>
   
  </div>
</div>

      <div class="contentbox">

     
    <div class="box box-down blue">
      <h2>قسم تحضيري</h2>
      <p><span>
        اسم الاستاذ
      </span>
    <span>غراب هاجر</span></p>
  <button>
    عرض
  </button>
    </div>
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
                   <input type="text" required name="class_n" placeholder="  اسم القسم  ">     
                  </div>
                   

                  <div class="user-input4">
                    <label>عدد الحصص </label>
                   <input type="number" required name="session_nbr"  min ="1" max="7" placeholder="    عدد الحصص في الاسبوع ">     
                  </div>

                 
                  
                  <div class="user-input4">
                    <label>المبلغ الشهري </label>
                   <input type="number" required name="price" step="0.001" placeholder="    المبلغ الشهري ">     
                  </div>
 
                
                  <div class="user-input" placeholder="">
                    <label>الاستاذ    المسؤول</label>
                   <select name="teacher_class"> 
                    <option value="0"> ليس بعد</option>
                    <option value="1">غراب هاجر  </option>

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
    <div class="addclass">
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