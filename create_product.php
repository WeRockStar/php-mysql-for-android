<?php
  // array for JSON response
  $response = array();
  //check for require field
  if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) ){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    require_once "db_connection.php";
    $db = new DB_CONNECT();
    //sql statements
    $sql = "INSERT INTO products(name, price, description) VALUES('$name', '$price', '$description')";
    //query
    $db->mysqli_query($sql);

    if ($db){
      // successfully inserted into database
       $response["success"] = 1;
       $response["message"] = "Product successfully created.";
       // echoing JSON response
       echo json_encode($response);
   } else {
       // failed to insert row
       $response["success"] = 0;
       $response["message"] = "Oops! An error occurred.";
       // echoing JSON response
       echo json_encode($response);
   }
 }else {
   $response["success"] = 0;
   $response["message"] = "Required field is missing";

   echo json_encode($response);
 }
 ?>
