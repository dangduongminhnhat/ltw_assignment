<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getReportedProduct.php");

function fetchReportedProduct() {
    global $mysqli;

    return getReportedProduct($mysqli);
}
?>
