<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Amal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">

        <link rel="stylesheet" href="<?php echo URLROOT ;?>css/style.css">
         <link rel="stylesheet" href="<?php echo URLROOT ;?>css/mobile.css" media="(max-width: 700px)">
         <script defer src="<?php echo URLROOT ;?>js/script.js"></script>
       <script defer src="<?php echo URLROOT ;?>js/mobilescreen.js"></script>
       <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
       <script defer src="<?php echo URLROOT ;?>js/mychart.js"></script>



    </head>
    <body>
      <?php 
      require_once"header.php";
      ?>
     

<section class="home">

<div class="mainindex">
            <div class="etud1 bigchart">
                <h2>التقرير  السنوي</h2>

                <div class="contentStatistics">
              
                    <div class="resultnote" id="chartnote">
                        <canvas id="lineChart"></canvas>

                    </div>
                    
                </div>


            </div>

            <div class="etud1">
                <h2>التقرير  الشهري</h2>

                <div class="contentStatistics">
               
                    <div class="resultnote" id="chartnote">
                        <canvas id="polarChart"></canvas>
                        <h4>  الاحصائيات  </h4>

                    </div>
                    <div class="absencesanddelay">
                        

                        </div>
                </div>

            </div>
           


        </div>




</section>
    </body>
</html>