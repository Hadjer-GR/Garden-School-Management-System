<?php

class Users extends Controllers{
 
  private $Usermodel;

  public function __construct()
  {
    $this->Usermodel=$this->model("User");

  }
 
  /*
   inscrir en facebook

  */
  public function index(){
    

  }
  /*

  login facebook

  */
  public function accuiel(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $username=$_POST['username'];
      $password=$_POST['password'];

      $id_user=$this->Usermodel->login($username,$password);
       if($id_user != 0){
       
   // set id user en session 
      
        $_SESSION["user_id"]=$id_user;
        $id_year_scolaire=$this->Usermodel->get_study_year();
    if(isset($id_year_scolaire) && $id_year_scolaire != 0 ){
        $_SESSION['id_year_scolaire']= $id_year_scolaire ;

      }

        $this->postView= $this->view("admin/home");

       }else{
    $data=true;

        $this->postView= $this->view("login",$data);

       }

    }

  }

  // log out 

  public function logout(){

    $_SESSION["user_id"]=null;
    session_destroy() ;
    redirect("");

  }








}


