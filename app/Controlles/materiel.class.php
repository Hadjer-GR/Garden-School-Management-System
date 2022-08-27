<?php 



class materiel extends Controllers{
   

    private $materileModel;




     public function __construct()
    {
      $this->materielModel=$this->model("materieles");
  
    }

   public function index(){
    if(isset($_SESSION["user_id"])){

    
        $this->postview=$this->view("admin/materiel","materiel");




    }else{
        redirect("");
    }
   }


/*
 * 
 * 
 */


 public function addMateriel(){
    if(isset($_SESSION["user_id"])){
      $msg[0]="addmateriel";
    
        $this->postview=$this->view("admin/addmateriel","materiel",$msg);




    }else{
        redirect("");
    }

 }


}