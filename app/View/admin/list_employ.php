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


<section class="home hometextbool homelistmateriel">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>

            <div class="text texthome">السجل 


            </div>
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



      


        <br>
  
  <div class="searchsection">
        
      
    <form action="<?php echo URLROOT ;?>list_employes/search_employ" accept-charset="UTF-8" method="post">
        <div class="searchbar">
            <input type="text" class="searchbar__input" id="materiel" name="search" placeholder=" اللقب " dir="rtl">
            <button type="submit" class="searchbar__button" id="btnsearch">
                <i class='bx bx-search'>ابحث</i>
            </button>
        </div>
    </form>
     </div>





     
<!--  list of all employes -->

<div class="listmatriel" dir="rtl">
            <table >
                <thead>
                    <tr>
                        <th>العامل (ة) </th>
                        <th> المهنة    </th>
                        <th> تعديل </th>
                        <th>الاجرة</th> 
                         <th>التقرير</th> 
                        <th> حذف  </th>
                       

                    </tr>
                </thead>
                <tbody >


                <?php  if(isset($msg[3])){
        $employ=$msg[3];
            for ($i=0; $i <sizeof($employ) ; $i++) { 
                # code..
                $k=0;
          
        ?>

        <tr>
        <td dir="rtl"><c:out value="" /><?php echo $employ[$i]->l_name." ".$employ[$i]->f_name ?></td>
        <td><c:out value="" /><?php echo $employ[$i]->job; ?></td>
        
      
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_employes/edite?id=<?php echo $employ[$i]->id; ?>" class=" trash" style="color:#f6c038;"><i class='bx bxs-edit-alt'></i></a></td>




        <?php for ($j=0; $j < sizeof($msg[4]); $j++) { 
        if($msg[4][$j]->id == $employ[$i]->id){
             $k=1;
            ?>

        <td class="btndelete"><c:out value="" /><a style="color: green;"> <i class='bx bxs-user-check' ></i> </a> <span></span></td>

    <?php }} if($k==0){?>
      <td class="btndelete"><c:out value="" /><a href="<?php echo URLROOT ;?>list_employes/pay_month?id=<?php echo $employ[$i]->id; ?>" style="color: red;"> <i class='bx bxs-user-x' ></i> </a> <span></span></td>




<?php }?>





        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_employes/list_pay?id=<?php echo $employ[$i]->id; ?>" class=" trash" style="color:#1C94AC;"><i class='bx bxs-receipt'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_employes/delete?id=<?php echo $employ[$i]->id; ?>" class=" trash"><i class='bx bx-trash'></i></a></td>
        
        </tr>


        <?php }} ?>
            
        </tbody>
            </table>
        </div>
        </div>


</section>



</body>
</html>