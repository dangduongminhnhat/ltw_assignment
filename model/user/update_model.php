<?php
session_start();
require_once '../../core/Database.php';
$conn = Database::connect();
function check_Update($phone, $pass, $mail, $username){
    global $conn;
    $validEmail = check_email($mail);
    $validPhone = check_phone($phone);

    if($validEmail && $validPhone){
        $sql = "UPDATE accounts 
        SET phone = ?, pass = ?, email = ?, userName = ?
        WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Error in preparing the statement: " . $conn->error);
        }
        $pass_hash = hash('sha256', $pass);
        $stmt->bind_param('ssssi', $phone, $pass_hash, $mail, $username, $_SESSION['id']);
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
        $result = $result->fetch_assoc();
        if ($result['id'] == $_SESSION['id']){
            return true;
        }
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
        $result = $result->fetch_assoc();
        if ($result['id'] == $_SESSION['id']){
            return true;
        }
        $stmt->close();
        return false;
    }
    $stmt->close();
    return true;
}