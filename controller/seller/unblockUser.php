<?php
include_once("../../model/connectdb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the raw POST data
    $data = file_get_contents("php://input");

    if (!empty($data)) {
        // Decode the JSON data
        $requestData = json_decode($data);

        // Check if the userID parameter is set
        if(isset($requestData->userID)) {
            $userID = $requestData->userID;

            include_once("../../model/seller/unblockUser.php");

            error_log("Received userID: " . $userID);

            $success = unblocktUser($mysqli, $userID);

            if ($success) {
                http_response_code(200);
                echo json_encode(array("message" => "Unblock user successfully."));
            } else {
                http_response_code(500);
                echo json_encode(array("message" => "Failed to unblock user."));
            }
        } else {
            http_response_code(400);
            echo json_encode(array("message" => "User ID not provided."));
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
