<?php 

class showclass {

 /*
    * class
    */
    private $get_class_name="select id,n_class from database_aouetef.class where id=? and year_id=?;";





    
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
          $class_name=$this->db->fetch();
          
          return $class_name->n_class;
        
      }

    
    
}