<?php 



class materiel extends Controllers{
   

    private $materileModel;




     public function __construct()
    {
      $this->materielModel=$this->model("materieles");
  
    }

   public function index(){
    if(isset($_SESSION["user_id"])){

    
        $this->postview=$this->view("admin/materiel","materiel");




    }else{
        redirect("");
    }
   }


/*
 * 
 * 
 */


 public function addMateriel(){
    if(isset($_SESSION["user_id"])){
      $msg[0]="addmateriel";
    
        $this->postview=$this->view("admin/addmateriel","materiel",$msg);




    }else{
        redirect("");
    }

 }

public function materielAdd(){

    if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'POST')){
      
        $nbr=$_POST["nbr"];
        $price=$_POST["price"];
        $date_t=date("Y")."-".date("m")."-".date("d");

   // add materiel
       $this->materielModel->insert_materiel($date_t,$nbr,$price);
       $_SESSION["complet"]="تم الاظافة بنجاح";
         redirect("materiel/materiel_view");

      }else{
          redirect("");
      }


}

/*
* after add or edite or delete
*
*/

public function materiel_view(){
    $msg[0]="addmateriel";
    if(isset($_SESSION["user_id"]) ){
       if(isset($_SESSION["complet"])){
        $msg[1]=$_SESSION["complet"];
        $_SESSION["complet"]=null;
       }
        $this->postview=$this->view("admin/addmateriel","materiel",$msg);

      }else{
          redirect("");
      }


}


}