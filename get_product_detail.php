<?php

$response = array();
require_once "./db_connection.php";
// connection to db
$db = new DB_CONNECT();
$db = $db->connect();

//check exist data
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $sql = "SELECT *FROM products WHERE pid = $pid";

    $result = mysqli_query($db , $sql);

    if ($result) {
        //count of row
        if ($result->num_rows > 0) {
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
        } else {
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
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($response);
}
$db->close();
?>
