<?php
include_once("../../model/connectdb.php");
include_once ('../../model/seller/fetchOrder.php');

function fetchListOrder() {
    global $mysqli;
    return getListOrder($mysqli);
}
?>
