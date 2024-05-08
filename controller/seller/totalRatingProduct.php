<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/totalRatingProduct.php");

function getTotalRatingProduct($idProduct) {
    global $mysqli;

    return calculateRatingForProduct($mysqli, $idProduct);
}
?>
