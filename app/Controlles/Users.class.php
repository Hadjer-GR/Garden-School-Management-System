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
//2. verifie rapport date_t
    $month=date("m");
    $year_nbr=date("Y");
    $date=date("Y")."-".date("m")."-".date("d");
    $date_t=$this->Usermodel->verfie_rapport($month,$year_nbr);

    if(isset($date_t) && $date_t ==""){
      $this->Usermodel->insert_rapport($date);
    }
    // rapport all month
    $msg[0]=$this->Usermodel->rapport();
     
  $label=[];
  $data=[];
  $data2=[];
  for ($i=0; $i < sizeof($msg[0]) ; $i++) { 
  
  array_push($label,$msg[0][$i]->date_t);
  array_push($data,$msg[0][$i]->income);
  array_push($data2,$msg[0][$i]->spending);

  }
  $rapport=[json_encode($label),json_encode($data),json_encode($data2)];

  $msg[0]=$rapport;

    // rapport only this month
    $msg[1]=$this->Usermodel->rapport_month(date("m"),date("Y"));
 // calcute le poursontage 
    $total=$msg[1]->spending+$msg[1]->income;
    //1. speending
   
 $msg[2]=(($msg[1]->income)*100)/$total;

 $msg[3]=(($msg[1]->spending_teacher)*100)/$total;
 $msg[4]=(($msg[1]->spending_materiel)*100)/$total;
    $this->postView= $this->view("admin/home","",$msg);

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


