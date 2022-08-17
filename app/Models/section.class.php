<?php

class Section {

// scolaire study 

private $insert_year_scolaire="insert into database_aouetef.yearscolaire (start_y,end_y)values(?,?);";
private $get_study_year="select id  from database_aouetef.yearscolaire where  start_y <= ? and end_y > ?;
";

// add class 
private $insert_class="insert into  database_aouetef.class (n_class,price,teacher_id,year_id,nbr_session)values(?,?,?,?,?);";
private $get_all_class="select database_aouetef.class.id,n_class,f_name,l_name 
from database_aouetef.class
 left join database_aouetef.teacher
on database_aouetef.class.teacher_id=database_aouetef.teacher.id;";









public function __construct()
{
    $this->db=new Database();
     
}

/*
* insert year scolaire 
*/

public function insert_scolaire_y($start_y,$end_y){

    $this->db->preparedstmt($this->insert_year_scolaire);

      $this->db->bind_Value(1,$start_y,null);
      $this->db->bind_Value(2,$end_y,null);
    $this->db->executeQuery();
    
}

/*
*
* get id of the right period study 
*
*/


public function get_study_year(){

  $this->db->preparedstmt($this->get_study_year);
  // the date od the day 
    $today_date=date("Y-m-d");
    $this->db->bind_Value(1,$today_date,null);
    $this->db->bind_Value(2,$today_date,null);
    $id_year_scolaire=$this->db->fetch();
    $id=0;
   if(isset( $id_year_scolaire)&& $id_year_scolaire !=""){
    $id=$id_year_scolaire->id;
   }
    return $id;
  
}


/*
*
* insert a class
*
*/


public function insert_class($class_n,$session_nbr,$price, $teacher_id,$year_id){

  $this->db->preparedstmt($this->insert_class);

    $this->db->bind_Value(1,$class_n,null);
    $this->db->bind_Value(2,$price,null);
    $this->db->bind_Value(3,$teacher_id,null);
    $this->db->bind_Value(4,$year_id,null);
    $this->db->bind_Value(5,$session_nbr,null);
    $this->db->executeQuery();
  
}

/*
*
* get all the classes
*
*/




public function get_all_class(){

  $this->db->preparedstmt($this->get_all_class);

  $all_class=$this->db->fetchAll();

  return $all_class;

  
}



}

