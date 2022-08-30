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
       
        $price=$_POST['price'];
        $teacher_id=(int)$_POST['teacher_class'];

         $year_id=$_SESSION["id_year_scolaire"];
        
         if($teacher_id ==0){
          $teacher_id=3;
         }
          
           $this->sectionModel->insert_class($class_n,$price, $teacher_id, $year_id);
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



  public function delete_class(){

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION["user_id"])) {

   $class_id=$_GET["class_id"];

   //1. vefiie if there is student in the class 

  $id=$this->sectionModel->verfie_class_1($class_id);
  $id2=$this->sectionModel->verfie_class_2($class_id);
  
   echo"id:".$id."--id2:".$id2;
  if($id==0 && $id2==0){
  
     
    $id=$this->sectionModel->delete_class($class_id);
    $msg[0]="تم حذف القسم بنجاح";


  
  }else{
    $msg[0]="error";
    if($id2==1){
      $msg[1]="عذرا لا يمكنك حذف هذا القسم  ";
    }else{
      $msg[1]=" يرجى من فضلك اولا حذف  جميع التلميذ هذا  القسم     &nbsp;  &nbsp;  بعد ذالك يمكنك حذف القسم  ";

    }
 
  }
  $_SESSION["complet"]=null;
 // redirect("sections");

    }else{
      redirect("");
    }
  }

/*
*
* edite class 
*/

public function edite_class(){
  if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_SESSION["user_id"])) {
   $class_id=$_GET["class_id"];

    $class_info=$this->sectionModel->get_class_info($class_id);

   $msg[0]="edite_class";
   $msg[1]= $class_info;

   $this->postview=$this->view("admin/edite","section",$msg);



  }else{
    redirect("");
  }
}

/*
* update information class 
*
*/

public function update_class(){
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION["user_id"])) {

        $class_n=$_POST['class_name']; 
        $price=$_POST['price'];
        $teacher_id=(int)$_POST['teacher_class'];
        $class_id=$_POST["class_id"];
        $class_info=$this->sectionModel->update_class($class_n,$price, $teacher_id,$class_id);

        $msg[0]="تم تعديل القسم بنجاح  شكرا" ;

        $_SESSION["complet"]=$msg;
    

       redirect("sections");
      




  }else{
    redirect("");
  }

}


public function emploi(){
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

 
   if(isset($_GET['id']) && $_GET['id']!=""){
    $class_id=$_GET['id'];
    $_SESSION["class_id"]=$class_id;


   }else{
    $class_id=$_SESSION["class_id"];

   }
  $msg[2]=$this->sectionModel->all_emploi($class_id);
      


   $this->postview=$this->view("admin/emploi","section",$msg);


  }else{
    redirect("");
  }

}



public function emploi_group(){

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION["user_id"])) {

 $day=$_POST['day'];
 $day_nbr=date("w");
 $start_t=$_POST["start_t"];
 $end_t=$_POST["end_t"];
 $salle=$_POST["salle"];
 $id=$_SESSION['class_id'];

if(($end_t>$start_t) && $end_t!= $start_t){
 $id_1=$this->sectionModel->verfie_emploi_1($start_t, $day,$salle);

 
 if(sizeof($id_1)==0 ){
   $id_2=$this->sectionModel->verfie_emploi_1($start_t, $day,$salle);
  if(sizeof($id_2)==0){
    $this->sectionModel->insert_emploi($start_t,$end_t,$day,$id,$salle,$day_nbr);
     redirect("sections/emploi");
  }else{
    $msg[0]="error";
    $msg[1]=$id_2;

  }
 
 }else{
  $msg[0]="error";
  $msg[1]=$id_1;
}
}else{
   $msg[0]="error2";
   $msg[1]="يرجى تحديد الوقت بالدقة ";
}
   $msg[2]=$this->sectionModel->all_emploi($id);
  $this->postview=$this->view("admin/emploi","section",$msg);

  }else{
    redirect("sections/emploi");
  }

}


/*
*
* delete  in emploi de temp  
*/

public function delete_emploi(){
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id=$_GET["id"];
    $this->sectionModel->delete_emploi($id);

   redirect("sections/emploi");
  }else{
    redirect("");
  }
}




}