<?php
include_once("../../model/connectdb.php");

function getListCancelOrder($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT orders.id as idOrder, statusOrder, userName, total, users.idAccount, users.isReported
        FROM orders, users, accounts
        WHERE idUser = idAccount AND idAccount = accounts.id AND isCanceled=1;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
function getListCancelOrderPage($mysqli) {
    $sql_get_list_reported_user = mysqli_query($mysqli,
        "SELECT accounts.userName as userName, total, orders.note as note, orders.total as total, 
        statusOrder,orders.id as idOrder, product.name as proName, product_in_order.price as proPrice,
        product_in_order.quantity as quantity , users.isReported as isReported, users.idAccount as idAccount, accounts.email as email, accounts.phone as phone, dateCreated
        FROM orders, users, accounts, product_in_order, product 
        WHERE idUser = idAccount AND idAccount = accounts.id 
        AND product_in_order.idOrder = orders.id AND product.id = product_in_order.idProduct AND isCanceled=1 ORDER BY idOrder DESC;");

    $listuser = array();

    if(mysqli_num_rows($sql_get_list_reported_user) > 0) {
        while ($row = mysqli_fetch_assoc($sql_get_list_reported_user)) {
            $listuser[] = $row;
        }
    }
    return $listuser;
}
$orders = getListCancelOrder($mysqli);
?>
