<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    if (!empty($data)) {
        // Decode the JSON data
        $requestData = json_decode($data);

        // Check if the ratingID parameter is set
        if(isset($requestData->ratingID)) {
            $ratingID = $requestData->ratingID;

            include_once("../../model/seller/hideRating.php");

            error_log("Received ratingID: " . $ratingID);

            $success = hideRating($mysqli, $ratingID);

            if ($success) {
                http_response_code(200);
                echo json_encode(array("message" => "Rating status updated successfully."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Failed to update rating status."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Rating ID not provided."));
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
