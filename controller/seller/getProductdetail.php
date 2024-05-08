<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getProductdetail.php");

function fetchProductDetailById($productID) {
    global $mysqli;

    return getProductDetailByID($mysqli, $productID);
}
?>
