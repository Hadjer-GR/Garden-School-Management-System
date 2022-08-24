<?php


class list_employ{


 private $get_all_employ='select id ,f_name,l_name,job from '.DB_NAME.'.teacher where work="yes";';


    
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











}
