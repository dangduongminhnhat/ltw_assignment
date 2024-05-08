<?php
$conn = new mysqli('localhost', 'root', '', 'btl_ltw');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function check_login($phonemail, $pass){
    global $conn;

    $sql = 'SELECT email, phone, id FROM accounts WHERE pass = ?';
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error in preparing the statement: " . $conn->error);
    }
    $pass_hash = hash('sha256', $pass);
    $stmt->bind_param('s', $pass_hash);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // echo json_encode($row);
            if (strcasecmp($row['email'], $phonemail) == 0 || strcasecmp($row['phone'], $phonemail) == 0) {
                $id = $row['id'];
                $user_type = check_user_type($id);
                $stmt->close();
                return ['user' => $row, 'type' => $user_type];
            }
        }
    }
    $stmt->close();
    return false;
}
function check_user_type($id) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT idAccount FROM users WHERE idAccount = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        return 'user';
    }
    
    $stmt = $conn->prepare("SELECT idAccount FROM sellers WHERE idAccount = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $stmt->close();
        return 'seller';
    }
    $stmt->close();
    return 'unknown';
}