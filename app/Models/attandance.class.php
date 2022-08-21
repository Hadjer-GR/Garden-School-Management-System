<?php 


class Attandance {



    private $verfie_attandance="select id from ".DB_NAME.".attandance where student_id=? and class_id=? and day_t=?;";
    private $insert_attandance="insert into database_aouetef.attandance (student_id,class_id,day_t)values(?,?,?);
    ";







    
public function __construct()
{
    $this->db=new Database();
     
}


  
  /*
    *
    * verfie id student is get attandance or not
    */

    public function verfie_attandance($student_id,$class_id,$date_t){

        $this->db->preparedstmt($this->verfie_attandance);
       
          $this->db->bind_Value(1,$student_id,null);
          $this->db->bind_Value(2,$class_id,null);
          $this->db->bind_Value(3,$date_t,null);
          $attandance=$this->db->fetch();
          
          $att=0;
          if(isset($attandance) && $attandance != ""){
          $att=$attandance->id;
          }
          
          return $att;
        
      }
  

      
  /*
    *
    * insert attandance os student 
    */

    public function insert_attandance($student_id,$class_id,$date_t){

        $this->db->preparedstmt($this->insert_attandance);
       
          $this->db->bind_Value(1,$student_id,null);
          $this->db->bind_Value(2,$class_id,null);
          $this->db->bind_Value(3,$date_t,null);   
         $this->db->executeQuery();
         $this->db->endconnect();


      }
  







}





