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
    
<section class="home hometextbool">
      
      <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الاقسام</div>
      </div>
      



        <div class="titlenote">
            <a href="<?php echo URLROOT ;?>sections" class="btnleft"> <i class='bx bx-reply'></i>
            </a>


            <?php if(isset($msg)){
      
  
      ?>

            <span>
            <?php echo $msg; ?>
            </span>

   <?php }?>

        </div>

</section>

</body>
</html>