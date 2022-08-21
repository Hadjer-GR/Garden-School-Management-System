
<?php


class attandances extends Controllers{
   

    private $attandanceModel;
    private $showclassModel;




     public function __construct()
    {
      $this->attandancenModel=$this->model("attandance");
  
    }


    public function index(){
      if(isset($_SESSION["user_id"])){


   
        $this->postview=$this->view("admin/attandance","attandance");

      }else{
        redirect("");
      }

    }

      public function att_class(){

        if(($_SERVER['REQUEST_METHOD'] == 'GET') &&  isset($_SESSION["user_id"])){
     
          $class_id=$_GET["class_id"];
          $_SESSION["class_id"]=$class_id;
          $this->showclassModel=$this->model("showclass");

          if(isset($_SESSION["id_year_scolaire"])){
            $year_id=$_SESSION["id_year_scolaire"];

            
         $class=$this->showclassModel->get_class_name($class_id,$year_id);
          $class_name=$class->n_class;
          $msg[0]=$class_name;
          $_SESSION["class_name"]=$msg[0];


          $this->postview=$this->view("admin/att_class","attandance",$msg);


          }

        }else{
          redirect("");
        }

      }



      public function insert_att(){

        if(($_SERVER['REQUEST_METHOD'] == 'GET') &&  isset($_SESSION["user_id"])){
          $class_id=$_SESSION["class_id"];
          $student_id=$_GET["student_id"];
          $date_t=date("Y")."-".date("m")."-".date("d")-1;
  
        $id=  $this->attandancenModel->verfie_attandance($student_id,$class_id,$date_t);
       
        if(isset($id) && $id ==0){

          $this->attandancenModel->insert_attandance($student_id,$class_id,$date_t);
          $msg[1]="تمت اظافة  الحضور بنجاح  شكرا" ;


        }else{
          $msg[1]="error";
          $msg[2]="   عذرا لقد تم  تسجيل الحضور هذا التلميذ سابقا " ;


        }
        $msg[0]=$_SESSION["class_name"];
        $_SESSION["message"]=$msg;
        redirect("attandances/list_student");

        }else{
          redirect("");
        }
      }

    public function list_student(){
     if(isset($_SESSION["message"])){

      $msg=$_SESSION["message"];

      $this->postview=$this->view("admin/att_class","attandance",$msg);

      $_SESSION["message"]=null;
     }else{
      $this->postview=$this->view("admin/att_class","attandance");
     }




    }



        
    





}