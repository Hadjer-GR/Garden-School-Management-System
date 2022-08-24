<?php


class list_students extends Controllers{
   
private $list_studentModel;




public function __construct()
{
  $this->list_studentModel=$this->model("list_student");

}



public function index(){

    if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'POST')){

      $year_id=$_SESSION["id_year_scolaire"];
      $all_student= $this->list_studentModel->get_all_student($year_id);


       $msg[3]=$all_student;
  
     $this->postview=$this->view("admin/list_student","list_student",$msg);

    }else{
        redirect("");

    }
}




/*
* edite information of student 
*
*/

public function edite(){

    if(isset($_SESSION["user_id"]) && isset($_SESSION["id_year_scolaire"])){
    
        $msg[0]="edite_student";
         $year_id=$_SESSION["id_year_scolaire"];
         $id=$_GET["student_id"];
    //student info     
        $student_info=$this->list_studentModel->get_student_info($id,$year_id);
        $msg[1]=$student_info;
// class of student 
        $class_stud=$this->list_studentModel->get_class_stud($id);
        $msg[2]=$class_stud;
        $parent_id= $student_info[0]->parent_id;
        
     if(isset($parent_id)){

      $parent_info=$this->list_studentModel->get_parent_info($parent_id);

     $msg[3]=$parent_info;

      $_SESSION["class_nbr"]=sizeof($msg[2]);
      $this->postview=$this->view("admin/edite","list_student",$msg);

     

     }else{
        redirect("list_students");
     }




    }else{
        redirect("");
    }

}


public function update(){

    if(isset($_SESSION["user_id"]) && isset($_SESSION["id_year_scolaire"])){
    

        if(isset($_SESSION["class_nbr"])){

        

            $year_id=$_SESSION['id_year_scolaire'] ;
 
 
            //  Student proberties
            
                    $f_name=$_POST['f_name'];
                    $l_name=$_POST['l_name'];
                    $date=$_POST['date_birth'];
                  //  $class_id=(int)$_POST['student_class'];
                    $parent_n=$_POST["parent_n"];
                    $parent_nbr=$_POST["parent_nbr"];
                    $student_id=$_POST["student_id"];
                    $parent_id=$_POST["parent_id"];
        //1. update student 

         









        }else{
            redirect("list_students");
        }
    }else{
        redirect("");
    }

}















}




