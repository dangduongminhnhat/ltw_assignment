<?php
session_start();
require_once '../../core/Database.php';
function addProduct($productId, $quantity, $note) {
    $conn = Database::connect();
    if ($note == "") {
        $sql = "INSERT INTO product_in_cart (idUser, idProduct, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $userId = $_SESSION["id"];
        $stmt->bind_param("iii", $userId, $productId, $quantity);
        $stmt->execute();
    } else {
        $sql = "INSERT INTO product_in_cart (idUser, idProduct, quantity, note) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $userId = $_SESSION["id"];
        $stmt->bind_param("iiis", $userId, $productId, $quantity, $note);
        $stmt->execute();
    }
    return True;
}
?>