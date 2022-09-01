<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal</title>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/materiel.css">

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




<section class="home homeAddmatriel">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>
            <div class="text texthome"> المقتنيات</div>
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
            <a href="<?php echo URLROOT ;?>materiel" class="btnleft"> <i class='bx bx-reply'></i>
              </a>
           <?php if($msg[0]=="addmateriel") {?>
               
                     <span>
                            اظافة منتج
                      </span>
                     <?php }if($msg[0]=="editemateriel") {?>
                   <span>
                             تعديل المنتج 
                      </span>
           <?php } ?>
         
        </div>


        <div class="addmateriel">

<div class="center">
<?php if($msg[0]=="addmateriel"){ ?>
    <form class="containerMateriel" dir="rtl" method="POST" action="<?php echo URLROOT ;?>materiel/materielAdd">
        <label for="show" class="close-btn fas fa-times" title="close"></label>
        <div class="text">
            المنتج
        </div>
   
       
    
            <div class="data">
                <label>اسم المنتج  </label>
                <input type="text" dir="rtl" name="name" required id="name_materiel"  value="">
            </div>
            <div class="data">
                <label>الكمية  </label>
                <input type="number"  required name="nbr" id="nbr"  placeholder="" >
            </div>
            <div class="data">
                <label>السعر </label>
                <input type="number"  step="0.01" name="price" required id="prix"   placeholder="" >
            </div>

            <div class="btn">
                <div class="inner"></div>
                <button type="submit"  >حفظ</button>
            </div>
           

          <?php } ?>
           <?php if($msg[0]=="editemateriel"){ ?>
            <form class="containerMateriel" dir="rtl" method="POST" action="<?php echo URLROOT ;?>materiel/update">
        <label for="show" class="close-btn fas fa-times" title="close"></label>
        <div class="text">
            المنتج
        </div>      
                        
                 <input type="hidden" value="" id="id_materiel">       
                        
            <div class="data">
                <label>اسم المنتج  </label>
                <input type="text" dir="rtl"  name="name"required id="name_materiel2"  value="<?php  echo $msg[2][0]->name?>">
            </div>
            <div class="data">
                <label>الكمية  </label>
                <input type="number"  required name="nbr" id="nbr2" value="<?php  echo $msg[2][0]->nbr?>" placeholder="" >
            </div>
            <div class="data">
                <label>السعر </label>
                <input type="number" step="0.01"  name="price" required id="prix2"  value="<?php  echo $msg[2][0]->price;?>"  placeholder="" >
            </div>
         <input type="hidden" name="id" value="<?php  echo $msg[2][0]->id?>">
            <div class="btn">
                <div class="inner"></div>
                <button type="submit" >حفظ</button>
            </div>
           

                        
          
          
       <?php } ?>
          
          
    </form>
</div>



</div>




</section>
    
</body>
</html>