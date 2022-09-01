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


<section class="home homematriel ">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>
            <div class="text texthome"> المقتنيات</div>
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








        <div class="contentetud">
            <div class="holder">

                <div class="holde1 note">
                    <a href="<?php echo URLROOT ;?>materiel/addMateriel">&nbsp;اظافة مقتنيات&nbsp;&nbsp; <br>
                    <i class='bx bxs-store-alt'></i></a>
                        <br>

                </div>
                <div class=" holde1 note">
                    <a href="<?php echo URLROOT ;?>materiel/list">&nbsp;&nbsp;سجل المقتنيات &nbsp;&nbsp; <br>
                        <i class='bx bx-receipt'></i></a> </div>
                <div class="holde1 textbook" >
                    <a href="#" > &nbsp;&nbsp;السعر  <br>

                        <div class="price">
                            <div><?php  if(isset($msg[3])){ echo $msg[3][0]->spending_materiel;}?></div>
                            <span style="color: #161d34 !important;"> &nbsp;&nbsp;DA </span>

                        </div>
                    </a>
                </div>


            </div>
            <!-- design schedule of the student -->
            <div class="text textschedule"> <span> مقتنيات الشهر  </span> </div>
            <div class="listmatriel">
                <table dir="rtl">
                    <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>الكمية</th>
                            <th>تاريخ الشراء</th>
                            <th>السعر الاجمالي</th>
                            <th>تعديل</th>
                            <th> حذف</th>

                        </tr>
                    </thead>
                    <tbody>
                 
              <?php 
               if(isset($msg[2]) && $msg[2] != null){
                $materiel[0]=$msg[2];

   
              for ($i=0; $i < sizeof($msg[2]); $i++) { 
              
              ?>       
                    
                        <tr>
                            <td><?php echo $materiel[0][$i]->name;?></td>
                            <td><?php echo $materiel[0][$i]->nbr;?></td>
                            <td><?php echo $materiel[0][$i]->date_m;?></td>
                            <td dir="ltr" ><span><?php echo ($materiel[0][$i]->price)*($materiel[0][$i]->nbr);?></span> <span>DA</span> </td>
                            <td class="edite"><a href="<?php echo URLROOT ;?>materiel/edite?id=<?php echo $materiel[0][$i]->id;?>" class="editeProduct"><i class='bx bx-edit'></i></a></td>
                            <td class="delete"><a href="<?php echo URLROOT ;?>materiel/delete?id=<?php echo $materiel[0][$i]->id;?>" class="deleteProduct"><i class='bx bx-trash'></i></a>
                            </td>

                        </tr>
                         
           <?php }}?>
           
                    </tbody>
                </table>
            </div>

        </div>
    </section>

</body>
</html>