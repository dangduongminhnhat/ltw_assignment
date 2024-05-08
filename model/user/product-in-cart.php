<?php
session_start();
require_once '../../core/Database.php';
function addOrder($total, $payment, $address) {
    $conn = Database::connect();
    date_default_timezone_set('Asia/Jakarta');
    $today = date("Y-m-d H:i:s");
    $idUser = $_SESSION["id"];
    $status = "Chờ chuẩn bị";
    if ($payment == 1) {
        $payment_bind = "MOMO";
    } else {
        $payment_bind = "Ship COD";
    }
    if ($address == 1) {
        $address_bind = "KTX khu A";
    } else {
        $address_bind = "KTX khu B";
    }
    $sql = "INSERT INTO orders (idUser, payment, statusOrder, dateCreated, total, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssis", $idUser, $payment_bind, $status, $today, $total, $address_bind);
    $stmt->execute();
    return mysqli_insert_id($conn);
}

function getProductInCartById($id) {
    $conn = Database::connect();
    $sql = "SELECT * FROM product_in_cart WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        return $product;
    }
    return $products;
}

function deleteProductInCartById($id) {
    $conn = Database::connect();
    $sql = "DELETE FROM product_in_cart WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function getProductById($product_id) {
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

function addProductInOrder($idProduct, $idOrder, $price, $quantity, $note) {
    $conn = Database::connect();
    $sql = "INSERT INTO product_in_order (idProduct, idOrder, price, quantity, note) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiis", $idProduct, $idOrder, $price, $quantity, $note);
    $stmt->execute();
}

function decreaseQuantityProduct($product_id, $quantity) {
    $conn = Database::connect();
    $sql = "UPDATE product SET quantity = quantity - ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantity, $product_id);
    $check = $stmt->execute();
    return $check . $product_id;
}
?>