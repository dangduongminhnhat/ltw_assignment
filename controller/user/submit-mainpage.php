<?php
require_once '../../model/user/submit-mainpage.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["productId"]) && isset($_POST["quantity"])) {
        $productId = $_POST["productId"];
        $quantity = $_POST["quantity"];
        if(isset($_POST["note"])) {
            $note = $_POST["note"];
        } else {
            $note = "";
        }
        addProduct($productId, $quantity, $note);
        echo json_encode("Đã thêm vào giỏ hàng");
    } else {
        echo json_encode("Không thể thêm vào giỏ hàng");
    }
}
?>