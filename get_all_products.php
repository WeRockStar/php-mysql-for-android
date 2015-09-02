<?php
  $response = array();
  require_once "./db_connection.php";

  //connect to db
  $db = new DB_CONNECT();
  $db = $db->connect();
  $sql = "SELECT * FROM products";
  $result = mysqli_query($db , $sql);
  //now of row
  if($result->num_rows > 0) {
    $response["products"] = array();
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["pid"] = $row["pid"];
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        $product["created_at"] = $row["created_at"];
        $product["updated_at"] = $row["updated_at"];

        // push single product into final response array
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;

    //encode to json
    echo json_encode($response);
  } else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
    // echo no users JSON
    echo json_encode($response);
  }
  $db->close();
 ?>
