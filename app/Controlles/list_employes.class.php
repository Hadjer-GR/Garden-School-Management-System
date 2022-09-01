<?php


class list_employes extends Controllers{
   
  private $list_employModel;


  

  public function __construct()
  {
    $this->list_employModel=$this->model("list_employ");

  }



  
public function index(){

    if(isset($_SESSION["user_id"])){


       $all_employ=  $this->list_employModel->get_all_employ();
       $msg[3]=$all_employ;
       
/*
*
* give the employ whe not get thiere salery this month yet
*
*/
$month_nbr=date("m");
$year_nbr=date("Y");
$year_id=$_SESSION["id_year_scolaire"];
// get all id of employ who gets theire salory this month and who work this month
      $list_work= $this->list_employModel->list_work($month_nbr,$year_nbr);
       $msg[4]=$list_work;
   var_dump($msg[4]);
   $this->postview=$this->view("admin/list_employ","list_employ",$msg);


    }else{
        redirect("");

    }
}


/*
*
*
*/

public function edite(){


  if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'GET')){
    
    $id=$_GET["id"];

//1. get info this employ

 $employ_info=$this->list_employModel->get_employ_info($id);
 $msg[1]=$employ_info;
  if(isset($employ_info) && $employ_info !=""){
    
   $this->postview=$this->view("admin/edite_employ","list_employ",$msg);

  }else{
    redirect("list_employes");
  }

  }else{
    redirect("");
  }

}

/*
*
* update employ information 
*
*/

public function update(){
  if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_SESSION["user_id"])) {


 // add teacher 
  $id=$_POST["id"];
  $f_name=$_POST['f_name'];
  $l_name=$_POST['l_name'];
  $price=$_POST['price'];
  $job=$_POST['job'];
  $numero=$_POST["number"];
 
  $this->list_employModel->update_employ($f_name,$l_name,$price,$job,$numero,$id);

  $_SESSION["list"]="تم التعديل بنجاح";
   redirect("list_employes/view_employ");

  }else{
    redirect("");
  }


}


/*
*
*
* delete employe
*
*/

public function delete(){

  if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_SESSION["user_id"])) {

    $id=$_GET["id"];

//1. delete employ
$this->list_employModel->delete_employ($id);

//2. pass a message 

$_SESSION["list"]="تم الحذف بنجاح";


   redirect("list_employes/view_employ");



  }else{
    redirect("");
  }


}









/*
* after any edite or delete fonction 
*
*/
public function view_employ(){

  if(isset($_SESSION["list"])){
    $msg[0]=$_SESSION["list"];
    $month_nbr=date("m");
     $year_nbr=date("Y");
     $year_id=$_SESSION["id_year_scolaire"];
    $all_employ=  $this->list_employModel->get_all_employ();
    $msg[3]=$all_employ;
    $list_work= $this->list_employModel->list_work($month_nbr,$year_nbr);
    $msg[4]=$list_work;

 $this->postview=$this->view("admin/list_employ","list_employ",$msg);

     $this->postview=$this->view("admin/list_employ","list_employ",$msg);
     $_SESSION["list"]=null;
  }else{
    redirect("list_employes");
  }
  


}

/*
*
* serch in list Employ
*
*/

public function search_employ(){

  if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_SESSION["user_id"])) {
   
    $search=$_POST["search"];
    if($search !=""){
   $search_input="%".$search."%";
    $all_employ= $this->list_employModel->search_employ($search_input);
    $msg[3]=$all_employ;
    $month_nbr=date("m");
    $year_nbr=date("Y");
    $year_id=$_SESSION["id_year_scolaire"];
    $all_have= $this->list_employModel->get_nbr_have_pay($month_nbr,$year_nbr,$year_id);
    $msg[4]=$all_have;
    $this->postview=$this->view("admin/list_employ","list_employ",$msg);
    }else{
      redirect("list_employes");
    }
  }else{
    redirect("");
  }
}


/*
*
* give  employes theire salery this month
*
*/

public function pay_month(){
  if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_SESSION["user_id"])) {

    $employ_id=$_GET["id"];
    $month_nbr=date("m");
    $year_nbr=date("Y");
    $year_id=$_SESSION["id_year_scolaire"];

   
    $this->list_employModel->pay_month($month_nbr,$year_nbr,$employ_id,$year_id);

     redirect("list_employes");
    
  }else{
    redirect("");
  }

}


public function work(){
  if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_SESSION["user_id"])) {


    $employ_id=$_GET["id"];
    $month_n=date("m");
    $year_nbr=date("Y");

    $this->list_employModel->satr_work($employ_id,$month_n,$year_nbr);
    redirect("list_employes");


  }else{
    redirect("");
  }
}


/*
*
* rapport
*
*/


public function rapport(){
  if (($_SERVER['REQUEST_METHOD'] == 'GET') && isset($_SESSION["user_id"])) {

       $teacher_id=$_GET["id"];
//1. rapport teacher 
      $teacher_rapport=$this->list_employModel->teacher_rapport($teacher_id);
      $msg[0]=$teacher_rapport;

// 2. teacher name 

    $name=$this->list_employModel->teacher_name($teacher_id);

    $msg[1]=$name;
    $this->postview=$this->view("admin/rapport_teacher","list_teacher",$msg);


  }else{
    redirect("");
  }
}


/*
* pay to the employ after see rapport
*
*
*/


public function rapport_pay(){


//0. pay month for employe
  $employ_id=$_GET["id"];;
  $month_nbr=date("m");
  $year_nbr=date("Y");
  $year_id=$_SESSION["id_year_scolaire"];

 
  $this->list_employModel->pay_month($month_nbr,$year_nbr,$employ_id,$year_id);

//1. rapport teacher 
$teacher_rapport=$this->list_employModel->teacher_rapport( $employ_id);
$msg[0]=$teacher_rapport;

// 2. teacher name 

$name=$this->list_employModel->teacher_name( $employ_id);

$msg[1]=$name;
$this->postview=$this->view("admin/rapport_teacher","list_teacher",$msg);



}










}

