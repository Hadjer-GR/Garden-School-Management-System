<?php

class Teacher {

// teacher 

private $insert_teacher="insert into database_aouetef.teacher (f_name,l_name,price,nbr,job,work)values (?,?,?,?,?,?);";



public function __construct()
{
    $this->db=new Database();
     
}





/*
*
* insert employ
*
*/


public function insert_teacher($f_name,$l_name,$price,$job,$numero){

    $this->db->preparedstmt($this->insert_teacher);
  
      $this->db->bind_Value(1,$f_name,null);
      $this->db->bind_Value(2,$l_name,null);
      $this->db->bind_Value(3,$price,null);
      $this->db->bind_Value(4,$numero,null);
      $this->db->bind_Value(5,$job,null);
      $this->db->bind_Value(6,"yes",null);
      $this->db->executeQuery();
    
  }
  




}