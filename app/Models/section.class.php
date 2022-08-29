<?php

class Section {

// scolaire study 

private $insert_year_scolaire="insert into ".DB_NAME.".yearscolaire (start_y,end_y)values(?,?);";
private $get_study_year="select id  from ".DB_NAME.".yearscolaire where  start_y <= ? and end_y > ?;
";

// add class 
private $insert_class="insert into  ".DB_NAME.".class (n_class,price,teacher_id,year_id)values(?,?,?,?);";
private $get_all_class="select ".DB_NAME.".class.id,n_class,f_name,l_name 
from ".DB_NAME.".class
 left join ".DB_NAME.".teacher
on ".DB_NAME.".class.teacher_id=".DB_NAME.".teacher.id where year_id=? order by n_class;";

//teacher class


private $get_teachers='select id,f_name,l_name from '.DB_NAME.'.teacher where job=" (ة) استاذ" and  work ="yes" ;';


private $verfie_class_1="select student_id from ".DB_NAME.".student_class where class_id=?;";
private $verfie_class_2="select id from ".DB_NAME.".attandance where class_id=?;";
private $delete_class="delete from ".DB_NAME.".class where id=?;";

private $get_class_info="select * from ".DB_NAME.".class where id=?;";
private $update_class="update ".DB_NAME.".class set n_class=?, price=? , teacher_id=?  where id=?;
";
// emploi de temp 

private $verifie_salle_sql="select  id,start_t,end_t from ".DB_NAME.".emploi where start_t=? and day=? and  salle=?;";
private $verifie_salle2_sql="select  id,start_t,end_t from ".DB_NAME.".emploi where end_t=? and day=? and  salle=?;";
private $insert_emploi="insert into ".DB_NAME.".emploi (start_t,end_t,day,class_id,salle)values(?,?,?,?,?);
";

private $all_emploi="select id ,start_t,end_t,day,salle from ".DB_NAME.".emploi  where  class_id=? order by start_t;";

private $delete_emploi="delete from ".DB_NAME.".emploi where id=?;";



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


public function insert_class($class_n,$price, $teacher_id,$year_id){

  $this->db->preparedstmt($this->insert_class);

    $this->db->bind_Value(1,$class_n,null);
    $this->db->bind_Value(2,$price,null);
    $this->db->bind_Value(3,$teacher_id,null);
    $this->db->bind_Value(4,$year_id,null);
    $this->db->executeQuery();
  
}

/*
*
* get all the classes
*
*/




public function get_all_class($year_id){

  $this->db->preparedstmt($this->get_all_class);
  $this->db->bind_Value(1,$year_id,null);

  $all_class=$this->db->fetchAll();

  return $all_class;

  
}

/*
* teacher class 
*
*/

public function get_teacher_class(){

  $this->db->preparedstmt($this->get_teachers);

  $teacher_class=$this->db->fetchAll();

  return $teacher_class;

  
}



/*
*
* verfie id there are students in class or not 
*
*/


public function verfie_class_1($class_id){

  $this->db->preparedstmt($this->verfie_class_1);
  $this->db->bind_Value(1,$class_id,null); 
  $nbr=$this->db->fetchAll();

  $id=1;
  if(isset($nbr) && sizeof($nbr)!=""){
    $id=0;
  }
      
    return $id;
  
}

/*
*
* verfie  there before attandance in this class 
*/


public function verfie_class_2($class_id){

  $this->db->preparedstmt($this->verfie_class_2);
  $this->db->bind_Value(1,$class_id,null); 
  $nbr=$this->db->fetchAll();

  $id_2=1;
  if(isset($nbr) && sizeof($nbr)!=""){
    $id_2=0;
  }
      
    return $id_2;
  
}

/*
*
* delete class
*
*/


public function delete_class($class_id){

  $this->db->preparedstmt($this->delete_class);
  $this->db->bind_Value(1,$class_id,null); 
  $this->db->executeQuery();
  
}


/*
*
* get class information 
*
*/


public function get_class_info($class_id){

  $this->db->preparedstmt($this->get_class_info);
  
    $this->db->bind_Value(1,$class_id,null);
    $clas_info=$this->db->fetch();
   
    return $clas_info;
  
}


/*
* update class information 
*/


public function update_class($class_n,$price, $teacher_id,$class_id){

  $this->db->preparedstmt($this->update_class);

    $this->db->bind_Value(1,$class_n,null);
    $this->db->bind_Value(2,$price,null);
    $this->db->bind_Value(3,$teacher_id,null);
    $this->db->bind_Value(5,$class_id,null);

    $this->db->executeQuery();
  
}


/*
*
* verfie si la salle est disponible ou no 
*
*/


public function verfie_emploi_1($start_t,$day,$salle){

  $this->db->preparedstmt($this->verifie_salle_sql);
  $this->db->bind_Value(1,$start_t); 
   $this->db->bind_Value(2,$day); 
   $this->db->bind_Value(3,$salle); 

  $emploi=$this->db->fetchAll();

  
    return $emploi;
  
}

public function verfie_emploi_2($start_t,$day,$salle){

  $this->db->preparedstmt($this->verifie_salle2_sql);
  $this->db->bind_Value(1,$start_t); 
  $this->db->bind_Value(2,$day); 
  $this->db->bind_Value(3,$salle); 
  $emploi=$this->db->fetchAll();

    return $emploi;
  
}



/*
*
* insert a emploi temp 
*
*/


public function insert_emploi($start_t,$end_t,$day,$class_id,$salle){

  $this->db->preparedstmt($this->insert_emploi);

    $this->db->bind_Value(1,$start_t,null);
    $this->db->bind_Value(2,$end_t,null);
    $this->db->bind_Value(3,$day,null);
    $this->db->bind_Value(4,$class_id,null);
    $this->db->bind_Value(5,$salle,null);

    $this->db->executeQuery();
  
}




/*
*
* get all emploi de temp de this class
*
*/




public function all_emploi($class_id){

  $this->db->preparedstmt($this->all_emploi);
  $this->db->bind_Value(1,$class_id,null);

  $all_emploi=$this->db->fetchAll();

  return $all_emploi;

  
}


/*
*
* delete un emploi 
*
*/




public function delete_emploi($id){

  $this->db->preparedstmt($this->delete_emploi);
  $this->db->bind_Value(1,$id,null);

  $this->db->executeQuery();


  
}





}

