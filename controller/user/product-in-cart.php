<?php
require_once '../../model/user/product-in-cart.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["product_ids"]) && isset($_POST["quantity"]) && isset($_POST["total"]) && isset($_POST["address"]) && isset($_POST["payment"])) {
        $product_ids = $_POST["product_ids"];
        $quantity = $_POST["quantity"];
        $total = $_POST["total"];
        $payment = $_POST["payment"];
        $address = $_POST["address"];
        $order_id = addOrder($total, $payment, $address);

        $size = count($product_ids);
        for ($i = 0; $i < $size; $i ++) {
            $product_in_cart = getProductInCartById($product_ids[$i]);
            deleteProductInCartById($product_ids[$i]);

            $product = getProductById($product_in_cart["idProduct"]);
            $price = $product["price"] * $quantity[$i];
            addProductInOrder($product_in_cart["idProduct"], $order_id, $price, $quantity[$i], $product_in_cart["note"]);
            decreaseQuantityProduct($product_in_cart["idProduct"], $quantity[$i]);
        }
        echo json_encode("Đặt đơn thành công");
    } else {
        echo json_encode("Không thể đặt đơn");
    }
}
?>