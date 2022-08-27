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
<?php  require_once"header.php";?>
<section class="home homeAddmatriel">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>
            <div class="text texthome"> المقتنيات</div>
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

    <div class="containerMateriel" dir="rtl">
        <label for="show" class="close-btn fas fa-times" title="close"></label>
        <div class="text">
            المنتج
        </div>
   
        <?php if($msg[0]=="addmateriel"){ ?>
    
            <div class="data">
                <label>اسم المنتج  </label>
                <input type="text" dir="rtl" required id="name_materiel"  value="">
            </div>
            <div class="data">
                <label>الكمية  </label>
                <input type="number"  required id="nbr"  placeholder="" >
            </div>
            <div class="data">
                <label>السعر </label>
                <input type="number"  step="0.01"  required id="prix"   placeholder="" >
            </div>

            <div class="btn">
                <div class="inner"></div>
                <button type="submit" onclick="addmateriel()" >حفظ</button>
            </div>
           

          <?php } ?>
           <?php if($msg[0]=="editemateriel"){ ?>
                        
                        
                 <input type="hidden" value="" id="id_materiel">       
                        
            <div class="data">
                <label>اسم المنتج  </label>
                <input type="text" dir="rtl" required id="name_materiel2"  value="">
            </div>
            <div class="data">
                <label>الكمية  </label>
                <input type="number"  required id="nbr2" value="" placeholder="" >
            </div>
            <div class="data">
                <label>السعر </label>
                <input type="number" step="0.01"   required id="prix2"  value=""  placeholder="" >
            </div>

            <div class="btn">
                <div class="inner"></div>
                <button type="submit" onclick="editeMateriel()">حفظ</button>
            </div>
           

                        
          
          
       <?php } ?>
          
          
    </div>
</div>



</div>




</section>
    
</body>
</html>