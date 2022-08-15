<?php
 
class Pages extends Controllers{

  public function index()
  {
  
   $this->postView=$this->view("login") ;

  
  }
   
  public function home(){
    $this->postView= $this->view("admin/home");
  }




}
