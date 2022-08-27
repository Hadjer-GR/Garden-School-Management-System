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

<section class="home homematriel ">
        <div class="headermobile">
            <i class='bx bx-menu togglemenu'></i>
            <div class="text texthome"> المقتنيات</div>
        </div>
        <div class="contentetud">
            <div class="holder">

                <div class="holde1 note">
                    <a href="<?php echo URLROOT ;?>materiel/addMateriel">&nbsp;اظافة مقتنيات&nbsp;&nbsp; <br>
                        <i class='bx bx-briefcase-alt-2'></i></a>

                </div>
                <div class=" holde1 note">
                    <a href="<%=request.getContextPath()%>/SearchlistMateriel">&nbsp;&nbsp;سجل المقتنيات &nbsp;&nbsp; <br>
                        <i class='bx bx-receipt'></i></a> </div>
                <div class="holde1 textbook">
                    <a href="#"> &nbsp;&nbsp;السعر الاجمالي <br>

                        <div class="price">
                            <span><c:out value="${prix }" /></span>
                            <span> &nbsp;&nbsp;DA </span>

                        </div>
                    </a>
                </div>


            </div>
            <!-- design schedule of the student -->
            <div class="text textschedule"> <span> قائمة المقتنيات </span> </div>
            <div class="listmatriel">
                <table dir="rtl">
                    <thead>
                        <tr>
                            <th>اسم المنتج</th>
                            <th>الكمية</th>
                            <th>تاريخ الشراء</th>
                            <th>السعر الاجمالي</th>
                            <th>تعديل</th>
                            <th> حذف</th>

                        </tr>
                    </thead>
                    <tbody>
                 
                    
                        <tr>
                            <td><c:out value="" /></td>
                            <td><c:out value="" /></td>
                            <td><c:out value="" /></td>
                            <td dir="ltr" ><c:out value="" /> <span>DA</span> </td>
                            <td class="edite"><a href="" class="editeProduct"><i class='bx bx-edit'></i></a></td>
                            <td class="delete"><a href="" class="deleteProduct"><i class='bx bx-trash'></i></a>
                            </td>

                        </tr>
                         


                    </tbody>
                </table>
            </div>

        </div>
    </section>

</body>
</html>