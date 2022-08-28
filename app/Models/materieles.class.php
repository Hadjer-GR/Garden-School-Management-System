<?php



class materieles{

    // add materiel 

private $insert_materiel="insert into ".DB_NAME.".materiel (date_m,nbr,price,year_id,name)values(?,?,?,?,?);";
private $materiel_month="select id,nbr,price,name,date_m from ".DB_NAME.".materiel where month(date_m)=? and year(date_m)=? and year_id=? order by date_m DESC ;";
private $all_materiel="select id,name,date_m,nbr,price from ".DB_NAME.".materiel where year_id=? order by date_m DESC;";
private $spending_m="select spending_materiel from ".DB_NAME.".rapport_spending where month(date_t)=? and year(date_t)=?;";

private $delete_m=" delete  FROM ".DB_NAME.".materiel where id=?;";
private $get_materiel="select id,name,nbr,price from ".DB_NAME.".materiel where id=?;";
private $update="update ".DB_NAME.".materiel set name=?,nbr=?,price=? where id=?;";


    
    public function __construct()
    {
        $this->db=new Database();
         
    }
    

       
  /*
    *
    * insert materiel  
    */

    public function insert_materiel($date_t,$nbr,$price,$year_id,$name){

        $this->db->preparedstmt($this->insert_materiel);
       
          $this->db->bind_Value(1,$date_t,null);
          $this->db->bind_Value(2,$nbr,null);
          $this->db->bind_Value(3,$price,null);
          $this->db->bind_Value(4,$year_id,null);
          $this->db->bind_Value(5,$name,null);   
   
         $this->db->executeQuery();


      }



/*
* select all materiels  this month
*
*/

public function materiel_month($month,$year_nbr,$year_id){

  $this->db->preparedstmt($this->materiel_month);
       
  $this->db->bind_Value(1,$month,null);
  $this->db->bind_Value(2,$year_nbr,null);
  $this->db->bind_Value(3,$year_id,null);
  $materiel=  $this->db->fetchAll();

 return $materiel;


}




/*
* select all materiels  this year 
*
*/

public function all_materile($year_id){

  $this->db->preparedstmt($this->all_materiel);
       
  $this->db->bind_Value(1,$year_id,null);

   $all_materiel=$this->db->fetchAll();
   return $all_materiel;




}


     
  /*
    *
    * get spending materiel this month
    */

    public function spending_m($month,$year_nbr){

      $this->db->preparedstmt($this->spending_m);
     
        $this->db->bind_Value(1,$month,null);
        $this->db->bind_Value(2,$year_nbr,null);
       
 
       $spending_materiel= $this->db->fetchAll();
       return $spending_materiel;


    }


      
  /*
    *
    * delete materiel
    */

    public function delete_materiel($id){

      $this->db->preparedstmt($this->delete_m);
     
        $this->db->bind_Value(1,$id,null);
        $this->db->executeQuery();


    }

       
  /*
    *
    * edite  materiel
    */


    public function get_materiel($id){

      $this->db->preparedstmt($this->get_materiel);

         $this->db->bind_Value(1,$id,null);
       
         $spending_materiel= $this->db->fetchAll();
         return $spending_materiel;

    }


   
  /*
    *
    * update materiel  
    */

    public function update_materiel($name,$nbr,$price,$id){

      $this->db->preparedstmt($this->update);

        $this->db->bind_Value(1,$name,null);   
        $this->db->bind_Value(2,$nbr,null);
        $this->db->bind_Value(3,$price,null);
        $this->db->bind_Value(4,$id,null);
 
       $this->db->executeQuery();


    }





}