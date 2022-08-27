<?php

/*
 route class 

*/

class Core{


 private $controller="Pages";
 private $method="index";
 private $param=[];
 

// contstracture
 public function __construct()
 {
    $url=$this->get_url();
   
    if(isset($url[0])){
// vérfie le document est existe 

    // vérfie le document est existe 
    $this->check_control($url[0]);
    unset($url[0]);  

    /*
        if(file_exists("../app/controlles/".ucwords($url[0]).".class.php")){

           $this->controller=$url[0];
            unset($url[0]);  
         }
         */
      }   
       // require le controlleur
        require_once "../app/Controlles/".$this->controller.".class.php";
       // instance de class Controller
       
      $this->controller=new $this->controller();
       if(isset($url[1])){
               if(method_exists($this->controller,$url[1])){
                   $this->method=$url[1];
                   unset($url[1]);

            
       }
       }
 
      $this->param=$url?array_values($url):[];   
      call_user_func_array([$this->controller,$this->method],$this->param);
  
 
   }

    
/*
* how to get the Controler by verfie first if it is exicte 
*
*/


public function check_control($control){
   $list_Controller=["Users","Teachers","Students","sections","Showclasses","list_employes","list_students","attandances"];
   $nbr=sizeof($list_Controller);

for ($i=0; $i <$nbr ; $i++) { 
     if($control == $list_Controller[$i]){
        $this->controller=$control;
        
       
     }else{
          if(ucwords($control)== $list_Controller[$i]){
        $this->controller=ucwords($control);

     }
     }
    
}

}








public function get_url(){
       if(isset($_GET["url"])){
          $url=$_GET["url"];
          $url=filter_var($url,FILTER_SANITIZE_URL);
          $url=rtrim($url,"/");
          $url=explode("/",$url);
             return $url;
       }
}

    
}