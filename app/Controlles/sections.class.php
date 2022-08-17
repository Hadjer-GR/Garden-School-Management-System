<?php


class sections extends Controllers{
   

    private $sectionModel;



     public function __construct()
    {
      $this->sectionModel=$this->model("section");
  
    }


    public function index(){
             // 1. verfie login 2. get page section.php
if(isset($_SESSION["user_id"])){
   
    // verfie period study if it is set or not 
     
      $id_year_scolaire=$this->sectionModel->get_study_year();
      if(isset($id_year_scolaire) ){
        $_SESSION["id_year_scolaire"]= $id_year_scolaire ;

      }
      if( isset($_SESSION["complet"])){

        $msg[0]=$_SESSION["complet"];
        $_SESSION["complet"]=null ;
        $this->postview=$this->view("admin/section","section",$msg);


      }
      else{
        $this->postview=$this->view("admin/section","section");

      }
      


}else{
    redirect("");

}


}

// add year Scolaire

public function scolaire_y(){

    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_SESSION["user_id"])) {
      
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $start_y=$_POST['start_y'];
        $end_y=$_POST['end_y'];
          
         $value=$this->sectionModel->insert_scolaire_y($start_y,$end_y);
        $_SESSION["complet"]="تمت اظافة العام الدراسي بنجاح  شكرا" ;
         redirect("sections");


    }else{

        redirect("");
    }
}


// Add  class 
public function addclass(){


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
// get the year scolaire 



// add class 
        $class_n=$_POST['class_n'];
        $session_nbr=$_POST['session_nbr'];
        $price=$_POST['price'];
        $teacher_id=$_POST['teacher_class'];

        
          
           $this->sectionModel->insert_class($class_n,$session_nbr,$price, $teacher_id);
           $_SESSION["complet"]="تمت اظافة القسم الدراسي بنجاح  شكرا" ;

    }else{

        redirect("section");
    }



}





}