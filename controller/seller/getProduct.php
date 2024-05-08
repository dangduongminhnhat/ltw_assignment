<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getProduct.php");

function fetchProductsByCategory($categoryId, $searchQuery = null) {
    global $mysqli;

    if ($searchQuery !== null && !empty($searchQuery)) {
        // If search query is provided, fetch products by both category and search query
        return getProductsByCategoryAndSearch($mysqli, $categoryId, $searchQuery);
    } else {
        // If no search query, fetch products by category only
        return getProductsByCategory($mysqli, $categoryId);
    }
}
?>
