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










}

