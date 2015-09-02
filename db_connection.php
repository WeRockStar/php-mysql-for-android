<?php
  class DB_CONNECT {
    //initial constrcutor
    function __construct(){
      $this->connect();
    }
    function connect(){
      require_once "db_config.php";
      //connection db
      $conn = @mysqli_connect("localhost" , "root" , "" , "android_mysql");

      if($conn->connect_error){
         echo "Connection Error : ".$conn->connect_error;
      }else{
        //echo "Success";
      }
      return $conn;
    }
  }

  $db = new DB_CONNECT();
 ?>
