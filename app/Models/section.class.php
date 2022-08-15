<?php

class Section {

// scolaire study 

private $insert_year_scolaire="insert into database_aouetef.yearscolaire (start_y,end_y)values(?,?);";


public function __construct()
{
    $this->db=new Database();
     
}

// scolaire 

public function insert_scolaire_y($start_y,$end_y){

    $this->db->preparedstmt($this->insert_year_scolaire);

      $this->db->bind_Value(1,$start_y,null);
      $this->db->bind_Value(2,$end_y,null);
    $this->db->executeQuery();
    
}





}

