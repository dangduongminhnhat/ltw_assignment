<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/countOrders.php");

function countOrdersPrepared() {
    global $mysqli;

    return countOrdersPreparedModel($mysqli);
}
function countOrdersDelivery() {
    global $mysqli;

    return countOrdersDeliveryModel($mysqli);
}
function countOrdersDone() {
    global $mysqli;

    return countOrdersDoneModel($mysqli);
}
function countOrdersCancel() {
    global $mysqli;

    return countOrdersCancelModel($mysqli);
}
function countOrders() {
    global $mysqli;

    return countOrdersModel($mysqli);
}
function countReportedProduct() {
    global $mysqli;

    return countReportedProductModel($mysqli);
}
function countEmptyProduct() {
    global $mysqli;

    return countEmptyProductModel($mysqli);
}
?>
