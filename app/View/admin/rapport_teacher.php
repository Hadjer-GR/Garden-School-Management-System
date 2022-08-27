<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">
         <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">
         <script defer src="<?php echo URLROOT ;?>js/script.js"></script>
    <script defer src="<?php echo URLROOT ;?>js/mobilescreen.js"></script>
    
    <title>Amal</title>
</head>
<body>
    
<?php  require_once"header.php";?>



<section class="home hometextbool homelistmateriel homerapport">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>

            <div class="text texthome">السجل 


            </div>
        </div>

       <br>
       <div class="printrapport">

      
       <div class="titlenote">
            <a href="<?php echo URLROOT ;?>list_employes" class="btnleft"> <i class='bx bx-reply'></i>
            </a>
  <span>الغاء</span>
    </div>

    <button onclick="printcard();" class="print"><i class='bx bx-printer'></i></button>

       <div class="listmatriel rapport" dir="rtl" id="rapport">
        <div class="titleform">
        <h2 class="addperson name_rapport"><?php if(isset($msg[1])){echo$msg[1][0]->f_name." ".$msg[1][0]->l_name;} ?> </h2>

        </div>
        <br>
            <table >
                <thead>




                    <tr>
                    
                        <th> الشهر </th>   
                        <th> &nbsp; </th>
                          <th>&nbsp;</th>                   
                        <th> الاجرة     </th>   
                                        
                        <th>الدفع</th>
                        
                       

                    </tr>
                </thead>
                <tbody dir="rtl">


                <?php  if(isset($msg[0])){
                        $rapport=$msg[0];
            for ($i=0; $i <sizeof($rapport) ; $i++) { 
               
          
        ?>

    <tr>
                        <th>  <?php echo $rapport[$i]->date_t;?></th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <?php
                         if($rapport[$i]->is_pay=="yes"){    ?>
                           
                         <th> <?php  echo "تم الدفع";?></th>
                        
                         <th class="btndelete"><c:out value="" /><a style="color: green;"> <i class='bx bxs-user-check' ></i> </a> <span></span></th>

                         
                      <?php }else{ ?>
                         
                         
                       
                        
                      
                      <th> <?php  echo " لم بتم الدفع";?></th>
                      
                      <th class="btndelete"><c:out value="" /><a href="<?php echo URLROOT ;?>list_employes/rapport_pay?id=<?php echo $rapport[$i]->teacher_id; ?>" style="color: red;"> <i class='bx bxs-user-x' ></i> </a></th>

                      <?php }  ?>
                       
                      <?php ?>

                      
                    
                     
                   




                        
    </tr>


<?php }} ?>





                </tbody>
            </table>
       </div>
       
       </div>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script  src="<?php echo URLROOT ;?>js/printThis.js"></script>


<script>


function printcard() { 
        $('#rapport').printThis({
            importCSS: true,
            importStyle: true,
            loadCSS: "http://localhost/school_system/css/style.css"
        });
     };
</script>











</body>
</html>