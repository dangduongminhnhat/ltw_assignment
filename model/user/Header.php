<?php
class Header {
    public static function getProductInCart() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $userId = $_SESSION["id"];
        $sql = "SELECT * FROM product_in_cart WHERE idUser = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
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
    public static function getUserById($userId) {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM accounts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        }
        return NULL;
    }

    public static function getUser($userId) {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM users WHERE idAccount = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        }
        return NULL;
    }
}
?>