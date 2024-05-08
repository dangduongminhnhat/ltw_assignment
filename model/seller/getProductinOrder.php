<?php
function getProductInOrder($mysqli, $orderID) {

    $sql_get_product_in_order = mysqli_query($mysqli,
        "SELECT product.name, product_in_order.quantity, product.price
        FROM product_in_order   
        INNER JOIN product ON product_in_order.idProduct = product.id
        WHERE product_in_order.idOrder = $orderID");

    $product = array();

    if(mysqli_num_rows($sql_get_product_in_order) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_product_in_order)) {
            $product[] = $row;
        }
    }

    return $product;
}
function getListOrderAll($mysqli, $orderID) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice, orders.address as addr, payment, isCanceled,
        product_in_order.quantity as quantity , users.isReported as isReported, users.idAccount as idAccount, accounts.email as email, accounts.phone as phone, dateCreated, product_in_order.note as proNote
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND orders.id = $orderID AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
?>
