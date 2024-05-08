<?php

require_once("../../model/connectdb.php");
require_once("../../model/seller/getRatings.php");


function fetchRatings($sortOption) {
    global $mysqli;

    return getRatings($mysqli, $sortOption);
}
?>
