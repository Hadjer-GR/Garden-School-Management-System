<?php 

class showclass {

 /*
    * class
    */
    private $get_class_name="select id,n_class,price from ".DB_NAME.".class where id=? and year_id=?;";
    private $get_nbr_student="select count(student_id) from ".DB_NAME.".student_class where class_id=?;";
    private $get_total_price="select count(id) from ".DB_NAME.".student_month where  month_n=? and year_nbr=? and class_id=? and year_id=?;";
    private $get_nbr_dont_pay="
    select  count(database_aouetef.student_class.student_id) from database_aouetef.student_class  
  where class_id=? and  database_aouetef.student_class.student_id not in (select student_id from database_aouetef.student_month where  month_n=? and year_nbr=? and class_id=? and year_id=?);
";
   
   private $get_student="select id,f_name,l_name  from ".DB_NAME.".student 
   where  id in (select student_id from ".DB_NAME.".student_class where class_id=?) and year_id=? ;";

  private $get_student_month=" select student_id from ".DB_NAME.".student_month where class_id=? and month_n=? and year_id=?;";
  
  private $get_attandance='select student_id from '.DB_NAME.'.attandance where class_id=? and day_t=?;';

  private $student_pay="insert into ".DB_NAME.".student_month(month_n,year_nbr,class_id,student_id,year_id)values(?,?,?,?,?);";
  private $delete_student="delete  from ".DB_NAME.".student_class where  student_id=?  and class_id=?;";  





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


    
  /*
    *
    * get  student in class f_name ,_l_name ,id
    *
    */

    public function get_student($class_id,$year_id){

      $this->db->preparedstmt($this->get_student);
     
        $this->db->bind_Value(1,$class_id,null);
        $this->db->bind_Value(2,$year_id,null);
        $student=$this->db->fetchAll();
        
        return $student;
      
    }


     
  /*
    *
    * get  id of student who pay this month
    */

    public function get_student_month($class_id,$month_nbr,$year_id){

      $this->db->preparedstmt($this->get_student_month);

        $this->db->bind_Value(1,$class_id,null);
        $this->db->bind_Value(2,$month_nbr,null);
        $this->db->bind_Value(3,$year_id,null);

        $student_month=$this->db->fetchAll();
        
        return $student_month;
      
    }


    
  /*
    *
    * get  class name 
    */

    public function get_attandance($class_id,$date_t){

      $this->db->preparedstmt($this->get_attandance);
     
        $this->db->bind_Value(1,$class_id,null);
        $this->db->bind_Value(2,$date_t,null);
        $attandance=$this->db->fetchAll();
        
        return $attandance;
      
    }








    /*
    * student_pay this month 
    *
    */


    public function student_pay($month_nbr,$year_nbr,$class_id,$student_id,$year_id){

      $this->db->preparedstmt($this->student_pay);

        $this->db->bind_Value(1,$month_nbr,null);
        $this->db->bind_Value(2,$year_nbr,null);
        $this->db->bind_Value(3,$class_id,null);
        $this->db->bind_Value(4,$student_id,null);
        $this->db->bind_Value(5,$year_id,null);
        $this->db->executeQuery();
      

      
    }


    
    /*
    *  delete student from this class
    *
    */


    public function delete_student($student_id,$class_id){

      $this->db->preparedstmt($this->delete_student);

        $this->db->bind_Value(1,$student_id,null);
        $this->db->bind_Value(2,$class_id,null);
       
        $this->db->executeQuery();
      

      
    }




    
}