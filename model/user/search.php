<?php
require_once '../../core/Database.php';
function searchProduct($name) {
    $conn = Database::connect();
    $sql = "SELECT * FROM product";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row["isDeleted"] == 1 || $row["isHidden"] == 1 || $row["isReported"] == 1 || $row["quantity"] == 0) {
                continue;
            }
            $products[] = $row;
        }
    }
    return $products;
}
function getAllCatogeries() {
    $conn = Database::connect();
    $sql = "SELECT * FROM category";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[$row["id"]] = $row["typeName"];
        }
    }
    return $products;
}
?>