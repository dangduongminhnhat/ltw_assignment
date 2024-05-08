<?php
require_once '../../model/user/form-mainpage.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        $product = getProduct($productId);
        if ($product) {
            header('Content-Type: application/json');
            echo json_encode($product);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Product not found."));
        }
    }
}
?>