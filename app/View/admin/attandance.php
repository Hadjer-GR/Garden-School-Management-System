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

<section class="home " >
  <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الحضور</div>
      </div>


    <br><br>
      <div class="infoclass method" dir="rtl">
    <a  href="<?php echo URLROOT ;?>attandances/read_qr" class="method1 choosemethod" id="method_1" >  <span class="imethod1"><i class='bx bx-check'>تلقائي</i></span></a>
   </div>
      <div class="contentbox" >



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


<a  class="viewclass" href="<?php echo URLROOT ;?>attandances/att_class?class_id= <?php echo $all_class[$i]->id ?>">
عرض
</a>
</div>


<?php } }?>












</div>







</section>



</body>
</html>