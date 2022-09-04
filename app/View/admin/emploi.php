<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal</title>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/table.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/eventSchedule.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/table.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">

        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">
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



<section class="home homeetud table_teacher">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>

            <div class="text texthome">الاقسام</div>
        </div>
        <div class="contentetud">
   <br>
        <div class="titlenote">
            <a href="<?php echo URLROOT ;?>sections" class="btnleft"> <i class='bx bx-reply'></i>
            </a>


            <span>
                البرنامج
            </span>

  

        </div>
            <div class="container">
                <div class="row">
                    <div class="col-12" dir="rtl">
                        <div class="row day-columns">
                        <div class="day-column">
                                <div class="day-header">السبت</div>
                                <div class="day-content">
<?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="السبت"){ ?>

                                   
    <div class="event gray">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>
                                </div>
                            </div>
                            <div class="day-column">
                                <div class="day-header">الاحد</div>
                                <div class="day-content">
                                    
                                
                                <?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="الاحد"){ ?>

                                     <div class="event navy">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>


                                </div>
                            </div>
                            <div class="day-column">
                                <div class="day-header">الاثنين</div>
                                <div class="day-content">
     
                                <?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="الاثنين"){ ?>

                                     <div class="event math">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>
                                </div>
                            </div>
                            <div class="day-column">
                                <div class="day-header">الثلاثاء</div>
                                <div class="day-content">
     
                                <?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="الثلاثاء"){ ?>

                                     <div class="event sport">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>
                                </div>
                            </div>
                            <div class="day-column">
                                <div class="day-header">الاربعاء</div>
                                <div class="day-content">
     
                                <?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="الاربعاء"){ ?>

                                     <div class="event arabic">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>

                                </div>
                            </div>
                            <div class="day-column">
                                <div class="day-header">الخميس</div>
                                <div class="day-content">
     
                                <?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="الخميس"){ ?>

                                     <div class="event navy">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>


                                </div>
                            </div>
                            <div class="day-column">
                                <div class="day-header">الجمعة</div>
                                <div class="day-content">
     
                                <?php if(isset($msg[2])){ for ($i=0; $i <sizeof($msg[2]) ; $i++) { 
?>
  <?php if($msg[2][$i]->day=="الجمعة"){ ?>

                                     <div class="event navy">
                                        <div class="eventtableclose">
                                          <a href="<?php echo URLROOT ;?>sections/delete_emploi?id=<?php echo $msg[2][$i]->id; ?>">
                                            <span>
                                              <i class='bx bx-x btnclosewritelesson'></i>
                                            </span>
                                            </a>
                                        </div>
                                        <span ><?php echo "القاعة: ".$msg[2][$i]->salle; ?>  </span>
                                        <footer>
                                            <span>
                                            <?php echo $msg[2][$i]->start_t; ?>
                                            </span>
                                            <br>
                                            <span>
                                            <?php echo $msg[2][$i]->end_t; ?> 
                                            </span>
                                        </footer>
                                     </div>

<?php }}}?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

            
        <div class="addevent closeadd" id="addevent">
            
                <form   action="<?php echo URLROOT ;?>sections/emploi_group" style="box-shadow:none;" method="post">
                <div class="eventclose" id="btnclose">
                    <span>
                        <i class='bx bx-x btnclose'></i>
                    </span>
                </div> 
        <div >
    <div class="time" >
        <h4 class="eventtitle"> اليوم</h4>
        <select name="day">

            <option>السبت</option>
            <option>الاحد</option>
            <option>الاثنين</option>
            <option>الثلاثاء</option>
            <option>الاربعاء</option>
            <option>الخميس</option>
            <option>الجمعة</option>

        </select>
    </div>
    <div class="time" >
        <h4 class="eventtitle">بداية الحصة</h4>
        <select name="start_t">
         <?php  for ($i=8; $i <= 21; $i++) { 

         ?>
            <option ><?php echo $i.":00";?></option>
            <?php } ?>
        </select>
    </div>
    <div class="time" >
        <h4 class="eventtitle"> نهاية الحصة </h4>
        <select name="end_t">
        <?php  for ($i=9; $i <= 22; $i++) { 

?>
   <option ><?php echo $i.":00";?></option>
   <?php } ?>
            
        </select>
    </div>
   
    <div class="" >
        <h4 class="eventtitle">القاعة :</h4>
        <input type="number" required name="salle">
    </div>
   </div>
  
<br><br>
<div dir="rtl">

    <input type="submit" value="اظافة" class="saveEvent">
</div>


                </div>
                </form>


  <?php  if(isset($msg[0]) ){?>

    
    <div class="addevent3" dir="rtl"  style="padding-right:15px ;">
                <div class="eventclose">
                    <span>
                      <a href="<?php echo URLROOT ;?>sections/emploi"><i class='bx bx-x btnclosee'></i></a>  
                    </span>
                </div>
             

                    <div>

                        <br>
                      
                     
                        <div class="Enseignant" >
                        <?php if($msg[0]=="error"){ ?>  
                            <h4 > عذرا القاعة التي قمت باختيارها محجوزة  من      </h4>
                         <h4 > <?php echo$msg[1][0]->start_t."->".$msg[1][0]->end_t;?></h4>
                            
                            <br>
                            
                              <h5 > يرجى اختيار توقيت اخر او تغير القاعة   </h5>
                            
                            <br>
                            <?php }else{ ?>
                                <h4 > عذرا الوقت الذي قمت باختياره خاطئ      </h4>
                              <br>
                              <h5 ><?php echo $msg[1];?> </h5>

                                <?php }?>
                        </div>
                     

                    </div>

                    <div>
                      
                    </div>
               
            </div>





<?php } ?>


            <div class="change" id="addemploi">
                <a href="#"> اظافة حصة</a>

            </div>

    </section>




<script>

const addevent = document.getElementById("addevent");
const addevent2 = document.querySelector(".addevent2");
const btnclose = document.getElementById("btnclose");
const container = document.getElementById("container");
const btnclosee = document.querySelector(".btnclosee");
const addemploi = document.getElementById("addemploi");



console.log(addemploi);
console.log(btnclose);
addemploi.addEventListener("click", (eo) => {
  document.getElementById("addevent").classList.remove("closeadd");
});
btnclose.addEventListener("click", (eo) => {
  document.getElementById("addevent").classList.add("closeadd");
});

btnclosee.addEventListener("click", (eo) => {
  addevent2.classList.add("closeadd");
});







</script>



</body>
</html>