<?php 

class Students extends Controllers{


  private $studentModel;




  
  public function __construct()
  {
    $this->studentModel=$this->model("Student");
   
  
  }

  /*
  * go to page view/student.php
  *
  */


  public function index(){
    
     $this->postView=$this->view("admin/student","student");

     if(isset($_SESSION["user_id"])){

     
      if(isset($_SESSION["complet"])){
        $msg=$_SESSION["complet"];
        $_SESSION["complet"]=null;
        $this->postview=$this->view("admin/student","student",$msg);

      }else{
        $this->postview=$this->view("admin/student","student");

      }
      

      }else{
    redirect("");

  }



  }


/*
*   insert a student 
*
*
*/




  public function add(){


    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_SESSION["user_id"])) {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



      if(isset($_SESSION['id_year_scolaire'] )){
     
    $year_id=$_SESSION['id_year_scolaire'] ;
 
 
 //  Student proberties
 
         $f_name=$_POST['f_name'];
         $l_name=(int)$_POST['l_name'];
         $date=$_POST['date_birth'];
         $class_id=(int)$_POST['student_class'];
         $parent_n=$_POST["parent_n"];
         $parent_nbr=$_POST["parent_nbr"];
   //1. insert parent   

      $parent_id=$this->studentModel->verfie_parent($parent_n,$parent_nbr);

      if(isset($parent_id) && $parent_id==0){
        $this->studentModel->insert_parent($parent_n,$parent_nbr);
        $parent_id=$this->studentModel->verfie_parent($parent_n,$parent_nbr);

      }
  //2. insert student  
  
  
   $student_id =$this->studentModel->verfie_student($f_name,$l_name,$year_id);
   if(isset($student_id) && $student_id==0){

    $this->studentModel->insert_student($f_name,$l_name, $date,$parent_id,$year_id);
    $student_id=$this->studentModel->verfie_student($f_name,$l_name,$year_id);

  }


  //3. insert  class of this student 
  $this->studentModel->insert_student_class($student_id,$class_id);


        $msg[0]="تمت اظافة  التلميذ بنجاح  شكرا" ;
 
 
           }else{
             $msg[0]="error";
             $msg[1]=" يرجى من فضلك اولا اظافة العام الدراسي     &nbsp;  &nbsp;  بعد ذالك يمكنك اظافة تلميذ  ";
           }
           $_SESSION["complet"]=$msg;
            redirect("students");
            
 
     }else{
 
         redirect("students");
     }
 
  
     











    
  }





    


}

