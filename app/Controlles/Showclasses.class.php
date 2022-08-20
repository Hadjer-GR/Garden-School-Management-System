<?php 



class Showclasses extends Controllers{
   

    private $showclassModel;



     public function __construct()
    {
      $this->showclassModel=$this->model("showclass");
  
    }


    public function index(){

        if(($_SERVER['REQUEST_METHOD'] == 'GET') &&  isset($_SESSION["user_id"])){
     
            $class_id=$_GET["class_id"];
            
            $_SESSION["class_id"]=$class_id;

   







            if(isset($_SESSION["complet"])){
              $_SESSION["complet"]=null;
              
      
            }
            if(isset($_SESSION["id_year_scolaire"])){
                $year_id=$_SESSION["id_year_scolaire"];
                
        
             
             $msg=$this->showclassModel->get_class_name($class_id,$year_id);
            }
              $this->postview=$this->view("admin/showclass","section",$msg);
      
            
            
      
            }else{
          redirect("");
      
        }

    }





}