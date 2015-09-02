<?php
  class DB_CONNECT {
    //initial constrcutor
    function __construct(){
      $this->connect();
    }

    //destruct
    function __destruct(){
      //$this->close();
    }

    function connect(){
      require_once "db_config.php";
      //connection db
      $conn = @new mysqli(server , username , password , database);

      if($conn->connect_error){
         echo "Connection Error : ".$conn->connect_error;
      }else{
        //echo "Success";
      }
      return $conn;
    }

    function close(){
      $conn = $this->connect();
      $conn->close();
    }
  }

  $db = new DB_CONNECT();
 ?>
