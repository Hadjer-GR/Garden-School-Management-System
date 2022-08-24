<?php


class list_students extends Controllers{
   
private $list_studentModel;




public function __construct()
{
  $this->list_studentModel=$this->model("list_student");

}



public function index(){

    if(isset($_SESSION["user_id"]) ){

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
    
        $type="edite_student";
         $year_id=$_SESSION["id_year_scolaire"];
         $student_id=$_GET["student_id"];

    $msg=$this->student_info($student_id,$type);
    if($msg[4]){
      $this->postview=$this->view("admin/edite","list_student",$msg);

    }else{
      redirect("list_students");
    }




    }else{
        redirect("");
    }

}


public function update(){

    if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
    

        if(isset($_SESSION["class_nbr"])){

        

            $year_id=$_SESSION['id_year_scolaire'] ;
 
 
            //  Student proberties
            
                    $f_name=$_POST['f_name'];
                    $l_name=$_POST['l_name'];
                    $date=$_POST['date_birth'];
                    $parent_n=$_POST["parent_n"];
                    $parent_nbr=$_POST["parent_nbr"];
                    $student_id=$_POST["student_id"];
                    $parent_id=$_POST["parent_id"];
      



        //1. update student 

        $this->list_studentModel->update_student_info($f_name,$l_name,$date,$student_id);

        //2. update parent_info

        $this->list_studentModel->update_parent_info($parent_nbr,$parent_n,$parent_id);

       //3. update student class
          //1. verfie the class_id is diffrent 
           $class_nbr=$_SESSION["class_nbr"];
           for ($i=0; $i < $class_nbr ; $i++) { 
            $name_class="student_class".$i;
             $class_id=$_POST[$name_class];
             

           }

        
  //  check if there are same class_id
      $array_1=array();
     for ($i=0; $i < $class_nbr ; $i++) { 
        $name_class="student_class".$i;
         $class_id=$_POST[$name_class];
         array_push($array_1, $class_id);
        // $this->list_studentModel->update_student_class($class_id,$student_id);

       }
     
       $same_class=$this->check($array_1);
       $type="edite_student";
       $msg=$this->student_info($student_id,$type);

         if($same_class && $msg[4]){

        $msg[5]="error";
        $msg[6]="لقد قمت بتسجل التلميد اكثر من مرة في نفس القسم يرجى تسجيله مرة واحدة فقط";
        $this->postview=$this->view("admin/edite","list_student",$msg);

       


         }else{
     // update class
        for ($i=0; $i <$class_nbr ; $i++) { 

          $name_class="student_class".$i;
         $class_id=$_POST[$name_class];
          $this->list_studentModel->update_student_class($class_id,$student_id);
        }
  //var_dump($array_1);
       //4. redirect    
        
      redirect("list_students");
         }

        }else{
            redirect("list_students");
        }
    }else{
        redirect("");
    }

}







/*
*
*check if the student is subscribe twice in the same class
*
*/



public function check($array_1){


  for ($j=0; $j <sizeof($array_1) ; $j++) { 
    
    $value_1=$array_1[$j];


   $t=0;
   for ($i=0; $i <sizeof($array_1) ; $i++) { 
      if($value_1 == $array_1[$i]){
        $t=$t+1;
      }
      if($t==2){
        return true;
      }
       
    }
  }
  return false;

   }



   /*
   *
   *  edite student information
   * 
   * */

   public function student_info($student_id,$type){


    $msg[0]=$type;
    $year_id=$_SESSION["id_year_scolaire"];
    $id=$student_id;
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

  

  $msg[4]=true;
   }else{

    $msg[4]=false;
   }
   return $msg;


}


/*
*
* add class 
*/


public function add_class(){

  if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'GET')){

    $student_id=$_GET["student_id"];
    $year_id=$_SESSION['id_year_scolaire'];
  

     $list_class=$this->list_studentModel->list_class($student_id);
     
  // getting 

    $msg[0]="add_class";   
   $msg[1]=$list_class;
  
   //student info     
    $student_info=$this->list_studentModel->get_student_info($student_id,$year_id);
    $msg[2]=$student_info;
    $this->postview=$this->view("admin/edite","list_student",$msg);


  
  }else{
    redirect("");
  }
}



/*
*
*add student   inscript in  class 
*/
public function inscript(){
  if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'POST')){


   $class_id=$_POST["class_nbr"];
   $student_id=$_POST["student_id"];


   require_once "../app/Models/Student.class.php";
      
   $studentModel=new Student;
   
  //3. insert  class of this student 
   $studentModel->insert_student_class($student_id,$class_id);

   redirect("list_students");

  }else{
    redirect("");
  }

}










}














