<?php



class list_student{


private $get_all_student="select id,f_name,l_name,date_birth  from ".DB_NAME.".student  where year_id=?;";
private $get_student_info="select * from ".DB_NAME.".student where id=? and year_id=?;";

private $get_parent_info="select * from ".DB_NAME.".parent_student where id=?;";
private $get_class_stud="select class_id from ".DB_NAME.".student_class where student_id=?;";


    
public function __construct()
{
    $this->db=new Database();
     
}


/*
*
* get list of all student in the shcoole
*
*/


public function get_all_student($year_id){

    $this->db->preparedstmt($this->get_all_student);
    
      $this->db->bind_Value(1,$year_id,null);
       $all_student=$this->db->fetchAll();
   
      return $all_student;
    
  }

  /*
  * get student information 
  */
  
public function get_student_info($id,$year_id){

    $this->db->preparedstmt($this->get_student_info);

      $this->db->bind_Value(1,$id,null);
      $this->db->bind_Value(2,$year_id,null);
       $student=$this->db->fetchAll();
   
      return $student;
    
  }

  /*
  * get parent information of student 
  *
  */


  public function get_parent_info($parent_id){

    $this->db->preparedstmt($this->get_parent_info);

      $this->db->bind_Value(1,$parent_id,null);
       $parent=$this->db->fetchAll();
   
      return $parent;
    
  }

   /*
  * get class of student 
  *
  */


  public function get_class_stud($student_id){

    $this->db->preparedstmt($this->get_class_stud);

      $this->db->bind_Value(1,$student_id,null);
       $class_stud=$this->db->fetchAll();
   
      return $class_stud;
    
  }


}