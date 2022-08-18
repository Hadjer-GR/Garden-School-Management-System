<?php
 
class Teachers extends Controllers{

  private $teacherModel;




  
  public function __construct()
  {
    $this->teacherModel=$this->model("teacher");
   


  }


  public function index()
  {
    if(isset($_SESSION["user_id"])){

     
      if(isset($_SESSION["complet"])){
        $msg=$_SESSION["complet"];
        $_SESSION["complet"]=null;
        $this->postview=$this->view("admin/teacher","teacher",$msg);

      }else{
        $this->postview=$this->view("admin/teacher","teacher");

      }
      

      }else{
    redirect("");

  }
  }



  public function add(){


    if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_SESSION["user_id"])) {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



      if(isset($_SESSION['id_year_scolaire'] )){
     
   
 
 
 // add teacher 
 
         $f_name=$_POST['f_name'];
         $l_name=(int)$_POST['l_name'];
         $price=$_POST['price'];
         $job=$_POST['job'];
         $numero=$_POST["number"];
         
          
        $this->teacherModel->insert_teacher($f_name,$l_name,$price,$job,$numero);
        $msg[0]="تمت اظافة  الموظف بنجاح  شكرا" ;
 
 
           }else{
             $msg[0]="error";
             $msg[1]=" يرجى من فضلك اولا اظافة العام الدراسي     &nbsp;  &nbsp;  بعد ذالك يمكنك اظافة موظف  ";
           }
           $_SESSION["complet"]=$msg;
            redirect("Teachers");
            
 
     }else{
 
         redirect("teachers");
     }
 
  
     

    }


  }




  

