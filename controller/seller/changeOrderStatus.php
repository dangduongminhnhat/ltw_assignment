<?php

include_once("../../model/connectdb.php");
include_once("../../model/seller/changeOrderStatus.php");


$action = $_GET['action'];
$orderID = $_GET['orderID'];

if ($action == 'prepareOrder') {
    prepareOrder($mysqli, $orderID);
} elseif ($action == 'deliveryOrder') {
    deliveryOrder($mysqli, $orderID);
}


?>
