<?php
  $response = array();

  if(isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    require_once "db_connection.php";

    $db = new DB_CONNECT();
    $db = $db->connect();
    $sql = "UPDATE products SET name = '$name', price = '$price', description = '$description' WHERE pid = $pid";
    $result = mysqli_query($db , $sql);

    //check valid
    if($result) {
      $response["success"] = 1;
      $response["message"] = "Products successfully updated.";

      //to json
      echo json_encode($response);
      $db->close();
    }else { }
  }else {
    //data is missing
    $response["success"] = 0;
    $response["message"] = "Required field is missing";

    echo json_encode($response);
  }
 ?>
