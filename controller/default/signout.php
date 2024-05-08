<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();

    if(isset($_COOKIE['id'])) {
        setcookie('id', '', time() - 3600, '/');
    }
    echo json_encode("Success");
}
?>