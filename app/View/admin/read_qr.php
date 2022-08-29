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



<section class="home " >
  <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الحضور</div>
      </div>

      <br><br>
      <div class="infoclass method" dir="rtl">
    <a  href="<?php echo URLROOT ;?>attandances" class="method1 choosemethod"  >  <span class="imethod1"><i class='bx bx-check'>يدوي</i></span></a>
   </div>


   <?php 
if(isset($_POST["sumbit"])){
    echo "hadjergggg";
}

?>



   <div class="searchsection" style="margin-top:14vh ;">
        
      
    <form action="<?php URLROOT?>sections/read_card"  method="post" class="form" name="myForm2">
        <div class="searchbar">
            <input type="text" class="searchbar__input"  name="text"  dir="rtl">
            <input type="submit">
        </div>
    </form>
     </div>

</section>


<script type="text/javascript" language="javascript">
    

    	  
 </script>




</body>
</html>