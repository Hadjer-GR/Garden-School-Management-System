<?php


class sections extends Controllers{
   

    private $sectionModel;


    public function __construct()
    {
      $this->sectionModel=$this->model("section");
  
    }

public function index(){
// get page section.php


$this->postview=$this->view("admin/section","sections");

}

// add year Scolaire

public function scolaire_y(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
        $start_y=$_POST['start_y'];
        $end_y=$_POST['end_y'];
          
         $value=$this->sectionModel->insert_scolaire_y($start_y,$end_y);
          $this->postview=$this->view("admin/section","insertyear");

    }else{

        redirect("section");
    }
}


// Add  class 
public function addclass(){


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
    

// add class 
        $class_n=$_POST['class_n'];
        $session_nbr=$_POST['session_nbr'];
        $price=$_POST['price'];
        $teacher_id=$_POST['teacher_class'];

        
          
           $this->sectionModel->insert_class($class_n,$session_nbr,$price, $teacher_id);
          $this->postview=$this->view("admin/section","insertclass");

    }else{

        redirect("section");
    }



}





}