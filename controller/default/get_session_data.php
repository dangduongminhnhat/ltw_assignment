<?php
session_start();

function fetch_session_data($param) {
    switch ($param) {
        case 'phone':
            return isset($_SESSION['phone']) ? $_SESSION['phone'] : null;
        case 'author':
            return isset($_SESSION['author']) ? $_SESSION['author'] : null;
        default:
            return null;
    }
}

$allowed_params = array('phone', 'author');
if (!isset($_GET['param']) || !in_array($_GET['param'], $allowed_params)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid or missing parameter']);
    exit; 
}

$param = $_GET['param'];
$session_data = fetch_session_data($param);

if ($session_data === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Session data not found']);
} else {
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode(['data' => $session_data]);
}
?>
