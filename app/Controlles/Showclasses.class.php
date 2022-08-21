<?php 



class Showclasses extends Controllers{
   

    private $showclassModel;



     public function __construct()
    {
      $this->showclassModel=$this->model("showclass");
  
    }


    public function index(){

        if(($_SERVER['REQUEST_METHOD'] == 'GET') &&  isset($_SESSION["user_id"])){
     
            $class_id=$_GET["class_id"];
            
            $_SESSION["class_id"]=$class_id;

            if(isset($_SESSION["complet"])){
              $_SESSION["complet"]=null;
              
      
            }
            if(isset($_SESSION["id_year_scolaire"])){
                $year_id=$_SESSION["id_year_scolaire"];
 
                
             $class=$this->showclassModel->get_class_name($class_id,$year_id);
              $class_name=$class->n_class;
              $msg[0]=$class_name;
              $price=$class->price;
         //2. get total price this month
         
           $month_nbr=date("m");
           $year_nbr=date("Y");

           $totalprice=$this->showclassModel->get_total_price($month_nbr,$year_nbr,$class_id,$year_id);
          $msg[1]=$totalprice*$price;

          // 3. get nbr of student in class 

            $nbr_student=$this->showclassModel->get_nbr_student($class_id);

             $msg[2]=$nbr_student;
          // 4. nbr of student don't  pay this month 

          $nbr_dont_pay=$this->showclassModel->get_nbr_dont_pay($month_nbr,$year_nbr,$class_id,$year_id);
          $msg[3]=$nbr_dont_pay;
          

            }
             $this->postview=$this->view("admin/showclass","section",$msg);
      
            
            
      
            }else{
          redirect("");
      
        }

    }





}