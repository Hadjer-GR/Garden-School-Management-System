<?php

class Section {

// scolaire study 

private $insert_year_scolaire="insert into database_aouetef.yearscolaire (start_y,end_y)values(?,?);";
private $get_study_year="select id  from database_aouetef.yearscolaire where  start_y <= ? and end_y > ?;
";


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
    return $id_year_scolaire;
  
}




}

