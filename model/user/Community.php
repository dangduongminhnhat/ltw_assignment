<?php
class Community {
    public static function getAllBlogs() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM blog";
        $stmt = $conn->prepare($sql);
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
    public static function getAllAccounts() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM accounts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[$row["id"]] = $row["userName"];
            }
        }
        return $products;
    }
    public static function getAllComments() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM comments";
        $stmt = $conn->prepare($sql);
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