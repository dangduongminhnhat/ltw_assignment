<?php
class UserInfo {
    public static function getAccount() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $userId = $_SESSION["id"];
        $sql = "SELECT * FROM accounts WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
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