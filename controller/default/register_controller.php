<?php
require '../../model/default/register_model.php';
header("Content-Type: application/json"); 
session_start();
session_regenerate_id(true);

function check_Formart($phone, $pass, $mail) {
    $validMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    $validPhone = false;
    if (is_numeric($phone) && strlen($phone) == 10) {
        $validPhone = true;
    }
    $validPass = false;
    $error_pass = []; 

    if (empty(trim($pass))) {
        $error_pass['empty'] = "Password shouldn't be empty.";
    } elseif (strlen($pass) < 8) {
        $error_pass['len'] = "Password should be at least 8 characters long.";
    } elseif (!preg_match('/[a-z]/', $pass)) {
        $error_pass['lower'] = "Password should contain at least one lowercase letter.";
    } elseif (!preg_match('/[A-Z]/', $pass)) {
        $error_pass['upper'] = "Password should contain at least one uppercase letter.";
    } elseif (!preg_match('/\d/', $pass)) {
        $error_pass['digit'] = "Password should contain at least one digit.";
    } elseif (!preg_match('/[!@#$%^&*()_+\-=[\]{};\'":\\|,.<>\/?]/', $pass)) {
        $error_pass['special'] = "Password should contain at least one special character.";
    }

    if (empty($error_pass)) {
        $validPass = true;
    }

    if ($validMail && $validPhone && $validPass){
        return true;
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true); 
    if ($data['phone'] && $data['pass'] && $data['username'] && $data['mail']){
        $phone = $data['phone'];
        $pass = $data['pass'];
        $mail = $data['mail'];
        $username = $data['username'];

        $validFormat = check_Formart($phone, $pass, $mail);
        if($validFormat){
            $result = check_register($phone, $pass, $mail, $username); 
            if (!$result){
                http_response_code(401);
                echo json_encode(['Register failed' => 'Register failed.']);
            }
            else{
                http_response_code(200);
                echo json_encode(['Register successful'=> 'Register succesfull.']);
            }
        }
        else{
            http_response_code(400);
            echo json_encode("Invalid data format submitted.");
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
