<?php
  $response = array();

  if(isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    require_once "db_connection.php";

    $db = new DB_CONNECT();
    $db = $db->connect();
    $sql = "DELETE FROM products WHERE pid = $pid";
    $result = mysqli_query($db , $sql);

    if(mysqli_affected_rows($db) > 0) {
      $response["success"] = 1;
      $response["message"] = "Product successfully deleted";
      //to json
      echo json_encode($response);
    }else {
      $response["success"] = 0;
      $response["message"] = "No product found";

      //to json
      echo json_encode($response);
      $db->close();
    }
  }else {
    $response["success"] = 0;
    $response["message"] = "Required field is missing";

    //to json
    echo json_encode($response);
  }
 ?>
