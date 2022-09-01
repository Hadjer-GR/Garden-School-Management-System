<?php 



class materiel extends Controllers{
   

    private $materileModel;




     public function __construct()
    {
      $this->materielModel=$this->model("materieles");
  
    }

   public function index(){
    if(isset($_SESSION["user_id"])&& isset($_SESSION["id_year_scolaire"])){
       
        $year_nbr=date("Y");
        $month=date("m");
        $year_id=$_SESSION["id_year_scolaire"];
    //1. get list materiel this month
       
        $materiel= $this->materielModel->materiel_month($month,$year_nbr,$year_id);
         $msg[2]=$materiel;
     // 3. get spendding materiel 
        $msg[3]=$this->materielModel->spending_m($month,$year_nbr); 
        if(isset($_SESSION["complet_m"])){
            $msg[0]=$_SESSION["complet_m"];
            $_SESSION["complet_m"]=null;
        }
      
        $this->postview=$this->view("admin/materiel","materiel",$msg);




    }else{
        redirect("sections");
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

    if(isset($_SESSION["user_id"]) && ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_SESSION["id_year_scolaire"])){
      
       $name=$_POST["name"];
        $nbr=$_POST["nbr"];
        $price=$_POST["price"];
        $date_t=date("Y")."-".date("m")."-".date("d");
        $year_id=$_SESSION["id_year_scolaire"];
   // add materiel
       $this->materielModel->insert_materiel($date_t,$nbr,$price,$year_id,$name);
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
/*
* delete materiel 
*
*/
public function delete(){
    if(isset($_SESSION["user_id"]) ){
        $id=$_GET["id"];
        $this->materielModel->delete_materiel($id);
         $msg[0]="تم الحذف بنجاح";
         $_SESSION["complet_m"]=$msg[0];
         redirect("materiel");


    }else{
        redirect("");
    }

}

/*
* edite materiel 
*
*/
public function edite(){
    if(isset($_SESSION["user_id"])&& ($_SERVER['REQUEST_METHOD'] == 'GET') ){
        $id=$_GET["id"];
        $msg[0]="editemateriel";
         
       $msg[2] =$this->materielModel->get_materiel($id);
        $this->postview=$this->view("admin/addmateriel","materiel",$msg);

        

    }else{
        redirect("");
    }

}

/*
* update  materiel 
*
*/
public function update(){
    if(isset($_SESSION["user_id"]) ){
        
    
     
        $name=$_POST["name"];
        $nbr=$_POST["nbr"];
        $price=$_POST["price"];
        $id=$_POST["id"];


        $_SESSION["complet_m"]="تم التعديل بنجاح";
        $this->materielModel->update_materiel($name,$nbr,$price,$id);
        redirect("materiel");

        

    }else{
        redirect("");
    }

}

/***
 *  all materiell
 * 
 */

 public function list(){

    if(isset($_SESSION["user_id"]) ){

      $year_id=$_SESSION["id_year_scolaire"];
      $all_materiel= $this->materielModel->all_materile($year_id);
      $msg[2]=$all_materiel;
      $this->postview=$this->view("admin/listMateriel","materiel",$msg);


  

    }else{
        redirect("");
    }




 }


}