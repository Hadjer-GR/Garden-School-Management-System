<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal</title>
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT ;?>css/materiel.css">

        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">
         <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">
         <script defer src="<?php echo URLROOT ;?>js/script.js"></script>
    <script defer src="<?php echo URLROOT ;?>js/mobilescreen.js"></script>
</head>
<body>
    
<?php  require_once"header.php";?>




<section class="home homeAddmatriel">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>
            <div class="text texthome"> المقتنيات</div>
        </div>
   

        <div class="titlenote">
            <a href="<?php echo URLROOT ;?>materiel" class="btnleft"> <i class='bx bx-reply'></i>
              </a>
             <span>الغاء</span>
           
        </div>
  <br>
  <button onclick="printcard();" class="print"><i class='bx bx-printer'></i></button>
<br>

        <div class="listmatriel" id="listMateriel">
                <table dir="rtl">
                    <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>الكمية</th>
                            <th>تاريخ الشراء</th>
                            <th>السعر الاجمالي</th>
                            

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
                           
                            </td>

                        </tr>
                         
           <?php }}?>
           
                    </tbody>
                </table>
            </div>

        </div>


</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script  src="<?php echo URLROOT ;?>js/printThis.js"></script>


<script>


function printcard() { 
        $('#listMateriel').printThis({
            importCSS: true,
            importStyle: true,
            loadCSS: "http://localhost/school_system/css/style.css"
        });
     };
</script>





</body>
</html>