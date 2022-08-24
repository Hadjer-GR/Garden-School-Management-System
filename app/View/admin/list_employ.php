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
        
      
    <form action="<?php echo URLROOT ;?>list_employes/search" accept-charset="UTF-8" method="post">
        <div class="searchbar">
            <input type="text" class="searchbar__input" id="materiel" name="search_materiel" placeholder=" اللقب " dir="rtl">
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
                        <th> حذف  </th>
                       

                    </tr>
                </thead>
                <tbody >


                <?php  if(isset($msg[3])){
        $employ=$msg[3];
            for ($i=0; $i <sizeof($employ) ; $i++) { 
                # code...
          
        ?>

        <tr>
        <td dir="rtl"><c:out value="" /><?php echo $employ[$i]->l_name." ".$employ[$i]->f_name ?></td>
        <td><c:out value="" /><?php echo $employ[$i]->job; ?></td>
        
       <td class="btndelete"><a href="<?php echo URLROOT ;?>list_employes/edite?id=<?php echo $employ[$i]->id; ?>" class=" trash" style="color:#AC1C68;"><i class='bx bxs-edit-alt'></i></a></td>
       <td class="btndelete"><a href="<?php echo URLROOT ;?>list_employes/pay?id=<?php echo $employ[$i]->id; ?>" class=" trash" style="color:#1C94AC;"><i class='bx bxs-receipt'></i></a></td>
        <td class="btndelete"><a href="<?php echo URLROOT ;?>showclasses/delete?id=<?php echo $employ[$i]->id; ?>" class=" trash"><i class='bx bx-trash'></i></a></td>
        
        </tr>


        <?php }} ?>
            
        </tbody>
            </table>
        </div>
        </div>


</section>



</body>
</html>