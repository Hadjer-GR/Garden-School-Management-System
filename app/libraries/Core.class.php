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

        if(file_exists("../app/controlles/".ucwords($url[0]).".class.php")){

           $this->controller=$url[0];
            unset($url[0]);  
         }
         
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