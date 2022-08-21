<?php 

class showclass {

 /*
    * class
    */
    private $get_class_name="select id,n_class,price from ".DB_NAME.".class where id=? and year_id=?;";
    private $get_nbr_student="select count(student_id) from ".DB_NAME.".student_class where class_id=?;";
    private $get_total_price="select count(id) from ".DB_NAME.".student_month where  month_n=? and year_nbr=? and class_id=? and year_id=?;";
    private $get_nbr_dont_pay="
    select count(".DB_NAME.".student_class.student_id) from  ".DB_NAME.".student_class  
inner join ".DB_NAME.".student_month
on ".DB_NAME.".student_class.class_id=".DB_NAME.".student_month.class_id 
  where ".DB_NAME.".student_class.class_id=? and ".DB_NAME.".student_class.student_id not in (select student_id from ".DB_NAME.".student_month where  month_n=? and year_nbr=? and class_id=? and year_id=?);

   ";



    
  public function __construct()
  {
    $this->db=new Database();
  }


  /*
    *
    * get  class name 
    */

    public function get_class_name($class_id,$year_id){

        $this->db->preparedstmt($this->get_class_name);
       
          $this->db->bind_Value(1,$class_id,null);
          $this->db->bind_Value(2,$year_id,null);
          $class=$this->db->fetch();
          
          return $class;
        
      }


       /*
    *
    * get number of student in class 
    */

    public function get_nbr_student($class_id){

      $this->db->preparedstmt($this->get_nbr_student);
     
        $this->db->bind_Value(1,$class_id,null);
        $nbr_student=$this->db->nbrfetch();
        $nbr=0;
        if(isset($nbr_student) && $nbr_student !=""){

          $nbr=$nbr_student[0];
        }
        
        return $nbr;
      
    }



    
  /*
    *
    * get  get total price this month 
    */

    public function get_total_price($month_nbr,$year_nbr,$class_id,$year_id){

      $this->db->preparedstmt($this->get_total_price);
     
        $this->db->bind_Value(1,$month_nbr,null);
        $this->db->bind_Value(2,$year_nbr,null);
        $this->db->bind_Value(3,$class_id,null);
        $this->db->bind_Value(4,$year_id,null);

        $totalprice=$this->db->nbrfetch();
        
        $price=0;
        if(isset($totalprice) && $totalprice !=""){

          $price=$totalprice[0];
        }
        
        return $price;
      
    }



     
  /*
    *
    * get nbr of student don't pay this month
    */

    public function get_nbr_dont_pay($month_nbr,$year_nbr,$class_id,$year_id){

      $this->db->preparedstmt($this->get_nbr_dont_pay);

        $this->db->bind_Value(1,$class_id,null);
        $this->db->bind_Value(2,$month_nbr,null);
        $this->db->bind_Value(3,$year_nbr,null);
        $this->db->bind_Value(4,$class_id,null);
        $this->db->bind_Value(5,$year_id,null);

        $nbr_dont_pay=$this->db->nbrfetch();

        $nbr=0;
        
        if(isset( $nbr_dont_pay) &&  $nbr_dont_pay !=""){
          $nbr= $nbr_dont_pay[0];
        }
        
        return  $nbr;
      
    }


    
    
}