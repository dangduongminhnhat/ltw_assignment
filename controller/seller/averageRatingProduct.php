<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/averageRatingProduct.php");

function getAverageStarsForProduct($productID) {
    global $mysqli;

    return calculateAverageStarsForProduct($mysqli, $productID);
}
?>
