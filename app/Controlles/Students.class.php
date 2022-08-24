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


     if(isset($_SESSION["user_id"])){

     
      if(isset($_SESSION["complet"])){
        $_SESSION["complet"]=null;
        

      }


        $this->postview=$this->view("admin/student","student");

      
      

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
         $l_name=$_POST['l_name'];
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

  }else{
     redirect("students");
  }


  //3. insert  class of this student 
  $this->studentModel->insert_student_class($student_id,$class_id);


//4. inscription  date 
 
 $today_date=date("Y-m-d");


//5. get class name 
 $class_name =$this->studentModel->get_class_name($class_id,$year_id);

// 6. insert student pay this month
$month_n=date("m");
$year_nbr=date("Y");
$this->studentModel->student_pay($month_n,$year_nbr,$class_id,$student_id,$year_id);

  //7. generate QRCode 


  require_once "../app/util/phpqrcode/qrlib.php";
  require_once "../app/util/phpqrcode/qrconfig.php";

       
  $text=filter_var($student_id,FILTER_SANITIZE_STRING);
  $filename= "card1.png";


  $pngAbsoluteFilePath = APPROOT. '/../public/image/'. $filename;
   $urlRelativeFilePath ="/public/". $filename;

  
 
  QRcode::png($student_id, $pngAbsoluteFilePath, 'L', 4, 2);










        $msg[0]="تمت اظافة  التلميذ بنجاح  شكرا" ;


        $studentt=[$f_name,$l_name,$class_name,$today_date];
        $msg[1]=$studentt;
 
           }else{
             $msg[0]="error";
             $msg[1]=" يرجى من فضلك اولا اظافة العام الدراسي     &nbsp;  &nbsp;  بعد ذالك يمكنك اظافة تلميذ  ";
           }
           
          $this->postview=$this->view("admin/student","student",$msg);

            
 
     }else{
 
         redirect("students");
     }
 
  
    








    


    
  }





    


}

