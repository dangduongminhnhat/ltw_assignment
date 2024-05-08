<?php
header("Content-Type: application/json"); 
session_start();
session_regenerate_id(true);

$secretKey = "iam_a_cute_duck";

function verifyCookie($value, $signature, $secretKey) {
    $expectedSignature = signCookie($value, $secretKey);
    return hash_equals($expectedSignature, $signature);
}
function signCookie($value, $secretKey) {
    return hash_hmac('sha256', $value, $secretKey);
}

if(isset($_COOKIE['id']) && isset($_SESSION['phonemail']) && isset($_SESSION['phone'])){
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        validCookie();
    }
    else {
        http_response_code(405);
        echo json_encode("Invalid request method.");
    }
}
else{
    http_response_code(401);
    echo json_encode("Couldn't login.");
}

function validCookie(){
    $cookieParts = explode(':', $_COOKIE['id']);
    if (count($cookieParts) === 2) {
        $cookieValue = $cookieParts[0];
        $cookieSignature = $cookieParts[1];
        global $secretKey;
        if (verifyCookie($cookieValue, $cookieSignature, $secretKey)) {
            http_response_code(200);
            echo json_encode(['Success'=> "Wellcome back"]);
        }
        else{
            http_response_code(401);
            echo json_encode(['Failed'=>'Unauthorized access']);
        }
    }
    else{
        http_response_code(401);
        echo json_encode(['Failed'=>'Unauthorized access']);
    }
}

?>