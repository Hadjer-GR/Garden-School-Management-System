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
    $all_employ=  $this->list_employModel->get_all_employ();
    $msg[3]=$all_employ;
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
    var_dump($all_employ);
    $this->postview=$this->view("admin/list_employ","list_employ",$msg);
    }else{
      redirect("list_employes");
    }
  }else{
    redirect("");
  }
}


}

