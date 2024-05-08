<?php
class Orderdetail {
    public static function getOrdersById($orders_id) {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $orders_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $order = $result->fetch_assoc();
            return $order;
        }
        return NULL;
    }
    public static function getAllProductsByOrderId($orderId) {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM product_in_order WHERE idOrder = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
    }
    public static function getProductById($product_id) {
        require_once 'core/Database.php';
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
}
?>