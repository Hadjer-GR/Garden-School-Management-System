<?php


class sections extends Controllers{
   

    private $sectionModel;
    private $study_class;



     public function __construct()
    {
      $this->sectionModel=$this->model("section");
  
    }


    public function index(){

    if(isset($_SESSION["user_id"])){
   
      // verfie period study if it is set or not 
     
      $id_year_scolaire=$this->sectionModel->get_study_year();
    if(isset($id_year_scolaire) && $id_year_scolaire != 0 ){
        $_SESSION['id_year_scolaire']= $id_year_scolaire ;

      }
      if(isset($_SESSION["complet"])){
        $msg=$_SESSION["complet"];
        $_SESSION["complet"]=null;
        $this->postview=$this->view("admin/section","section",$msg);

      }else{
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
        $msg[0]="تمت اظافة العام الدراسي بنجاح  شكرا" ;
        $id_year_scolaire=$this->sectionModel->get_study_year();
        if(isset($id_year_scolaire) && $id_year_scolaire != 0){
          $_SESSION['id_year_scolaire']= $id_year_scolaire ;
  
        }
        $this->postview=$this->view("admin/section","section",$msg);


    }else{

        redirect("");
    }
}


// Add  class 
public function addclass(){


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION["user_id"])) {
      
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  
// get the year scolaire 
   if(isset($_SESSION['id_year_scolaire'] )){
       $year_id= $_SESSION['id_year_scolaire'];
  


// add class 

        $class_n=$_POST['class_name'];
        $session_nbr=(int)$_POST['session_nbr'];
        $price=$_POST['price'];
        $teacher_id=(int)$_POST['teacher_class'];

         $year_id=$_SESSION["id_year_scolaire"];
        
         if($teacher_id ==0){
          $teacher_id=3;
         }
          
           $this->sectionModel->insert_class($class_n,$session_nbr,$price, $teacher_id, $year_id);
            $msg[0]="تمت اظافة القسم الدراسي بنجاح  شكرا" ;


          }else{
            $msg[0]="error";
            $msg[1]=" يرجى من فضلك اولا اظافة العام الدراسي     &nbsp;  &nbsp;  بعد ذالك يمكنك اظافة القسم  ";
          }
          $_SESSION["complet"]=$msg;
           redirect("sections");
           

    }else{

        redirect("sections");
    }


  }

}