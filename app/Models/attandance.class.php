<?php 


class Attandance {



    private $verfie_attandance="select id from ".DB_NAME.".attandance where student_id=? and class_id=? and day_t=?;";
    private $insert_attandance="insert into ".DB_NAME.".attandance (student_id,class_id,day_t)values(?,?,?);
    ";

   private $get_id_student="select id from ".DB_NAME.".student where id=?;";
   private $insert_qr_code="insert into ".DB_NAME.".qr_code(student_id,date_t,day_t,time_t)values(?,?,?,?);
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


      }
  



/*
    *
    * check if the id capture by qr-code is correct
    */

    public function student_id($id){

      $this->db->preparedstmt($this->get_id_student);
     
        $this->db->bind_Value(1,$id,null);
        $attandance=$this->db->fetch();
        
        $att=0;
        if(isset($attandance) && $attandance != ""){
        $att=$attandance->id;
        }
        
        return $att;
      
    }

   
  /*
    *
    * insert qr_ attandance
    */

    public function qr_attandance($id,$date_t,$day,$time){

      $this->db->preparedstmt($this->insert_qr_code);
     
        $this->db->bind_Value(1,$id,null);
        $this->db->bind_Value(2,$date_t,null); 
        $this->db->bind_Value(3,$day,null); 
        $this->db->bind_Value(4,$time,null);   
  
       $this->db->executeQuery();


    }


    /*
    *
    * update attandance table after recorde 
    */




}





