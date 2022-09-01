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

<section class="home hometextbool homelistmateriel">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>

            <div class="text texthome">السجل 


            </div>
        </div>

       <br>
  <div class="searchsection">
        
      
    <form action="<?php echo URLROOT ;?>list_students/search_student" accept-charset="UTF-8" method="post">
        <div class="searchbar">
            <input type="text" class="searchbar__input" id="materiel" name="search" placeholder=" اللقب " dir="rtl">
            <button type="submit" class="searchbar__button" id="btnsearch">
                <i class='bx bx-search'>ابحث</i>
            </button>
        </div>
    </form>
     </div>

<!--  list of all student -->

     <div class="listmatriel" dir="rtl">
            <table >
                <thead>
                    <tr>
                        <th>التلميذ (ة) </th>
                        <th> تعديل    </th>
                        <th> البطاقة    </th>

                        <th> التسجيل </th>
                      
                        <th>التقرير   </th>
                       

                    </tr>
                </thead>
                <tbody dir="rtl">
      <?php  if(isset($msg[3])){
        $student=$msg[3];
            for ($i=0; $i <sizeof($student) ; $i++) { 
                # code...
          
        ?>


        <tr>
        <td><c:out value="" /><?php echo $student[$i]->l_name." ".$student[$i]->f_name ?> </td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/edite?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#f6c038;"><i class='bx bxs-edit'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/carte?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#f6c038;"><i class='bx bxs-id-card'></i></a></td>

        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/add_class?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#21CBAE;"><i class='bx bxs-customize'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/rapport?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#1C94AC;"><i class='bx bxs-receipt'></i></a></td>

        </tr>
            
        <?php }} ?>
        

        </tbody>
            </table>
        </div>
        </div>




</section>

<?php if(isset($msg[7]) && $msg[7]!="error"){
      
  
      ?>
          <div id="studentcard"  style="z-index:0;">

<div class="contentimg">
  
<img class="dd" src="<?php echo URLROOT ;?>/image/icon3.png">

<img src="<?php echo URLROOT ;?>/image/card1.png">
</div>
       


 <div class="general" dir="rtl">
  <br>
 <h1 style="font-size:25px;">روضة الامل</h1>

          <br>
          
          <p dir="rtl" style="font-size:0.7em ; font-weight:600;">جمعية العلماء المسلمين الجزائرين  
        
        شعبة ورقلة 
<br>
        النادي التربوي روضة الامل 
      </p>
          <div>

            <h4> <span>--</span><?php echo $msg[7][0] ; ?> <?php echo $msg[7][1] ; ?> <span>--</span></h4>
          </div>
         
          <div> 
          <div>تاريخ التسجيل : </div>
              <span class="more"><?php echo $msg[7][2] ; ?></span>
</div>
        </div>



</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script  src="<?php echo URLROOT ;?>js/printThis.js"></script>

<script>

function printcard() { 
        $('#studentcard').printThis({
            importCSS: true,
            importStyle: true,
            loadCSS: "http://localhost/school_system/css/styleCard.css"
        });
     };

     printcard();
</script>


<?php

} ?>




</body>
</html>