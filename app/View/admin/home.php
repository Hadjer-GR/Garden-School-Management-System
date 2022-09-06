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
     

    </head>
    <body>
     
    
<?php 

if($_SESSION["type"]=="admin"){
  require_once "header.php";

}else{
  require_once "sec_header.php";

}

?>


<section class="home">
<div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الرئيسية</div>
      </div>
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
                    <div class="absencesanddelay" dir="rtl">
                        <br><br>
                        <div style="font-size:1.3em ;padding:5px 15px; margin-bottom:15px;  border-bottom: 2px solid rgb(255, 99, 132);"> <span> المداخيل :</span>            
                         <span><?php echo $msg[1]->income?> <span>DA</span></span>
                        </div>
                        <div style="font-size:1.3em ;padding-right:15px; margin-bottom:15px ; border-bottom: 1px solid rgb(54, 162, 235);"> <span> المصاريف :</span>            
                         <span> <?php echo $msg[1]->spending?><span>DA</span></span>
                        </div>
                        <div style="font-size:1.3em ;padding-right:15px; margin-bottom:15px;border-bottom: 2px solid rgb(54, 162, 235);"> <span> المقتنيات :</span>            
                         <span><?php echo $msg[1]->spending_materiel?> <span>DA</span></span>
                        </div>
                        <div style="font-size:1.3em ;padding-right:15px; margin-bottom:15px;border-bottom: 2px solid rgb(54, 162, 235);"> <span> اجرة العمال :</span>            
                         <span><?php echo $msg[1]->spending_teacher?> <span>DA</span></span>
                        </div>
                        

                        </div>
                </div>

            </div>
           


        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script  type="">
   
      
var ctx=document.getElementById("lineChart");

     
  const labels =<?php echo$msg[0][0] ;?>;
  const data = {
    labels: labels,
    datasets: [{
      label: "المداخيل",
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo$msg[0][1] ;?>,
    },{
        label: "المصاريف",
        backgroundColor: '#2375BD',
      borderColor: '#2375BD',
        data: <?php  echo$msg[0][2] ;?>,
      }]
  };
 

  const config = {
    type: 'line',
    data: data,
    options: {
      title: {
        text: " التقرير الشهري ",
        display: true,
      },
      aspectRatio: 2.3,
    },
  };

  const myChart = new Chart(
    document.getElementById('lineChart').getContext('2d'),
    config
  );



  /*
  *
  * polar chart
  * 
  */


  const data_polar = {
    labels: [
      'المداخيل',  
      'اجرة العمال',
      'المقتنيات',
    
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [<?php  echo$msg[2] ;?>, <?php  echo$msg[3] ;?>, <?php  echo$msg[4] ;?>],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 235)',
       
      ]
    }]
  };
  const config_polar = {
    type: 'doughnut',
    data: data_polar,
    options: {
      title: {
        text: " التقرير الشهري ",
        display: true,
      },
      aspectRatio: 2.1,
    },
  };
  const chart_polar = new Chart(
    document.getElementById('polarChart').getContext('2d'),
    config_polar
  );

  /*
  *
  *
  * 
  * */
 
        </script>
</section>
 

    </body>
    
    
</html>