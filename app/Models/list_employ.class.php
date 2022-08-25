<?php


class list_employ{


 private $get_all_employ='select id ,f_name,l_name,job from '.DB_NAME.'.teacher where work="yes";';

 private $get_employ_info="select id,f_name,l_name,price,nbr,job from  ".DB_NAME.".teacher where id=?;";

 private $update_employ="update ".DB_NAME.".teacher set f_name=?,l_name=?,price=?,nbr=?,job=? where id=?;";
 private $delete_employ='update '.DB_NAME.'.teacher set work="no" where id=?;';
 private $search_employ='select id,f_name,l_name,job from '.DB_NAME.'.teacher where l_name like ? and work="yes";'; 
 
 private $pay_month="insert into database_aouetef.teacher_month(month_n,year_nbr,teacher_id,year_id)values(?,?,?,?);
 ";

 private $get_nbr_have_pay="select distinct ".DB_NAME.".teacher.id from database_aouetef.teacher 

 left join ".DB_NAME.".teacher_month
 on ".DB_NAME.".teacher_month.teacher_id=".DB_NAME.".teacher.id
 where ".DB_NAME.".teacher_month.year_id=? and ".DB_NAME.".teacher_month.month_n=? and ".DB_NAME.".teacher_month.year_nbr=?;";






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


/*
*
* give the employ they are salery
*
*/


public function pay_month($month_nbr,$year_nbr,$teacher_id,$year_id){

  $this->db->preparedstmt($this->pay_month);
  $this->db->bind_Value(1,$month_nbr,null);
  $this->db->bind_Value(2,$year_nbr,null);
  $this->db->bind_Value(3,$teacher_id,null);
  $this->db->bind_Value(4,$year_id,null);
  $this->db->executeQuery();
}

/*
*
* get nbr of employes who don't get thiere salery yet in this month
*
*/


public function get_nbr_have_pay($month_nbr,$year_nbr,$year_id){

  $this->db->preparedstmt($this->get_nbr_have_pay);
  $this->db->bind_Value(1,$year_id,null);
  $this->db->bind_Value(2,$month_nbr,null);
  $this->db->bind_Value(3,$year_nbr,null); 
  $all_have=$this->db->fetchAll();  
  return $all_have;

}





}
