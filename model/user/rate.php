<?php
session_start();
require_once '../../core/Database.php';

function addRatings($idOrder, $content, $stars) {
    $conn = Database::connect();
    date_default_timezone_set('Asia/Jakarta');
    $today = date("Y-m-d H:i:s");
    $idUser = $_SESSION["id"];
    $sql = "INSERT INTO ratings (idOrder, idUser, content, stars, timeRating) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisis", $idOrder, $idUser, $content, $stars, $today);
    $stmt->execute();
}
?>