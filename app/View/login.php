
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Amal</title>
    <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">

    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT ;?>css/login_style.css">
    <link rel="stylesheet"   type="text/css" href="<?php echo URLROOT ;?>css/login_mobile.css" media="(max-width:810px)">
    <link rel="stylesheet"  type="text/css" href="<?php echo URLROOT ;?>css/login_minimobile.css" media="(max-width:300px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi:wght@600&display=swap" rel="stylesheet">


    <script defer src="/main.js"></script>
</head>

<body>
<div class="transparent2">


<section class="loginn">
    <div class="container ">
        <!-- container that hole img -->
        <div class="transparent">



        </div>
    </div>
    <div class="main-container" dir="rtl">
        <h2> روضة الامل </h2>
        <form action="<?php echo URLROOT ;?>Users/accuiel" method="post">
            <!-- Email input -->

            <div class="username">
                <label> اسم المستخدم : </label>
                <input type="text" required name="username">
            </div>


            <br />
            <!-- Password input -->
            <div class="password">
                <label> كلمة السر :</label>
                <input type="password" required name="password">

            </div>
            <br />
            <?php 
            if(isset($data)){
               
                if($data == true){

         ?>
                    <!-- if user enter wrong password or name-->
                   
                    <div class="wrongpassword">
                        <h5>اسم المستخدم او كلمة السر خاطئة</h5>
        
                    </div>  
               
           
           
           <?php
            }



        }
        
           ?>

           

            <br />
            <!-- Submit button -->
            <div class="log">
                <button type="submit" class="login">تسجيل الدخول</button>

            </div>


        </form>
    </div>
</div>
</div>

</div>
</div>
</section>
</div>
</body>

</html>