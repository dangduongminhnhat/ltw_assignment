<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    if (!empty($data)) {
        // Decode the JSON data
        $requestData = json_decode($data);

        // Check if the notiID parameter is set
        if(isset($requestData->notiID)) {
            $accountID = '1';
            $notiID = $requestData->notiID;

            include_once("../../model/seller/deleteNoti.php");

            error_log("Received notiID: " . $notiID);

            $success = deleteNoti($mysqli, $accountID, $notiID);

            if ($success) {
                http_response_code(200);
                echo json_encode(array("message" => "Notification status updated successfully."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Failed to update notification status."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "Notification ID not provided."));
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
