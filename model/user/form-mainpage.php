<?php
require_once '../../core/Database.php';
function getProduct($product_id) {
    $conn = Database::connect();
    $sql = "SELECT * FROM product WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        return $product;
    }
    return NULL;
}
?>