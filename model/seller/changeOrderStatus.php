<?php
function prepareOrder($mysqli, $productID){
    $query = "UPDATE orders SET statusOrder = 'Đang giao hàng'
              WHERE id = '$productID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
function deliveryOrder($mysqli, $productID){
    $query = "UPDATE orders SET statusOrder = 'Đã hoàn thành'
              WHERE id = '$productID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}

?>
