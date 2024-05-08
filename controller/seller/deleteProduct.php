<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    if (!empty($data)) {
        // Decode the JSON data
        $requestData = json_decode($data);

        // Check if the productID parameter is set
        if(isset($requestData->productID)) {

            $productID = $requestData->productID;

            include_once("../../model/seller/deleteProduct.php");

            error_log("Received productID: " . $productID);

            $success = deleteProduct($mysqli, $productID);

            if ($success) {
                http_response_code(200);
                echo json_encode(array("message" => "Delete product successfully."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Failed to delete product."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Product ID not provided."));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "No data received."));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method Not Allowed"));
}
?>
