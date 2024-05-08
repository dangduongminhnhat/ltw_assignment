<?php
require '../../model/default/login_model.php';
header("Content-Type: application/json"); 
session_start();
session_regenerate_id(true);
$secretKey = "iam_a_cute_duck";

function signCookie($value, $secretKey) {
    return hash_hmac('sha256', $value, $secretKey);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true); 
    if ($data['phonemail'] && $data['pass']){
        $phonemail = $data['phonemail'];
        $pass = $data['pass'];

        $result = check_login($phonemail, $pass); 
        if (!$result){
            http_response_code(401);
            echo json_encode(['Failed message' => 'Unauthorized access']);
        }
        else{
            $result_userinfo = $result['user'];
            $_SESSION['phonemail'] = $phonemail;
            $_SESSION['phone'] = $result_userinfo['phone'];
            $_SESSION['id'] = $result_userinfo['id'];
            $_SESSION['author'] = $result['type'];
            $cookieSignature = signCookie($result_userinfo['id'], $secretKey);
            $cookieValue = $result_userinfo['id'].':'. $cookieSignature;
            // add secure: transmit https thoi
            // add httponly: client-side scripts from accessing it.
            setcookie('id', $cookieValue, time() + (60*15), "/", "", true, true);
            http_response_code(200);
            echo json_encode(['Login successful'=> 'Wellcome back.']);
        }
    }
    else{
        http_response_code(400);
        echo json_encode("Not enough data submitted.");
    }
} else {
    http_response_code(405);
    echo json_encode("Invalid request method.");
}
?>
