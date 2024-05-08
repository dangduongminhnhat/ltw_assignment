<?php
class Homepage {
    public static function getAllProducts() {
        require_once 'core/Database.php';
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
    public static function getAllCategories() {
        require_once 'core/Database.php';
        $conn = Database::connect();
        $sql = "SELECT * FROM category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[$row["id"]] = [$row["typeName"], $row["image"]];
            }
        }
        return $categories;
    }
}
?>