<?php
require_once '../../model/user/rate.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["order_id"]) && isset($_POST["text"])) {
        $idOrder = $_POST["order_id"];
        $content = $_POST["text"];
        if (isset($_POST["rate"])) {
            $stars = $_POST["rate"];
        } else {
            $stars = 5;
        }
        addRatings($idOrder, $content, $stars);
        echo json_encode("Đánh giá thành công");
    } else {
        echo json_encode("Không thể đánh giá");
    }
}
?>