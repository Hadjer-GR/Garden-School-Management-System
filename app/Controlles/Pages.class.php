<?php
 
class Pages extends Controllers{



  private $Usermodel;

  public function __construct()
  {
    $this->Usermodel=$this->model("User");

  }
  public function index()
  {
   
   $this->postView=$this->view("login") ;

  
  }
   
  public function home(){
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
  array_push($label, $msg[0][$i]->date_t);
  array_push($data,$msg[0][$i]->income);
  array_push($data2,$msg[0][$i]->spending);

  }
  $rapport=[json_encode($label),json_encode($data),json_encode($data2)];

  $msg[0]=$rapport;

   // rapport only this month
   $msg[1]=$this->Usermodel->rapport_month(date("m"),date("Y"));
 // calcute le poursontage 
 $total=$msg[1]->spending+$msg[1]->income;

 if($total != 0) {
  $msg[2]=(($msg[1]->income)*100)/$total;
  $spend=(($msg[1]->spending)*100)/$total;

  $msg[3]=(($msg[1]->spending_teacher)*100)/$total;
  $msg[4]=(($msg[1]->spending_materiel)*100)/$total;
}else{
  $msg[2]=0;

  $msg[3]=0;
  $msg[4]=0;
}


   $this->postView= $this->view("admin/home","",$msg);
  }




}
