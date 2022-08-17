<?php

class Controllers{

public function model($model){
  require_once "../app/Models/".ucwords($model).".class.php";
  return new $model;
}
public function view($view,$data=[],$msg=[]){

    if(file_exists("../app/View/".$view.".php")){
    require_once "../app/View/".$view.".php";
    } else{
     die("no views");
    }




}

}
