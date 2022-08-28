<?php



class materieles{

    // add materiel 

private $insert_materiel="insert into ".DB_NAME.".materiel (date_m,nbr,price)values(?,?,?);";



    
    public function __construct()
    {
        $this->db=new Database();
         
    }
    

       
  /*
    *
    * insert attandance os student 
    */

    public function insert_materiel($date_t,$nbr,$price){

        $this->db->preparedstmt($this->insert_materiel);
       
          $this->db->bind_Value(1,$date_t,null);
          $this->db->bind_Value(2,$nbr,null);
          $this->db->bind_Value(3,$price,null);   
         $this->db->executeQuery();


      }










}