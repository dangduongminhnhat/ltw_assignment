<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/calculateRevenue.php");


function getRevenue($startDate, $endDate) {
    global $mysqli;
    return calculateTotalRevenue($mysqli, $startDate, $endDate);
}
function getAllRevenue() {
    global $mysqli;
    return getTotalRevenue($mysqli);
}
function getNotPaid($startDate, $endDate) {
    global $mysqli;
    return calculateNotPaidRevenue($mysqli, $startDate, $endDate);
}
function getAllNotPaid() {
    global $mysqli;
    return getNotPaidRevenue($mysqli);
}
?>
