
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo URLROOT ;?>/image/icon3.png" type="image/icon png">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>css/mobile.css" media="(max-width: 700px)">
   
</head>


<nav class="sidebar close">

<header>

    <div class="image-text">

        <span class="imageprofil" style="background-color:url(../image/icon3.png) ;">
            <img src="<?php echo URLROOT; ?>/public/image/icon3.png">

        </span>



        <div class="text logo-text">

            <a href="#" class="hometext"><span class="name  hovername ">الصفحة الرئيسية </span></a>


        </div>

    </div>


    <i class='bx bx-chevron-right toggle'></i>
    <i class='bx bx-menu togglemenu2'></i>

</header>



<div class="menu-bar">

    <div class="menu">


        <ul class="menu-links">
            <li class="nav-link ">
                <div class="drop drop1">


                    <label for="btndropMeneu">
                        <span class="icon">
                            <i class='bx bx-food-menu'></i>

                        </span>
                        <span >
                        <?php  
                if(isset($data)){
                    if($data =="student" || $data=="section" || $data=="teacher"){

                ?>
                   <style>
                    
                    .drop1{
                        background-color:#17191a3a !important;
                        border-radius: 10px;
                    }
                   </style>
                    <?php
                     
                
                }
            }
                ?>
                    

                            التسجيل
                        </span>
                    </label>
                    <input type="checkbox" id="btndropMeneu">

                </div>
            </li>
            <div class="dropmenu">
                <ul class="menu-links">

               
                    <li class="nav-link
                <?php  
                if(isset($data)){
                    if($data =="student"){

                ?>
                    hover  

                    <?php
                      }
                }
                ?>
                    
                    "  ><a href="<?php echo URLROOT; ?>Students">
                            <span class="icon">
                                <i class='bx bx-face'></i>
                            </span>
                            <span>
                                التلاميذ
                            </span>


                        </a></li>
                  

                </ul>

            </div>


            <li class="nav-link  <?php  
                if(isset($data)){
                    if($data =="attandance"){

                ?>
                    hover  

                    <?php
                      }
                }
                ?>">

                <a href="<?php echo URLROOT; ?>attandances">

                    <i class='bx bxs-user-check icon'></i>
                    <span class="text nav-text">الحضور</span>

                </a>

            </li>



            <li class="nav-link">

                <div class="drop drop2">


                    <label for="btndropMeneu_2">
                        <span class="icon">
                        <i class='bx bxs-user-account'></i>

                        </span>
                        <span>
                        <?php  
                if(isset($data)){
                    if($data =="list_student" || $data=="list_employ"){

                ?>
                   <style>
                    
                    .drop2{
                        background-color:#17191a3a !important;
                        border-radius: 10px;
                    }
                   </style>
                    <?php
                     
                
                }
            }
                ?>
                          سجلات
                        </span>
                    </label>
                    <input type="checkbox" id="btndropMeneu_2">

                </div>

            </li>
            <div class="dropmenu_2">
                <ul class="menu-links">
                    <li class="nav-link <?php  
                if(isset($data)){
                    if($data =="list_student"){

                ?>
                    hover  

                    <?php
                      }
                }
                ?>"><a href="#">
                            <span class="icon">
                                <i class='bx bx-face'></i>
                            </span>
                            <span>
                                سجل التلاميذ
                            </span>


                        </a></li>
                   

                </ul>

            </div>

          










        </ul>

    </div>



    <div class="bottom-content">

        <li class="">

            <a href="<?php echo URLROOT ;?>Users/logout">

                <i class='bx bx-log-out icon'></i>

                <span class="text nav-text">تسجيل الخروج</span>

            </a>

        </li>







    </div>

</div>



</nav>
</html>