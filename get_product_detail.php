<?php
  $response = array();
  require_once "db_connection.php";
  // connection to db
  $db = new DB_CONNECT();

//check exist data
  $_GET['pid'] = 1;
  if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $sql = "SELECT *FROM products WHERE pid = $pid";
    try {
        $result = mysqli_query($db , $sql);
    } catch (Exception $e) {
      echo mysqli_connect_error();
    }

    if ($result) {
      //count of row
      if ($db->num_rows){
        $result = mysqli_fetch_array($result);

        $product = array();
            $product["pid"] = $result["pid"];
            $product["name"] = $result["name"];
            $product["price"] = $result["price"];
            $product["description"] = $result["description"];
            $product["created_at"] = $result["created_at"];
            $product["updated_at"] = $result["updated_at"];
            // success
            $response["success"] = 1;

            // user node
            $response["product"] = array();

            array_push($response["product"], $product);

            // echoing JSON response
            echo json_encode($response);
      }else {
        $response["success"] = 0;
        $response["message"] = "No product found";
        //to json
        echo json_encode($response);
      }
    } else {
      // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

        // echo no users JSON
        echo json_encode($response);
    }
  }else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
  }
 ?>
