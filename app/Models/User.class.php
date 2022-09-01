<?php
require_once "../app/libraries/Database.class.php";
class User
{
   // conecte la base de donne 

   private $db;
   // query 

   private $insert_user_sql = "INSERT INTO `users` ( `nom`, `prenom`, `contact`, `password`, `date`, `gener`) VALUES ( ?, ?, ?,?, ?,?);";
   private $authentication = "SELECT id FROM `user` WHERE username=? and password=?;";
   private $get_type="select type from ".DB_NAME.".user where id=?;";
  // scolaire study 

private $get_study_year="select id  from ".DB_NAME.".yearscolaire where  start_y <= ? and end_y > ?;
";

//  set  rapport table 
   private $verifie_rapport="select date_t from ".DB_NAME.".rapport_spending where month(date_t)=? and year(date_t)=?;
   ";

   private $insert_rapport="insert into ".DB_NAME.".rapport_spending (date_t)values(?);";

   private $rapport="select * from ".DB_NAME.".rapport_spending order by date_t;";
   private $rapport_month="select * from ".DB_NAME.".rapport_spending where month(date_t)=? and year(date_t)=?;";


   public function __construct()
   {
      $this->db = new Database();
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

   // inscrir
   public function insert_user($nom, $prenom, $contact, $pass, $date, $gener)
   {
      $this->db->preparedstmt($this->insert_user_sql);
      $this->db->bind_Value(1, $nom, null);
      $this->db->bind_Value(2, $prenom, null);
      $this->db->bind_Value(3, $contact, null);
      $this->db->bind_Value(4, $pass, null);
      $this->db->bind_Value(5, $date, null);
      $this->db->bind_Value(6, $gener, null);
      $this->db->executeQuery();
   }


   // autentication
   public function login($username, $pass)
   {
      $this->db->preparedstmt($this->authentication);
      $this->db->bind_Value(1, $username, null);
      $this->db->bind_Value(2, $pass, null);
      $this->db->executeQuery();

      $user_id = $this->db->fetch();

      if (isset($user_id->id)) {
         return $user_id->id;
      } else {
         return 0;
      }
     
   }

   // type of user 
   public function get_type($id)
   {
      $this->db->preparedstmt($this->get_type);
      $this->db->bind_Value(1, $id, null);

      $type=$this->db->fetch();

      return $type;
      
     
   }






/**
 * verfie if the rapprt table has been sate the date or not
 * 
 */


public function verfie_rapport($month,$year_nbr){

   $this->db->preparedstmt($this->verifie_rapport);
   $this->db->bind_Value(1, $month, null);
   $this->db->bind_Value(2, $year_nbr, null);


    $date= $this->db->fetch();
       return $date;



}


/**
 * verfie if the rapprt table has been set the date or not
 * 
 */


public function insert_rapport($date_t){

   $this->db->preparedstmt($this->insert_rapport);
   $this->db->bind_Value(1, $date_t, null);
   $this->db->executeQuery();

}






/**
 *  get rapport_spending
 * 
 */


public function rapport(){

   $this->db->preparedstmt($this->rapport);
  

    $rapport= $this->db->fetchAll();
       return $rapport;



}


/**
 *  get rapport_spending this month
 * 
 */


public function rapport_month($month,$year){

   $this->db->preparedstmt($this->rapport_month);
  
   $this->db->bind_Value(1, $month, null);
   $this->db->bind_Value(2, $year, null);

    $rapport= $this->db->fetch();
       return $rapport;



}






}
