<?php
class Orders {
    public static function getAllOrders() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $userId = $_SESSION["id"];
        $sql = "SELECT * FROM orders WHERE idUser = ?";
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
    public static function getAllRatings() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $userId = $_SESSION["id"];
        $sql = "SELECT * FROM ratings WHERE idUser = ?";
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
}
?>