<?php
$conn = new mysqli('localhost', 'root', '', 'btl_ltw');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function check_register($phone, $pass, $mail, $username){
    global $conn;
    $validEmail = check_email($mail);
    $validPhone = check_phone($phone);
    if($validEmail && $validPhone){
        $sql = 'INSERT INTO accounts (phone, pass, email, userName) VALUES (?, ?, ?, ?);';
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error in preparing the statement: " . $conn->error);
        }
        $pass_hash = hash('sha256', $pass);
        $stmt->bind_param('ssss', $phone, $pass_hash, $mail, $username);
        $stmt->execute();
        $user_id = mysqli_insert_id($conn);
        $sql = 'INSERT INTO users (idAccount, isReported) VALUES (?, ?);';
        $stmt = $conn->prepare($sql);
        $isReported = 0;
        $stmt->bind_param('ii', $user_id, $isReported);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return true;
    }
    return false;
}

function check_email($mail){
    global $conn;
    $sql = "SELECT id FROM accounts WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error in preparing the statement: " . $conn->error);
        return false;
    }
    $stmt->bind_param('s', $mail );
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        return false;
    }
    $stmt->close();
    return true;
}

function check_phone($phone){
    global $conn;
    $sql = "SELECT id FROM accounts WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error in preparing the statement: " . $conn->error);
        return false;
    }
    $stmt->bind_param('s', $phone );
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        return false;
    }
    $stmt->close();
    return true;
}