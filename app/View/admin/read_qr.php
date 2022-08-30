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

<script>

  // banner

  
        	const hideBanners= (e) => {
        	  document
        	    .querySelectorAll(".banner.visible")
        	    .forEach((b) => b.classList.remove("visible"));
        	};
            const hideBanners2 = (e) => {
        	  document
        	    .querySelectorAll(".banner.visible")
        	    .forEach((b) => b.classList.remove("visible"));
        	};
        	




// write Ajax 



</script>

<section class="home " >
  <div class="headermobile">
          <i class='bx bx-menu togglemenu'></i>

          <div class="text texthome">الحضور</div>
      </div>

      <br><br>
      <div class="infoclass method" dir="rtl">
    <a  href="<?php echo URLROOT ;?>attandances" class="method1 choosemethod"  >  <span class="imethod1"><i class='bx bx-check'>يدوي</i></span></a>
   </div>


      <form action="#" method="post">
     <input  class="qr_input"  id="text" type="text" name="qr" >
    </form>



    <!--  content notification  -->




    <div class="containermsg" id="containermsg" dir="rtl">

   
  




   

    </div>

  
</section>

<script type="text/javascript" language="javascript">
 
//1. creqte reauest 
       	
function createRequest(){
        		var xmlhttp;
          	 
          	  if(window.XMLHttpRequest){
          		  xmlhttp=new XMLHttpRequest();
          		  console.log("hi hadjer");
          	  }else{
          		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          		  if(! xmlhttp){
              		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP.3.0");
       
          		  }
          		  if(! xmlhttp){
              		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP.6.0");
       
          		  }
          		  
          	  }
          	  return xmlhttp;
        		
        		
        		
        		
        	}
   





//  audio 


  

// 2. send qr code 

// code to post using ajax
const url="<?php echo URLROOT ?>attandances/send_qr";
const text=document.getElementById("text");
const data="text="+text.value;



//set a period of time to send qr_code


function send_qr(){
     
    const input=document.getElementById("text");
    console.log(input.value);
    if(input.value=="" || input.value== null){


    }else{

        setTimeout( (eo) => {
            console.log("wait22");
         console.log(input.value);
        
         connect(); 
    
    }, 1000);

    }

    setTimeout( send_qr, 1500);


}

send_qr();









  function connect(){
  var xmlhttp;
  xmlhttp=createRequest();
  const text=document.getElementById("text");
  var path="<?php echo URLROOT ?>attandances/send_qr";
  
    var paramater="qr="+text.value;


//1. show message

const error=`
<div class="banners-container msg" dir="ltr">
 <div class="banners " dir="ltr">
<div class="banner error visible" id="banner1">
      <div class="banner-message" dir="ltr">
     
      يرجى الاعادة مرة اخري
      
            </div>
      <div class="banner-close" onclick="hideBanners1()"> <i class='bx bx-error-circle' ></i></div>
    </div>
    <audio src="<?php echo URLROOT; ?>mp3/failed.mp3" autoplay>

    </div> </div>`;

    const  send_qr=`<div class="banners-container msg" dir="ltr">
                      <div class="banners " dir="ltr">
                          <div class="banner success visible" id="banner2">
                            <div class="banner-message" dir="ltr">
                             تم التسجيل 
                              </div>
                            <div class="banner-close" onclick="hideBanners2()"><i class='bx bx-check'></i></div>
                          </div>
                          <audio src="<?php echo URLROOT; ?>mp3/sec.mp3" autoplay>
                        </div> </div>`;  



  xmlhttp.onreadystatechange=function(){
    		  if(xmlhttp.readyState <4){
    			 console.log("not connected");

    		  }
    		  if(xmlhttp.readyState==4 & xmlhttp.status==200){
                 const data =JSON.parse(xmlhttp.responseText);
    			  text.value="";
                  console.log("connected");
                    console.log(typeof(data));

                  if(data[0]=="yes"){
                    document.getElementById('containermsg').insertAdjacentHTML('afterbegin',send_qr);

                  }else{
               
                    document.getElementById('containermsg').insertAdjacentHTML('afterbegin',error);
                
                  }
                          


    		  }
    		  
    		  
    	  }
    	 
       xmlhttp.open("POST",path,true);
       xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
       xmlhttp.send(paramater);
       console.log("try try try again ");
         
        }
       
 </script>




</body>
</html>