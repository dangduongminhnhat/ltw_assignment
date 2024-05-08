<?php
require_once '../../model/user/cancelOrder.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["idOrder"])) {
        deleteOrdersById($_POST["idOrder"]);
        echo json_encode("Hủy đơn thành công");
    } else {
        echo json_encode("Không thể đặt đơn");
    }
}
?>