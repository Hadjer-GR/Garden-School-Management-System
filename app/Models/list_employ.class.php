<?php


class list_employ{


 private $get_all_employ='select id ,f_name,l_name,job from '.DB_NAME.'.teacher where work="yes";';

 private $get_employ_info="select id,f_name,l_name,price,nbr,job from  ".DB_NAME.".teacher where id=?;";

 private $update_employ="update ".DB_NAME.".teacher set f_name=?,l_name=?,price=?,nbr=?,job=? where id=?;";
 private $delete_employ='update '.DB_NAME.'.teacher set work="no" where id=?;';
 private $search_employ='select id,f_name,l_name,job from '.DB_NAME.'.teacher where l_name like ? and work="yes";';   
    public function __construct()
    {
        $this->db=new Database();
         
    }



/*
*
* get list of all employes in the shcoole
*
*/


public function get_all_employ(){

    $this->db->preparedstmt($this->get_all_employ);
    
       $all_employ=$this->db->fetchAll();  
       return $all_employ;
    
  }



  
/*
*
* get all  information of this employ
*
*/


public function get_employ_info($id){

    $this->db->preparedstmt($this->get_employ_info);
    $this->db->bind_Value(1,$id,null);

       $employ_id=$this->db->fetchAll();  
       return $employ_id;
    
  }

  
public function update_employ($f_name,$l_name,$price,$job,$numero,$id){

    $this->db->preparedstmt($this->update_employ);
  
      $this->db->bind_Value(1,$f_name,null);
      $this->db->bind_Value(2,$l_name,null);
      $this->db->bind_Value(3,$price,null);
      $this->db->bind_Value(4,$numero,null);
      $this->db->bind_Value(5,$job,null);
      $this->db->bind_Value(6,$id,null);

      $this->db->executeQuery();
    
  }
  
  /*
  *
  * delete an employ from teacher table 
  */

   
public function delete_employ($id){

    $this->db->preparedstmt($this->delete_employ);

      $this->db->bind_Value(1,$id,null);
      $this->db->executeQuery();
    
  }
  



/*
*
* get list of all employes that match the search input
*
*/


public function search_employ($search){

    $this->db->preparedstmt($this->search_employ);
    $this->db->bind_Value(1,$search,null);
       $all_employ=$this->db->fetchAll();  
       return $all_employ;
    
  }








}
