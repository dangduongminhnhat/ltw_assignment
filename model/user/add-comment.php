<?php
session_start();
require_once '../../core/Database.php';
function addComment($idBlog, $content) {
    $conn = Database::connect();
    $idAccount = $_SESSION["id"];
    $sql = "INSERT INTO comments (idAccount, idBlog, content) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $idAccount, $idBlog, $content);
    $stmt->execute();
}
?>