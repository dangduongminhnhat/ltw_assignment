<?php
require_once '../../core/Database.php';
function deleteOrdersById($id) {
    $conn = Database::connect();
    $sql = "UPDATE orders SET isCanceled = 1 WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $check = $stmt->execute();
    return $check;
}
?>