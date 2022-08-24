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

<section class="home hometextbool homelistmateriel">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>

            <div class="text texthome">السجل 


            </div>
        </div>

       <br>
  <div class="searchsection">
        
      
    <form action="<?php echo URLROOT ;?>list_students/search" accept-charset="UTF-8" method="post">
        <div class="searchbar">
            <input type="text" class="searchbar__input" id="materiel" name="search_materiel" placeholder=" اللقب " dir="rtl">
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
                        <th> التسجيل </th>
                        <th>الشهادة</th>
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
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/edite?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#AC1C68;"><i class='bx bxs-edit-alt'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/add_class?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#21CBAE;"><i class='bx bxs-customize'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/degree?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:black;"><i class='bx bxs-graduation'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>list_students/detail?student_id=<?php echo $student[$i]->id ?>" class=" trash" style="color:#1C94AC;"><i class='bx bxs-receipt'></i></a></td>

        </tr>
            
        <?php }} ?>
        

        </tbody>
            </table>
        </div>
        </div>




</section>





</body>
</html>